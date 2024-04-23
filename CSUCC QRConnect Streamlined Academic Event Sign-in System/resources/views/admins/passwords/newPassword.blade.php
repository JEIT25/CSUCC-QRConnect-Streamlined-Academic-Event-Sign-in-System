<form method="POST" action="{{ route('reset.password.post') }}">
    @csrf
    <input type="hidden" name="token" value="({{ $token }})">
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
            autofocus>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">New Password</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation">
        @error(session('error'))
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Send Password Reset Link</button>
</form>
