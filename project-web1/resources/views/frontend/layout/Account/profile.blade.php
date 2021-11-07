@extends('frontend.index-account')
@section('content')
  
  <!-- information user -->
  <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <!-- image user -->
                <img src="./images/user_profile.png" alt="Admin" class="rounded-circle" width="50%">
                <div class="mt-3">
                  <h4>Van Anh</h4>
                  <p class="text-secondary mb-1">0987654321</p>
                  <p class="text-muted font-size-sm">Quan 9, Ho Chi Minh</p>
                  <!-- <button class="btn btn-primary">Follow</button> -->
                  <button class="btn btn-outline-primary" style="background-color: 	#FF9900; color: #fff;">Home</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  Van Anh
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  admin@admin.com
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  0987654321
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Date Of Birth</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  23/11/2002
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  Bay Area, San Francisco, CA
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-info " target="__blank" href="./edit_profile.html">Edit</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
  <!-- COUPONS DISCOUNT -->
  <div class="container">
    <section id="labels">
      <!-- <div class="container"> -->
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="dl">
            <div class="brand">
              <h2>NEW USER</h2>
            </div>
            <div class="discount alizarin">15%
              <div class="type">off</div>
            </div>
            <div class="descr">
              <strong>Welcome new customers*.</strong>
              <strong>12/10/2021 - 23/10/2021</strong>
              <p>Apply for the first time using the service</p>
            </div>
            <div class="ends">
              <small>* Conditions and restrictions apply.</small>
            </div>
            <div class="coupon midnight-blue">
              <a data-toggle="collapse" href="#code-1" class="open-code">Get a code</a>
              <div id="code-1" class="collapse code">LV5MAY14</div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="dl">
            <div class="brand">
              <h2>lacoste</h2>
            </div>
            <div class="discount emerald">
              50%
              <div class="type">
                off
              </div>
            </div>
            <div class="descr">
              <strong>
                Ea per iuvaret ocurreret*.
              </strong>
              sit ea detraxit menandri mediocritatem, in mel dicant mentitum.
            </div>
            <div class="ends">
              <small>
                * Conditions and restrictions apply.
              </small>
            </div>
            <div class="coupon midnight-blue">
              <a data-toggle="collapse" href="#code-2" class="open-code">Get a code</a>
              <div id="code-2" class="collapse in code">
                MNO123ST
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="dl">
            <div class="brand">
              <h2>
                converse
              </h2>
            </div>
            <div class="discount peter-river">
              15%
              <div class="type">
                off
              </div>
            </div>
            <div class="descr">
              <strong>
                Solet consul tractatos ei pro*.
              </strong>
              Ei mei quot invidunt explicari, placerat percipitur intellegam.
            </div>
            <div class="ends">
              <small>
                * Conditions and restrictions apply.
              </small>
            </div>
            <div class="coupon midnight-blue">
              <a data-toggle="collapse" href="#code-3" class="open-code">Get a code</a>
              <div id="code-3" class="collapse code">
                OLV4SY3R
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="dl">
            <div class="brand">
              <h2>
                adidas
              </h2>
            </div>
            <div class="discount amethyst">
              25%
              <div class="type">
                off
              </div>
            </div>
            <div class="descr">
              <strong>
                Cu aliquip persius alterum duo*.
              </strong>
              Possit equidem disputando usu et, sea invidunt scriptorem in.
            </div>
            <div class="ends">
              <small>
                * Conditions and restrictions apply.
              </small>
            </div>
            <div class="coupon midnight-blue">
              <a data-toggle="collapse" href="#code-4" class="open-code">Get a code</a>
              <div id="code-4" class="collapse code">
                ZUY4OPLQ
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </section>
    @endsection