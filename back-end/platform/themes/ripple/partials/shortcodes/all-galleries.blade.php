@if (function_exists('render_galleries'))
    <section class="section pt-50 pb-50">
        <div class="container">
            {!! render_galleries($limit ?: 8) !!}
        </div>
    </section>
@endif
