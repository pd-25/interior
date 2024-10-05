<!DOCTYPE html>
<html lang="en">


<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
     <title>INTERIOR</title>
     <!-- favicon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
     <!-- Owlcarosuel CSS -->
     <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
     <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
     <!-- Main Stylesheet -->
     <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
     <!-- Responsive Css -->
     <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.0') }}">
     <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
     @stack('styles')
     <!-- jQuery v3.7.1 -->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-W8S2L1S8ZN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-W8S2L1S8ZN');
</script>
</head>

<body>

     <div class="go_to_form_div_1">
          <div class="fab-wrapper">
               <input id="fabCheckbox" type="checkbox" class="fab-checkbox" />
               <label class="fab" for="fabCheckbox">
                    <div style="position: absolute; text-align:center; top:50%; left:50%; transform: translate(-50%, -50%); color:white; font-weight: bold;
                    line-height: 15px;">
                         Book a <br> call
                    </div>
                    {{-- <span class="fab-dots fab-dots-1"></span> --}}
                    {{-- <span class="fab-dots fab-dots-1"></span>
                   <span class="fab-dots fab-dots-2"></span>
                   <span class="fab-dots fab-dots-3"></span> --}}
               </label>
               <div class="fab-wheel">
                    <a href="{{ route('home-services') }}#home_lead" class="fab-action fab-action-1">
                         Residential
                    </a>
                    <a href="{{ route('office-services') }}#office_lead"
                         class="fab-action fab-action-2">
                         Office
                    </a>
                    <a href="{{ route('retail-services') }}#retail_lead"
                         class="fab-action fab-action-3">
                         Retail
                    </a>
                    {{-- <a href="mailto:kishloy.official@gmail.com" class="fab-action fab-action-4">
                       <i class='bx bx-envelope'></i>
                   </a> --}}
               </div>
          </div>
          {{-- <a href="/contact-us"><button class="go_to_form_btn_1" style="margin-bottom:40px">Book your partner</button></a> --}}
     </div>

     <a href="#" class="scroll"><i class="fa-solid fa-angle-up"></i></a>
     <!-- header start -->

     <div class="headerWarp">
          <div class="topbar-area">
               <div class="container-fluid">
                    <div class="top_bar_cont">
                         {{-- <a id="login_btn" href="#" data-toggle="modal" data-target="#loginModal">Login/Register</a> --}}
                         {{-- <a id="login_btn" href="#" data-toggle="modal" data-target="#registerModal">Login/Register</a> --}}

                         @if(Auth::check())
                              @if(Auth::user()->type == 'user')
                                   <a id="login_btn"
                                        href="{{ route('user-dashboard') }}">Dashboard</a> | <a
                                        id="login_btn" href="{{ route('logout') }}">Logout</a>
                              @else
                                   <a id="login_btn"
                                        href="{{ route('partner-dashboard') }}">Dashboard</a> | <a
                                        id="login_btn" href="{{ route('logout') }}">Logout</a>
                              @endif
                         @else
                              <a id="login_btn" href="{{ route('login') }}">Login/Register</a>
                         @endif

                    </div>
               </div>
          </div>
          <div class="container-fluid">
               <header class="header">
                    <div class="header-main">
                         <div class="logo">
                              <a href="{{ url('/') }}" class="logomain">
                                   <img src="{{ asset('images/new-logo.jpeg') }}" alt=""
                                        class="logo_img">
                              </a>
                         </div>
                         <div class="open-nav-menu">
                              <span></span>
                         </div>
                         <div class="menu-overlay">
                         </div>
                         <!-- navigation menu start -->
                         <nav class="nav-menu">
                              <div class="close-nav-menu">
                                   <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        width="512" height="512" x="0" y="0" viewBox="0 0 329.26933 329"
                                        style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                             <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"
                                                  fill="#000000" data-original="#000000" class=""></path>
                                        </g>
                                   </svg>
                              </div>
                              <ul class="menu">
                                   <li class="menu-item">
                                        <a href="{{ url('/') }}">Home</a>
                                   </li>
                                   <li class="menu-item">
                                        <a href="{{ route('about-us') }}">About us</a>
                                   </li>
                                   <li class="menu-item menu-item-has-children">
                                        <a href="#" data-toggle="sub-menu">Our Services </a>
                                        <ul class="sub-menu">
                                             @foreach($categories as $category)
                                                  <li class="menu-item">
                                                       <a
                                                            href="{{ route('serviceDetails',[$category->slug]) }}">{{ $category->name }}</a>
                                                  </li>

                                             @endforeach
                                        </ul>
                                   </li>
                                   <li class="menu-item">
                                        <a href="{{ route('partnerwithus') }}">Partner With Us</a>
                                   </li>
                                   <li class="menu-item">
                                        <a href="{{ route('blogs') }}">Blogs</a>
                                   </li>
                                   {{-- <li class="menu-item">
                                   <a href="#">FAQS</a>
                                   </li> --}}
                                   <li class="menu-item">
                                        <a href="{{ route('contact-us') }}">Contact Us</a>
                                   </li>
                              </ul>
                         </nav>
                         <!-- navigation menu end -->
                    </div>
               </header>
          </div>
     </div>

     <!-- header end -->