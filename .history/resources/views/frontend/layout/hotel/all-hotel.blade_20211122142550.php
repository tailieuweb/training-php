@extends('frontend.index-master')
@section('content')
<!-- banner -->
<section class="banner_search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-bg">
                    <div class="padding_lert">
                        <h1>WELCOME TO HOTEL Felicity </h1>
                        <span>LANDING PAGE 2019</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="search-wrapper active">
                    <div class="input-holder fsearch">
                        <form method="GET" action="{{route('frontend.dashboard.index.allhotel.search')}}">
                            <input type="text" name="query" list="brows" id="fsearchh" class="search-input" placeholder="Type to search" />
                            <datalist id="brows" style="visibility: hidden; height:0px !important;">

                            </datalist>
                            <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                        </form>
                    </div>
                    <span class="close" onclick="searchToggle(this, event);"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->
<!-- form_lebal -->
<!-- gray bg -->
<section class="container tm-home-section-1" id="more">
    <div class="section-margin-top">
        <div class="row">
            <div class="tm-section-header">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <hr>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2 class="tm-section-title">All hotel</h2>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_hotel as $hotel)
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-xxs-12 mb-5">
                <div class="tm-home-box-2">
                    <img src="{{asset('')}}img/hotel/{{$hotel->image}}  " alt="image" class="img-responsive">
                    <h3>{{$hotel->name}}</h3>
                    <div class="d-flex">
                        <div class="w-50">
                            <p class="tm-date"><?php
                                $date = date_create($hotel->created_at);
                                echo date_format($date, 'Y-m-d');
                                
                            ?></p>
                        </div>
                        <div class="w-50 text-right">
                            <div class="wrapper">
                                <input name="ratingRadio" type="radio" id="st1" value="1" />
                                <label for="st1"></label>
                                <input name="ratingRadio" type="radio" id="st2" value="2" />
                                <label for="st2"></label>
                                <input name="ratingRadio" type="radio" id="st3" value="3" />
                                <label for="st3"></label>
                                <input name="ratingRadio" type="radio" id="st4" value="4" />
                                <label for="st4"></label>
                                <input name="ratingRadio" type="radio" id="st5" value="5" />
                                <label for="st5"></label>
                            </div>
                        </div>

                    </div>
                    <div class="location">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        {{$hotel->address}}
                    </div>
                    <div class="tm-home-box-2-container">
                        <form id="form_favorite" style="display: inline-block;">
                        @csrf
                            <input id="hotel_id" type="text" value="{{$hotel->hotel_id}}" name="hotel_id" hidden>
                            <button id="favorites" class="tm-home-box-2-link <?php 
                                if(isset($all_hotel)){
                                    if($hotel->favo_check == 1){
                                        echo "active";
                                    }
                                }
                            ?>"><i class="fa fa-heart tm-home-box-2-icon border-right"></i></button>
                        </form>
                        
                        <a href="{{asset('')}}detail/{{$hotel->hotel_id}}" class="tm-home-box-2-link"><span class="tm-home-box-2-description">Travel</span></a>
                        <a href="{{asset('')}}detail/{{$hotel->hotel_id}}" class="tm-home-box-2-link"><i class="fa fa-edit tm-home-box-2-icon border-left"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
         
            
        </div>
    </div>
        <!-- {{$all_hotel->links() }} -->
    <!-- <div class="row mt-5">
        <div class="col text-center">
            <div class="block-27">
                <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div>
        </div>
    </div> -->
</section>
<script>
    // search
    $(document).ready(function() {
        $('#fsearchh').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('search') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#brows').fadeIn();
                        $('#brows').html(data);
                    }
                });
            }
        });
        $(document).on('click', 'option', function() {
            $('#fsearchh').val($(this).text());
            $('#brows').fadeOut();
        });
    });
</script>
<script>
    const favorite = document.querySelectorAll('#favorites');
    favorite.forEach( (e) => {
        e.addEventListener('click', function(){
            e.classList.toggle('active');
            // window.location = '{{asset('')}}hotel'
        })
    })
</script>
<script>
    $('#form_favorite').submit(function(e){
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: "{{ route('frontend.dashboard.index.favorite.post') }}",
            data: {
                // "_token": '{{csrf_token()}}',
                "hotel_id": $("#hotel_id").val(),
                // "email": $("").val(),
            },
            success: function(data) {
                        $('#brows').fadeIn();
                        $('#brows').html(data);
                    }
        })
    })
</script>
@endsection