<x-layout::base>

    <div class="mb-4">
        Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
    </div>

    @if (session('status') === 'verification-link-sent')
        <div class="mb-4">
            A new verification link has been sent to the email address you provided in your profile settings.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div class="mt-4">
            <button type="submit">Resend Verification Email</button>
        </div>
    </form>

    {{--
    <div class="mt-4">
        <a class="underline" href="{{ route('profile.show') }}">
            Edit Profile
        </a>
    </div>
    --}}

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <div class="mt-4">
            <button type="submit">Log Out</button>
        </div>
    </form>
</x-layout::base>
