@if(auth()->user()->avatar())
    <span class="avatar {{ $size }}" style="background-image: url({{ auth()->user()->avatar() }})"></span>
@else
    <span class="avatar {{ $size }}">
        {{ substr(auth()->user()->name, 0, 2) }}
    </span>
@endif
