<x-layout::base>

    <form method="POST" action="{{ route('register') }}" class="pl-8">
        @csrf

        @if ($errors->any())
            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mt-4">
            <label for="name">Name</label>
            <input class="border-2 border-black" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <label for="email">Email</label>
            <input class="border-2 border-black" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <label for="password">Password</label>
            <input class="border-2 border-black" id="password" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation">Confirm Password</label>
            <input class="border-2 border-black" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="block mt-4">
            <label for="terms" class="flex items-center">
                <input type="checkbox" id="terms" name="terms" />
                <span>I agree to the terms of service and privacy policy</span>
            </label>
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <input type="checkbox" id="remember_me" name="remember" />
                <span>Remember me</span>
            </label>
        </div>

        <div class="mt-4">
            <a class="underline" href="{{ route('login') }}">
                Already registered?
            </a>
        </div>

        <div class="mt-4">
            <button type="submit">Register</button>
        </div>
    </form>
</x-layout::base>
