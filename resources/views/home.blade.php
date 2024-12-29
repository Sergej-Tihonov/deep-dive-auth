<x-layout::base>
    Dashboard {{ Auth::user()?->name ?? 'guest' }}

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <div class="mt-4">
            <button type="submit">Log Out</button>
        </div>
    </form>
</x-layout::base>
