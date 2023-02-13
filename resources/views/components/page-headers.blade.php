<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
            <div class="mb-1">
                <ol class="breadcrumb breadcrumb-alternate" aria-label="breadcrumbs">
                    @foreach($breadcrumbs as $key => $value)
                        <li class="breadcrumb-item @if($value == 'active') active @endif"><a href="{{ $value == 'active' ? '#' : $value }}">{{ $key }}</a></li>
                    @endforeach
                </ol>
            </div>
            <h2 class="page-title">
                <span class="text-truncate">{{ $title }}</span>
            </h2>
        </div>
        <div class="col-auto">
            {{ $slot }}
        </div>
    </div>
</div>
