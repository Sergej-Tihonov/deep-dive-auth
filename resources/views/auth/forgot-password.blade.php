<x-layout::base>

    <div class="mb-4">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="pl-8">
        @csrf

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
            <input class="border-2 border-black" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <a class="underline" href="{{ route('login') }}">
                Back to login?
            </a>
        </div>

        <div class="mt-4">
            <button type="submit">Email Password Reset Link</button>
        </div>
    </form>
</x-layout::base>
