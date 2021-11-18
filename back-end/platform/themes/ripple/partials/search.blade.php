<p class="search-result-title">{{ __('Search result') }}: </p>
<div class="row">
    @if (count($posts) > 0)
        <ul class="search-list">
            @foreach ($posts as $post)
                <li class="col-md-4 col-sm-6 col-xs-12">
                    <a href="{{ $post->url }}" class="squared has-image">
                        <span class="img" style="background-image: url({{ RvMedia::getImageUrl($post->image, 'thumb') }});"></span>
                        <span class="spoofer">{{ $post->name }}</span>
                        <span class="visible">{{ $post->name }}</span>
                    </a>
                </li>
            @endforeach
            <div class="clearfix"></div>
        </ul>
    @else
        <div class="col-md-12">
            <p>{{ __('No result available for :name', ['name' => 'posts']) }}</p>
        </div>
    @endif
</div>
<div class="clearfix"></div>
