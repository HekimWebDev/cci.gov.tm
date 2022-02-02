@unless($breadcrumbs->isEmpty())
    <div class="template-demo">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li class="breadcrumb-item pb-0"><a href="{{ $breadcrumb->url }}" data-abc="true">{{ $breadcrumb->title }}</a></li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page"><span>{{ $breadcrumb->title }}</span></li>
                    @endif
                @endforeach
                {{-- <li class="breadcrumb-item"><a href="#" data-abc="true">add</a></li>
                <li class="breadcrumb-item"><a href="#" data-abc="true">user</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>name</span></li> --}}
            </ol>
        </nav>
    </div>
@endunless
