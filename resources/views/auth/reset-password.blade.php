<x-layout::base>

    @if (session('status'))
        <div class="mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="pl-8">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        @if ($errors->any())
            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div>
            <label for="email">Email</label>
            <input class="border-2 border-black" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <label for="password">Password</label>
            <input class="border-2 border-black" id="password" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation">Confirm Password</label>
            <input class="border-2 border-black" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <a class="underline" href="{{ route('login') }}">
                Back to login?
            </a>
        </div>

        <div class="mt-4">
            <button type="submit">Reset Password</button>
        </div>
    </form>
</x-layout::base>
