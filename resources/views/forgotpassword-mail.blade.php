<x-mail::message>
    # Your password change request

    {{ $email }} requested for password change

    <a href="{{ route('resetpassword', $token) }}">{{ route('resetpassword', $token) }}</a>

    <x-mail::button :url="route('resetpassword', $token)">
        Change Password
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
