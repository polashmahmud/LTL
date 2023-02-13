<x-mail::message>
# Password Updated

We're contacting you to let you know that your password was recently updated.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
