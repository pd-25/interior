@include('include.header')

<!-- inner banner sec -->
<div class="interior-banner">
    <div class="interior-banner-slider owl-carousel owl-theme">
        @foreach ($serviceBanners as $banner)
            <div class="item banner-item">
                <a href="{{ $banner->link }}"><img src="{{ asset('storage/' . $banner->image_path) }}" alt=""></a>
                <div class="banner-item-info">
                    {{-- <h1>{{ $banner->heading }}</h1> --}}
                    {{-- <p style="color:white">{{ strip_tags($banner->description) }} </p> --}}
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- inner banner sec end  -->
<!-- services section -->
<section class="section-mt">
    <div class="container">
        <div class="row">
            <div class="col-12">
                {!! $serviceDetails->description !!}
            </div>
        </div>
    </div>
</section>
<?php if($serviceDetails->show_child_images == "0"){ ?>
<section>
    <div class="container">
        <div class="service_slider owl-carousel owl_navigation">
            @foreach ($serviceSliders as $slider)
                <div class="service_box">
                    <a href="#">
                        <div class="holiday_pack_area">
                            <div class="service-pack-pic">
                                <img class="img-fluid" src="{{ asset('storage/' . $slider->image_path) }}"
                                    alt="{{ $slider->name }}" />
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<?php }else{ ?>
<?php   foreach($serviceCatSliders as $catSlider){
                $categorySlider = $catSlider->servicecategoryimage;
        ?>

{{-- <section class="services_section">
    <div class="container">
        <div class="interior-heading">
            <h4>{{ $catSlider->name }}</h4>
        </div>
        <div class="service_slider owl-carousel owl_navigation">
            @foreach ($categorySlider as $slider)
                <div class="service_box">
                    <a href="#">
                        <div class="holiday_pack_area">
                            <div class="service-pack-pic">
                                <img class="img-fluid"
                                    src="{{ asset('storage/'.$slider->image_path) }}"
                                    alt="{{ $slider->name }}" />
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}
<?php } ?>
<?php } ?>
<!-- services section end -->
<section class="section-mb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form_wrapper">
                    <div class="form_container">
                        <div class="sec-title">
                            <h2>talk to our INTERIOFY experts</h2>
                        </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-area">
                                    <div class="form-inner">
                                        <form action="{{ route('storeEnquries') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group">
                                                <input type="text" name="fullName" class="form-control"
                                                    placeholder="Enter full name" value="" />
                                                <span class="text-danger">
                                                    @error('fullName')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your email"
                                                    name="email">
                                                <span class="text-danger">
                                                    @error('email')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" id="mobile_code" class="form-control"
                                                    placeholder="Phone Number" name="phoneNo" maxlength="10">
                                                <span class="text-danger">
                                                    @error('phoneNo')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your current residence address"
                                                    name="address" />
                                                <span class="text-danger">
                                                    @error('address')
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your city"
                                                            name="city" value="{{ old('city') }}" />
                                                        <span class="text-danger">
                                                            @error('city')
                                                                <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your state"
                                                            name="state" value="{{ old('state') }}" />
                                                        <span class="text-danger">
                                                            @error('state')
                                                                <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control"
                                                            placeholder="Enter your Pin Code"
                                                            name="pin_code" value="{{ old('pin_code') }}" />
                                                        <span class="text-danger">
                                                            @error('pin_code')
                                                                <strong>{{ $message }}</strong>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="form_type" value="1">
                                            @php
                                                $pageUrl = url()->current();
                                                $pageUrlsplite = explode("services",$pageUrl);
                                            @endphp
                                            <input type="hidden" name="page_ref" value="{{@$pageUrlsplite[1]}}">
                                            <button id="bfc" class="btn my_newBtn" type="submit">
                                                Submit
                                            </button>
                                            <p class="someText">By submitting this form, you agree to
                                                the <a class="turms_text" href="#">privacy policy</a>
                                                and <a class="turms_text" href="#"> terms of use </a>
                                            </p>
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
</section>
@include('include.footer')
