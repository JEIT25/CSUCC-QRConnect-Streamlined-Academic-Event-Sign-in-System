<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('admins.passwords.requestform');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(length: 64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Mail::send('emails.resetpassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back();
    }

    function resetPassword($token)
    {
        return view('admins.passwords.newPassword')->with('token', $token);

    }


    function resetPasswordPost(Request $request)
    {

        $validated_data = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ]);
        $token = $request->token;
        $token = str_replace(['(', ')'], '', $token); //remove parethesis in token value

        $updated_password = DB::table('password_reset_tokens')
            ->where ([
                'email' => $request->input('email'),
                'token' => $token,
            ])->first();

        if (!$updated_password) {
            dd($updated_password, $request->token);
            return redirect()->route('reset.password',['token'=>$request->token])->with('error', 'invalid');
        }

        User::where("email", $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table("password_reset_tokens")->where([
            "email" => $request->email
        ])->delete();

        return redirect()->route('login')->with('success', "Password Resset Successfully");
    }
}
