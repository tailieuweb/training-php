@php
    $featured = get_featured_posts(5, [
        'author',
        'categories' => function ($query) { $query->limit(1); },
    ]);

    $featuredList = [];
    if (!empty($featured)) {
        $featuredList = $featured->pluck('id')->all();
    }
@endphp

@if (!empty($featured))
    <section class="section pt-50 pb-50 bg-lightgray">
        <div class="container">
            <div class="post-group post-group--hero">
                @foreach ($featured as $featureItem)
                    @if ($loop->first)
                        <div class="post-group__left">
                            <article class="post post__inside post__inside--feature">
                                <div class="post__thumbnail">
                                    <img src="{{ RvMedia::getImageUrl($featureItem->image, 'featured', false, RvMedia::getDefaultImage()) }}" alt="{{ $featureItem->name }}"><a href="{{ $featureItem->url }}" class="post__overlay"></a>
                                </div>
                                <header class="post__header">
                                    <h3 class="post__title"><a href="{{ $featureItem->url }}">{{ $featureItem->name }}</a></h3>
                                    <div class="post__meta"><span class="post-category"><i class="ion-cube"></i>
                                            @if (!$featureItem->categories->isEmpty())<a href="{{ $featureItem->categories->first()->url }}">{{ $featureItem->categories->first()->name }}</a>@endif
                                    </span>
                                        <span class="created_at"><i class="ion-clock"></i>{{ $featureItem->created_at->translatedFormat('M d Y') }}</span>
                                        @if ($featureItem->author->name)
                                            <span class="post-author"><i class="ion-android-person"></i><span>{{ $featureItem->author->name }}</span></span>
                                        @endif
                                    </div>
                                </header>
                            </article>
                        </div>
                        <div class="post-group__right">
                            @else
                                <div class="post-group__item">
                                    <article class="post post__inside post__inside--feature post__inside--feature-small">
                                        <div class="post__thumbnail"><img src="{{ RvMedia::getImageUrl($featureItem->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $featureItem->name }}"><a href="{{ $featureItem->url }}" class="post__overlay"></a></div>
                                        <header class="post__header">
                                            <h3 class="post__title"><a href="{{ $featureItem->url }}">{{ $featureItem->name }}</a></h3>
                                        </header>
                                    </article>
                                </div>
                                @if ($loop->last)
                        </div>
                    @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif
