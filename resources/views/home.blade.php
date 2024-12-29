<x-layout::base>
    Home: {{ Auth::user()?->name ?? 'guest' }}

    <div class="mt-4">
        <a class="underline" href="{{ route('auth.profile') }}">
            Edit Profile
        </a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <div class="mt-4">
            <button type="submit">Log Out</button>
        </div>
    </form>
</x-layout::base>
