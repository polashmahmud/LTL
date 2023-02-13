<x-mail::message>
# Email Updated

We're contacting you to let you know that the email associated with your account was recently updated.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
