 <!-- header -->
 @if(Auth::check())
 
   <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="{{asset('/')}}"><img src="{{url('frontend/images/logo.png')}}" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{asset('/')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{asset('hotel')}}">Hotel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contact">Contact us</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-toggle nav-link" href="#" type="button" id="language"
                                            data-toggle="collapse" data-target="#navbarsExample05"
                                            aria-controls="navbarsExample05" aria-expanded="false"
                                            aria-label="Toggle navigation"> English</a>
                                        <div class="dropdown-menu" aria-labelledby="language" id="navbarsExample05">
                                            <a class="dropdown-item"
                                                onclick="doGTranslate('en|en');document.querySelector('#language').textContent='English';"
                                                href="#">
                                                <span class="flag-icon flag-icon-us"></span> English</a>
                                            <a class="dropdown-item"
                                                onclick="doGTranslate('en|ja');document.querySelector('#language').textContent='Japan'"
                                                href="#"><span class="flag-icon flag-icon-jp"></span> Japanese</a>
                                            <a class="dropdown-item"
                                                onclick="doGTranslate('en|vi');document.querySelector('#language').textContent='Việt Nam'"
                                                href="#"><span class="flag-icon flag-icon-vn"></span> Vietnamese</a>
                                            <a class="dropdown-item"
                                                onclick="doGTranslate('en|zh-CN');document.querySelector('#language').textContent='Chinese'"
                                                href="#"><span class="flag-icon flag-icon-cn"></span> Chinese</a>
                                        </div>
                                        <div id="google_translate_element2"></div>
                                    </li>
                                </ul>
                                <div class="btn_user"><a href="#"
                                        style="background-image: url('frontend/images/person_1.jpg');"></a></div>
                                <div class="dropdown">
                                    <div class="name_user"><a href="#" class="dropdown-toggle nav-link" type="button"
                                            id="user_rental" data-toggle="collapse" data-target="#navbarsExample06"
                                            aria-controls="navbarsExample06" aria-expanded="false"
                                            aria-label="Toggle navigation">{{Auth::user()->username}}</a></div>
                                    <div class="dropdown-menu" aria-labelledby="user_rental" id="navbarsExample06">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="{{route('admin.favorite')}}">Favorite</a>
                                        <a class="dropdown-item" href="{{route('frontend.logout.index')}}">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
 
 @else

 

 <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="{{url('frontend/images/logo.png')}}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="{{asset('/')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{asset('hotel')}}">Hotel</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contact us</a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="dropdown-toggle nav-link" href="#" type="button" id="language" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation"> English</a>
                                 <div class="dropdown-menu" aria-labelledby="language" id="navbarsExample05">
                                   <a class="dropdown-item"
                                     onclick="doGTranslate('en|en');document.querySelector('#language').textContent='English';" href="#">
                                     <span class="flag-icon flag-icon-us"></span> English</a>
                                   <a class="dropdown-item"
                                     onclick="doGTranslate('en|ja');document.querySelector('#language').textContent='Japan'" href="#"><span
                                       class="flag-icon flag-icon-jp"></span> Japanese</a>
                                   <a class="dropdown-item"
                                     onclick="doGTranslate('en|vi');document.querySelector('#language').textContent='Việt Nam'"
                                     href="#"><span class="flag-icon flag-icon-vn"></span> Vietnamese</a>
                                   <a class="dropdown-item"
                                     onclick="doGTranslate('en|zh-CN');document.querySelector('#language').textContent='Chinese'"
                                     href="#"><span class="flag-icon flag-icon-cn"></span> Chinese</a>
                                 </div>
                                 <div id="google_translate_element2"></div>
                              </li>
                           </ul>
                           <div class="sign_btn"><a href="{{asset('login/user')}}">Sign in</a></div>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
 @endif
