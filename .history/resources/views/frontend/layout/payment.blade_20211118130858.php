@extends('frontend.index-master')

@section('content')

<section class="banner_payment">
</section>
<!-- end banner -->
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<?php
$date_pick = '';
$date_drop = '';
$total_money= 0;
?>
<section class="payment">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="info-left">
                @foreach($hotel as $value)
                    <img src="{{asset('')}}img/hotel/{{$value->image}}" class="img-fluid" alt="">
                   
                    <h3>{{$value->name}}</h3>
                    <div class="time-rent">
                       
                    

                        <div class="d-flex w-100">
                            <div class="pick">Pick-up date:</div>
                            <div class="info-pick">{{$data["date_begin"]}}</div>
                            <?php $date_pick = $data["date_begin"]; ?>
                        </div>
                        <div class="d-flex w-100 mt-1">
                            <div class="pick">Drop-off date:</div>
                            <div class="info-pick">{{$data["date_exit"]}}</div>
                            <?php $date_pick = $data["date_exit"] ?>
                        </div>
                        <div class="d-flex w-100 mt-1">
                            <div class="pick">Amount people:</div>
                            <div class="info-pick">{{$data["person"]}}</div>
                        </div>
                       
                    </div>
                  
                    <div class="time-rent">
                        <div class="d-flex w-100">
                            <div class="pick">Cost for 1 day:</div>
                            <div class="info-pick">{{$value->money_day}} VND</div>
                        </div>
                        <?php
                       
                         $date_begin = date("Y-m-d", strtotime($data["date_begin"]));
                         $temp = strtotime($date_begin);

                         $date_exit = date("Y-m-d", strtotime($data["date_exit"]));
                         $temp2 = strtotime($date_exit);
                         
                         $date = ($temp2 - $temp) / 86400;
                         $total_money = $value->money_day * $date * 2;
                        
                        ?>
                        <div class="d-flex w-100 mt-1">
                            <div class="pick">Rental days:</div>
                            <div class="info-pick">{{$date}} day</div>
                        </div>
                        <div class="d-flex w-100 mt-1">
                            <div class="pick">Taxes are incurred:</div>
                            <div class="info-pick">2$</div>
                        </div>

                        <div class="total d-flex w-100 mt-1">
                            <div class="pick">Total:</div>
                            <div class="info-pick">{{ $total_money}} VND</div>
                            <?php $date_pick = $total_money ?>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-7">
                <div class="info-right">
                    <div class="row">
                        <div class="col-12">
                            <div class="payment-select request-form ftco-animate">
                                <h4 class="">Select your payment method <span style="font-size: 16px;">(Click one option
                                        below)</span></h4>
                                <div class="row payment-visa">
                                    <div class="col">
                                        <nav class="choose-payment">
                                            <div class="nav nav-pills nav-underline mb-3 animated" data-animation="fadeInUpShorter" data-animation-delay="0.5s" id="myTab" role="tablist">
                                                <a href="#ico" class="nav-item nav-link active" id="ico-tab" data-toggle="tab" aria-controls="ico" aria-selected="false" role="tab">Credit Card</a>
                                                <a href="#token" class="nav-item nav-link" id="token-tab" data-toggle="tab" aria-controls="token" aria-selected="false" role="tab">
                                                    <img src="{{asset('')}}frontend/images/vn-pay.png" alt="VN Pay" class="img-fluid" width="40px" height="20px">
                                                    VNPay</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade" id="token" role="tabpanel" aria-labelledby="token-tab">
                                            </div>
                                            <div class="tab-pane fade show active" id="ico" role="tabpanel" aria-labelledby="ico-tab">
                                                <div id="ico-accordion" class="collapse-icon accordion-icon-rotate">
                                                    <div class="card">
                                                        <div class="credit-card-item">
                                                            <img src="{{asset('')}}frontend/images/visa-mastercard.png" alt="Master card" class="img-fluid" width="150px" height="35px">

                                                            <form action="#" class="request-form ftco-animate mt-2">
                                                                <div class="form-group">
                                                                    <label for="" class="label">Card number</label>
                                                                    <input type="text" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="label">Name of card</label>
                                                                    <input type="text" class="form-control" required>
                                                                </div>
                                                                <div class="d-flex" style="width: 100%;">
                                                                    <div class="form-group" style="width: 59%;margin-right: 15px;">
                                                                        <label for="" class="label">Expiration</label>
                                                                        <input type="text" class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group" style="width: 39%;">
                                                                        <label for="" class="label">CCV/CVV</label>
                                                                        <input type="text" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="info-right mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="payment-select request-form ftco-animate">
                                <h4 class="border-bt mb-3">Rental terms </h4>
                                <span style="color: #db6315;">By completing this booking, you agree to the Booking Conditions, Terms and Conditions, and Privacy Policy.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 pay">
                        <form action="{{url('')}}/receip/{{$hotel[0]->hotel_id}}">
                            <input type="date" name="date_pick" value="{{$date_pick}}">
                            {{var_dump($date_pick);die();}}
                            <input type="date" name="date_drop" value="{{$date_drop}}" hidden>
                            <input type="int" name="total_money" value="{{$total_money}}" hidden>
                            <button class="pay-now">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection