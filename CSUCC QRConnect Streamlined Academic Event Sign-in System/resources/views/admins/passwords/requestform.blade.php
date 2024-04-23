
<form method="POST" action="{{ route('forgot.password.post') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Send Password Reset Link</button>
</form>
