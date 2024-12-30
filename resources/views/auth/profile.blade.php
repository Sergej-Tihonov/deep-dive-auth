<x-layout::base>

    Profile: {{ Auth::user()?->name ?? 'guest' }}

    @if (session('status'))
        <div class="mt-4">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="font-medium text-red-600 mt-4">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('user-profile-information.update') }}" class="pl-8">
        @method('PUT')
        @csrf

        <div class="mt-4">
            <label for="name">Name</label>
            <input class="border-2 border-black" id="name" type="text" name="name" value="{{ old('name', Auth::user()?->name) }}" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <label for="email">Email</label>
            <input class="border-2 border-black" id="email" type="email" name="email" value="{{ old('email', Auth::user()?->email) }}" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <button type="submit">Update user infos</button>
        </div>
    </form>

    <form method="POST" action="{{ route('user-password.update') }}" class="pl-8">
        @method('PUT')
        @csrf

        <div class="mt-4">
            <label for="current_password">Current Password</label>
            <input class="border-2 border-black" id="current_password" type="password" name="current_password" required autocomplete="current-password" />
        </div>

        <div class="mt-4">
            <label for="password">New Password</label>
            <input class="border-2 border-black" id="password" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation">Confirm Password</label>
            <input class="border-2 border-black" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <button type="submit">Update password</button>
        </div>
    </form>

    <div class="mt-4">
        <a class="underline" href="{{ route('home') }}">
            Back to home
        </a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <div class="mt-4">
            <button type="submit">Log Out</button>
        </div>
    </form>
</x-layout::base>
