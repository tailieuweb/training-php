<div class="left_sidebar_area">
    <aside class="left_widgets p_filter_widgets">
        <div class="l_w_title">
            <h3>Browse Categories</h3>
        </div>
        <div class="widgets_inner">
            <ul class="list">
                <li>
                    <a href="#">Coming soon!</a>
                    <span>(^_^)</span>
                </li>
            </ul>
        </div>
    </aside>
    <aside class="left_widgets p_filter_widgets price_rangs_aside">
        <div class="l_w_title">
            <h3>Price Filter</h3>
        </div>
        <div class="widgets_inner">
            <div class="range_item">
                <!-- <div id="slider-range"></div> -->
                <input type="text" class="js-range-slider" value="" />
                <div class="d-flex">
                    <div class="price_text">
                        <p>Price :</p>
                    </div>
                    <div class="price_value d-flex justify-content-center">
                        <input type="text" class="js-input-from" id="amount" readonly />
                        <span>to</span>
                        <input type="text" class="js-input-to" id="amount" readonly />
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
@push('styles')
<link rel="stylesheet" href="{{url('css/price_rangs.css')}}">
@endpush
@push('scripts')
<script src="{{url('js/price_rangs.js')}}"></script>
@endpush