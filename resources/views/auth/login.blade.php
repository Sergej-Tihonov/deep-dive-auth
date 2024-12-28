<x-layout::base>

    <form method="POST" action="{{ route('login') }}" class="pl-8">
        @csrf

        @if ($errors->any())
            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @php
                    ray($errors);
                @endphp
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
            <label for="password">Password</label>
            <input class="border-2 border-black" id="password" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <input type="checkbox" id="remember_me" name="remember" />
                <span>Remember me</span>
            </label>
        </div>

        <div class="mt-4">
            <a class="underline" href="{{ route('register') }}">
                Don't have an account?
            </a>
        </div>

        <div class="mt-4">
            <button type="submit">Log in</button>
        </div>
    </form>
</x-layout::base>
