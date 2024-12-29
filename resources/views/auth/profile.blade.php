<x-layout::base>

    Profile: {{ Auth::user()?->name ?? 'guest' }}

    @if (session('status'))
        <div class="mt-4">
            {{ session('status') }}
        </div>
    @endif

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
