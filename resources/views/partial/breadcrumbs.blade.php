<div class="container col-6">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($links as $link)
                <li class="breadcrumb-item"><a href="{{ $link['link'] }}">{{ $link['name'] }}</a></li>
            @endforeach
        </ol>
    </nav>
</div>
