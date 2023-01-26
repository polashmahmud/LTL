<svg viewBox="0 0 24 24" stroke="currentColor"
     stroke-width="{{ $strokeWidth ?? 1 }}"
     class="inline-block relative {{ $class ?? '' }}"
     width="{{ $w ?? 24 }}" height="{{ $h ?? 24 }}"
    {{ $attributes->except(['class','icon']) }}
>
    <use xlink:href="/backend/tabler/tabler-sprite-nostroke.svg#tabler-{{$icon}}" />
</svg>

