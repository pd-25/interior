<section class="section-mb">
    <div class="container">

        <div class="row justify-content-center" 
        @if ($category == 'home')
            id="home_lead"
        @elseif ($category == 'office')
            id="office_lead"
        @elseif ($category == 'retail')
            id="retail_lead"
        @endif
        >
            <div class="col-lg-8">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <div class="stepform">

                    @guest
                        <div class="step well form-step-bg">
                            <fieldset>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="heading">
                                            <h2>help us to know your better</h2>
                                            <input type="hidden" id="formTypeII" value="HomeRegister">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-area step-login-form">
                                    <div class="form-inner">
                                        <form id="RegisterForm" class="contactForm" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" required
                                                    placeholder="First Name" value="{{ old('name') }}"
                                                    id="firm_name" name="name" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter Email"
                                                    id="email" name="email" required
                                                    value="{{ old('email') }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" id="mobile_code" class="mobile_no form-control"
                                                    placeholder="Phone Number" name="mobile_no"
                                                    onkeypress="New_user_registration_otp_generate()">
                                            </div>
                                            <div class="form-group tuggle toggle-switch">
                                                <div class="tuggle_text">
                                                    <p>You can reach me on WhatsApp</p>
                                                    <p>
                                                        <small>Uncheck to opt-out of upcoming meetings and offer
                                                            alerts</small>
                                                    </p>
                                                </div>
                                                <input type="checkbox" id="switch"><label for="switch">Toggle</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" id="pincode" required class="form-control"
                                                    placeholder="Enter your current residence pincode" name="pin"
                                                    value="{{ old('pin') }}">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    @endguest
                    <form id="contactForm" class="contactForm" method="post" action="#">
                        @csrf
                        <input type="hidden" name="category" value="{{ $category }}">
                        <div class="step well">
                            <fieldset>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="heading">
                                            <h2>Give us your
                                                <span>
                                                    @if(@$category =='home')
                                                        Residential
                                                    @else
                                                        {{ @$category }}
                                                    @endif
                                                </span> requirements</h2>
                                            <input type="hidden" id="formTypeII" value="HomeRegister">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="wrapper1">
                                            <div class="main_tab">
                                                <div class="tab-wrapper">
                                                    <ul class="tabs">
                                                        <li class="tab-link active new_tab" data-tab="1">
                                                            {{-- @if ($category== 'home')
                                                                New
                                                            @elseif($category== 'office')
                                                                New
                                                            @elseif($category== 'retail')
                                                                New
                                                            @endif --}}
                                                            New
                                                        </li>
                                                        <li class="tab-link" data-tab="2">Renovation</li>
                                                    </ul>
                                                </div>
                                                <div class="content-wrapper">
                                                    <div id="tab-1" class="tab-content active">
                                                        @if ($category== 'office')
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <input type="text" id="number_of_cabins" class="form-control" placeholder="Number of Cabins"  name="number_of_cabins">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <input type="text"  id="number_of_worksations" class="form-control" placeholder="Number of Worksations"  name="number_of_worksations">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <input type="text"  id="total_carpet_area" class="form-control" placeholder="Total Carpet Area"  name="total_carpet_area">
                                                                </div>
                                                            </div>
                                                        @elseif($category== 'retail')
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <input type="text" id="total_area" class="form-control" placeholder="Total Area"  name="total_area">
                                                                </div>
                                                            </div>
                                                        @else
                                                            <ul class="select_buttons">
                                                                <div class="select">
                                                                    <input type="checkbox" id="item_1" name="home_requirements[]" value="complete_home_solution">
                                                                    <label class="btn btn-warning button_select" for="item_1">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/smarthome.png" alt="">
                                                                        </div>
                                                                        <h3>Complete home solution</h3>
                                                                    </label>
                                                                </div>

                                                                <div class="select">
                                                                    <input type="checkbox" id="item_2" name="home_requirements[]" value="living_room">
                                                                    <label class="btn btn-warning button_select" for="item_2">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/living-room.png" alt="">
                                                                        </div>
                                                                        <h3>Living Room</h3>
                                                                    </label>
                                                                </div>

                                                                <div class="select">
                                                                    <input type="checkbox" id="item_3" name="home_requirements[]" value="kitchen">
                                                                    <label class="btn btn-warning button_select" for="item_3">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/kitchen.png" alt="">
                                                                        </div>
                                                                        <h3>Kitchen</h3>
                                                                    </label>
                                                                </div>

                                                                <div class="select">
                                                                    <input type="checkbox" id="item_4" name="home_requirements[]" value="terrace">
                                                                    <label class="btn btn-warning button_select" for="item_4">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/balcony.png" alt="">
                                                                        </div>
                                                                        <h3>Terrace/Balcony</h3>
                                                                    </label>
                                                                </div>

                                                                <div class="select">
                                                                    <input type="checkbox" id="item_5" name="home_requirements[]" value="dining_room">
                                                                    <label class="btn btn-warning button_select" for="item_5">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/dining-table.png" alt="">
                                                                        </div>
                                                                        <h3>Dining room</h3>
                                                                    </label>
                                                                </div>

                                                                <div class="select">
                                                                    <input type="checkbox" id="item_6" name="home_requirements[]" value="kids_room">
                                                                    <label class="btn btn-warning button_select" for="item_6">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/play.png" alt="">
                                                                        </div>
                                                                        <h3>Kids room</h3>
                                                                    </label>
                                                                </div>

                                                                <div class="select">
                                                                    <input type="checkbox" id="item_7" name="home_requirements[]" value="pooja_room">
                                                                    <label class="btn btn-warning button_select" for="item_7">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/temple.png" alt="">
                                                                        </div>
                                                                        <h3>Pooja Room</h3>
                                                                    </label>
                                                                </div>
                                                            </ul>
                                                        @endif
                                                    </div>

                                                    <div id="tab-2" class="tab-content">
                                                        @if ($category== 'office')
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <input type="text" id="number_of_cabins_renovation" class="form-control" placeholder="Number of Cabins"  name="number_of_cabins_renovation">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <input type="text"  id="number_of_worksations_renovation" class="form-control" placeholder="Number of Worksations"  name="number_of_worksations_renovation">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <input type="text"  id="total_carpet_area_renovation" class="form-control" placeholder="Total Carpet Area"  name="total_carpet_area_renovation">
                                                                </div>
                                                            </div>
                                                        @elseif($category== 'retail')
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <input type="text" id="total_carpet_area" class="form-control" placeholder="Total Area"  name="total_area_renovation">
                                                                </div>
                                                            </div>
                                                        @else
                                                            <ul class="select_buttons">
                                                                <div class="select">
                                                                    <input type="checkbox" id="item_8" name="renovation[]" value="bedroom">
                                                                    <label class="btn btn-warning button_select" for="item_8">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/bedroom.png" alt="">
                                                                        </div>
                                                                        <h3>Bedroom</h3>
                                                                    </label>
                                                                </div>
                                                                <div class="select">
                                                                    <input type="checkbox" id="item_9" name="renovation[]" value="living_room">
                                                                    <label class="btn btn-warning button_select" for="item_9">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/living-room.png" alt="">
                                                                        </div>
                                                                        <h3>Living Room dasdasd</h3>
                                                                    </label>
                                                                </div>
                                                                <div class="select">
                                                                    <input type="checkbox" id="item_10" name="renovation[]" value="bathroom">
                                                                    <label class="btn btn-warning button_select" for="item_10">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/bathroom.png" alt="">
                                                                        </div>
                                                                        <h3>Bathroom</h3>
                                                                    </label>
                                                                </div>


                                                                <div class="select">
                                                                    <input type="checkbox" id="item_11" name="renovation[]" value="design_and_plan">
                                                                    <label class="btn btn-warning button_select" for="item_11">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/model.png" alt="">
                                                                        </div>
                                                                        <h3> Design and plan</h3>
                                                                    </label>
                                                                </div>

                                                                <div class="select">
                                                                    <input type="checkbox" id="item_12" name="renovation[]" value="kids_room">
                                                                    <label class="btn btn-warning button_select" for="item_12">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/play.png" alt="">
                                                                        </div>
                                                                        <h3>Kids room</h3>
                                                                    </label>
                                                                </div>

                                                                <div class="select">
                                                                    <input type="checkbox" id="item_13" name="renovation[]" value="dining_room">
                                                                    <label class="btn btn-warning button_select" for="item_13">
                                                                        <div class="icon">
                                                                            <img class="img-fluid" src="images/dining-table.png" alt="">
                                                                        </div>
                                                                        <h3>Dining room</h3>
                                                                    </label>
                                                                </div>
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        {{-- ------ PART 2----- --}}
                        <div class="step well">
                            <fieldset>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="heading">
                                            <h2>Services Required</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="select_buttons">

                                            <div class="select">
                                                <input type="radio" id="item_14" name="services" value="architecture">
                                                <label class="btn btn-warning button_select" for="item_14">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/plan.png" alt="">
                                                    </div>
                                                    <h3>Architecture</h3>
                                                </label>
                                            </div>

                                            <div class="select">
                                                <input type="radio" id="item_15" name="services"
                                                    value="hvac_consultation">
                                                <label class="btn btn-warning button_select" for="item_15">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/workspace.png" alt="">
                                                    </div>
                                                    <h3>HVAC</h3>
                                                </label>
                                            </div>

                                            <div class="select">
                                                <input type="radio" id="item_16" name="services"
                                                    value="design_consultation">
                                                <label class="btn btn-warning button_select" for="item_16">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/lighting.png" alt="">
                                                    </div>
                                                    <h3>Design</h3>
                                                </label>
                                            </div>

                                            <div class="select">
                                                <input type="radio" id="item_17" name="services"
                                                    value="electrical_consultation">
                                                <label class="btn btn-warning button_select" for="item_17">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/plumbing.png" alt="">
                                                    </div>
                                                    <h3>Electrical</h3>
                                                </label>
                                            </div>
                                            <div class="select">
                                                <input type="radio" id="item_18" name="services" value="contractor">
                                                <label class="btn btn-warning button_select" for="item_18">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/sketch.png" alt="">
                                                    </div>
                                                    <h3>Contractor</h3>
                                                </label>
                                            </div>

                                            <div class="select">
                                                <input type="radio" id="item_19" name="services"
                                                    value="structural_consultation">
                                                <label class="btn btn-warning button_select" for="item_19">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/mop.png" alt="">
                                                    </div>
                                                    <h3>Civil & structural</h3>
                                                </label>
                                            </div>

                                            <div class="select">
                                                <input type="radio" id="item_20" name="services" value="painting">
                                                <label class="btn btn-warning button_select" for="item_20">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/painting33.png" alt="">
                                                    </div>
                                                    <h3>Painting</h3>
                                                </label>
                                            </div>

                                            <div class="select">
                                                <input type="radio" id="item_21" name="services" value="plumbing">
                                                <label class="btn btn-warning button_select" for="item_21">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/plumbing.png" alt="">
                                                    </div>
                                                    <h3>Plumbing</h3>
                                                </label>
                                            </div>

                                            <div class="select">
                                                <input type="radio" id="item_22" name="services"
                                                    value="furniture_pictures">
                                                <label class="btn btn-warning button_select" for="item_22">
                                                    <div class="icon">
                                                        <img class="img-fluid" src="images/furniture.png" alt="">
                                                    </div>
                                                    <h3>Furniture & Pictures</h3>
                                                </label>
                                            </div>
                                        </ul>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="step well">
                            {{-- ------ PART 3----- --}}
                            <fieldset>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="heading">
                                            <h2>TELL US ABOUT YOUR BUDGET & LOCATION</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="">
                                        {{-- <form class="gaping" action="#" method="post"> --}}
                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" id="budget" class="form-control"
                                                        placeholder="Budget (in lakh)" required name="budget">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <input type="text" id="clintpincode" maxlength="6" pattern="\d{6}"
                                                        class="form-control pincode" placeholder="Pin Code" required
                                                        name="pincode" onkeyup="getPincodeloaction(value)"
                                                        onblur="getPincodeloaction(value)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group redio_checkbox">
                                            <h3 class="showhide">Major Cities</h3>
                                            <div class="redioItemRow" id="popularcity">
                                                {{-- <div class="redio_item">
                                                    <input type='radio' id='Delhi' name='city'
                                                        value='Delhi' />
                                                    <label for='Delhi'><img src="images/delhi.jpg"
                                                            alt="">Delhi</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Bangalore' name='city'
                                                        value='Bangalore'>
                                                    <label for='Bangalore'><img src="images/banglore.jpg"
                                                            alt="">Bangalore</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Pune' name='city'
                                                        value='Pune'>
                                                    <label for='Pune'><img src="images/pune.jpg"
                                                            alt="">Pune</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Hyderabad' name='city'
                                                        value="Hyderabad">
                                                    <label for='Hyderabad'><img src="images/hyderabad.jpg"
                                                            alt="">Hyderabad</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Thane' name='city'
                                                        value="Thane">
                                                    <label for='Thane'><img src="images/thane.jpg"
                                                            alt="">Thane</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Gurgaon' name='city'
                                                        value="Gurgaon">
                                                    <label for='Gurgaon'><img src="images/gurgaon.png"
                                                            alt="">Gurgaon</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Ghaziabad' name='city'
                                                        value="Ghaziabad">
                                                    <label for='Ghaziabad'><img src="images/gaziabad.jpg"
                                                            alt="">Ghaziabad</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Lucknow' name='city'
                                                        value="Lucknow">
                                                    <label for='Lucknow'><img src="images/lkw.webp"
                                                            alt="">Lucknow</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Faridabad' name='city'
                                                        value="Faridabad">
                                                    <label for='Faridabad'><img src="images/faridabad.jpg"
                                                            alt="">Faridabad</label>
                                                </div>
                                                <div class="redio_item">
                                                    <input type='radio' id='Mumbai' name='city'
                                                        value="Mumbai">
                                                    <label for='Mumbai'><img src="images/mumbai.jpg"
                                                            alt="">Mumbai</label>
                                                </div> --}}
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                    </div>

                                </div>
                            </fieldset>
                        </div>

                        <div class="step well">
                            {{-- ------ PART 4----- --}}
                            <fieldset>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="heading">
                                            <h2>TALK TO OUR INTERIOFY EXPERTs (FREE OF COST)</h2>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        <h3 class="heading_b">Book your slot</h3>
                                        {{-- <form class="gaping" action="#" method="post"> --}}
                                        <div class="form-group mb-4">
                                            <input type="Date" id="date" class="form-control" placeholder=" Select Date"
                                                required name="date">
                                        </div>
                                        <div class="form-group">
                                            <input type="Time" id="time" class="form-control" placeholder=" Select Time"
                                                required name="time">
                                        </div>
                                        {{-- </form> --}}
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <!-- <div class="step well">
                            {{-- ------ PART 5----- --}}
                            <fieldset>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="heading">
                                            <h2>TALK TO OUR INTERIFY EXPERTs (FREE OF COST)</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-sm-12" style="height: 500px; overflow-y:auto;">
                                        <div class="container">
                                            <div class="row" id="partnerList" style="display: flex;">
                                                <input type="hidden" name="expert_id" id="expert-id">
                                                @foreach($partners as $index => $partner)
                                                <div class="" style="width: 30%;">
                                                    <div class="box new-box" id="partnerBox{{ $index + 1 }}">
                                                        <div class="row new-row">
                                                            <div class=" new-col-6" style="padding-bottom: 5px;">
                                                                <img class="imboxx" src="https://img.freepik.com/free-photo/young-bearded-man-with-striped-shirt_273609-5677.jpg" alt="User 1" class="user-image">
                                                            </div>
                                                            <div class="new-sec" style="height: fit-content;">
                                                                <div class="col-6" style="padding: 26px 10px;">
                                                                    <h3 style="font-weight: 800; font-size:2rem;">
                                                                        {{ $partner->partner->firm_name }}
                                                                    </h3>
                                                                    <h5 style="font-size: 1.2rem;">About Us</h5>
                                                                </div>
                                                                <div class="col-6" style="margin-top: -5%; margin-left: -1.5%;">

                                                                    <h5 class="white-p" style="font-size: 1.2rem; font-weight: 600; text-shadow: 0 0 5px black;">Rating: 4.0/5.0</h5>
                                                                    <div class="rating">
                                                                        <span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                        <span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                        <span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                        <span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                        <span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="testi new-testi">
                                                            <p class="white-p new-white-p">"Reference site about Lorem Ipsum,
                                                                giving information on its
                                                                origins, as well as a random Lipsum generator."</p>
                                                        </div>

                                                        <div class="col text-center selectPartner" data-index="{{ $index + 1 }}" data-id="{{ $partner->id }}"> <button class="sert new-sert" type="button">Select Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </fieldset>
                        </div> -->

                        <div class="step well">
                            {{-- ------ PART 5----- --}}
                            <fieldset>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="heading">
                                            <h2>TALK TO OUR INTERIOFY EXPERTs (FREE OF COST)</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-sm-12" style="display: flex;">
                                        <div class="container">
                                            <div class="row" id="partnerList"
                                                style="display: grid; gap: 12px; grid-template-columns:1fr 1fr 1fr;">
                                                <input type="hidden" name="expert_id" id="expert-id">
                                                {{-- @foreach ($partners as $index => $partner)
                                                <div>
                                                    <div class="box new-box" id="partnerBox{{ $index + 1 }}">
                                                <div class="row new-row" style="display:flex; justify-content:center;">
                                                    <div class="new-col-6" style="padding-bottom: 5px;">
                                                        <img class="imboxx"
                                                            src="https://img.freepik.com/free-photo/young-bearded-man-with-striped-shirt_273609-5677.jpg"
                                                            alt="User 1" class="user-image">
                                                    </div>
                                                    <div class="new-sec">
                                                        <div style="padding: 26px 10px;">
                                                            <h3 style="font-weight: 800; font-size:2rem;">
                                                                {{ $partner->partner->firm_name }}
                                                            </h3>
                                                            <h5 style="font-size: 1.2rem;">About Us</h5>
                                                        </div>
                                                        <div class="rating-main" style="margin-left: 7%;">

                                                            <h5 class="white-p"
                                                                style="font-size: 1.2rem; font-weight: 600; text-shadow: 0 0 5px black;">
                                                                Rating: 4.0/5.0</h5>
                                                            <div class="rating">
                                                                <span class="text-dark"
                                                                    style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                <span class="text-dark"
                                                                    style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                <span class="text-dark"
                                                                    style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                <span class="text-dark"
                                                                    style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                                <span class="text-dark"
                                                                    style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="testi new-testi" style="margin-top: -6%;">
                                                    <p class="white-p new-white-p" style="font-size: 10px;">"Reference
                                                        site about Lorem Ipsum,
                                                        giving information on its
                                                        origins, as well as a random Lipsum generator."</p>
                                                </div>

                                                <div class="col text-center selectPartner"
                                                    data-index="{{ $index + 1 }}" data-id="{{ $partner->id }}">
                                                    <button class="sert new-sert" type="button"
                                                        style="font-size:12px; font-weight:500;">Select
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach--}}
                                    </div>
                                </div>

                        </div>

                </div>

                </fieldset>
            </div>
            <div class="buttonsGroups button-bg">
                <button class="action back btn btn-outline-info" type="button">Back</button>
                <button class="action next btn btn-outline-success" type="button">Next</button>
                <button class="action submit btn btn-success" onClick="saveBookingData()" type="button">Book Your
                    Service</button>
                <img src="" alt="">
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- /.MultiStep Form -->
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.showhide').hide();
        $('.pincode').attr('autocomplete', 'off');
        $('.pincode').on("cut copy paste", function(e) {
            e.preventDefault();
        });

        $(".redio_item").click(function() {
            $('.redio_item').find(".activeloaction").removeClass("activeloaction");
            $(this).parent().addClass("activeloaction");
        });
    });

    function getPincodeloaction(pincode) {
        if (pincode.length == 6) {
            $.ajax({
                type: 'GET',
                "_token": "{{ csrf_token() }}",
                url: 'https://api.postalpincode.in/pincode/' + pincode,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    $('.showhide').show();
                    var response = response[0].PostOffice;
                    $('#popularcity').find('.redio_item').remove();
                    var selOpts = "";
                    for (i = 0; i < response.length; i++) {
                        var block = response[i]['Name'];
                        var city = response[i]['Region'];
                        var district = response[i]['District'];

                        var image = "<img src='images/city-building.png' alt='No imges'>"

                        if (city == 'Calcutta') {
                            city = 'Kolkata';
                            image = "<img src='images/Kolkata_City.jpg' alt='No imges'>"
                        } else if (city == 'Hyderabad City') {
                            city = 'Hyderabad';
                            image = "<img src='images/hyderabad.jpg' alt='No imges'>"
                        } else if (city == 'Delhi') {
                            image = "<img src='images/delhi.jpg' alt='No imges'>"
                        } else if (city == 'Bangalore HQ') {
                            city = 'Bangalore'
                            image = "<img src='images/banglore.jpg' alt='No imges'>"
                        } else if (city == 'Pune') {
                            image = "<img src='images/pune.jpg' alt='No imges'>"
                        } else if (city == 'Ambala  HQ') {
                            city = 'Ambala'
                            image = "<img src='images/gurgaon.jpg' alt='No imges'>"
                        } else if (city == 'Lucknow  HQ') {
                            city = 'Lucknow'
                            image = "<img src='images/gaziabad.jpg' alt='No imges'>"
                        } else if (city == 'Mumbai') {
                            image = "<img src='images/mumbai.jpg' alt='No imges'>"
                        }

                        selOpts += "<div class='redio_item'><input onClick='GetStateWisePartner(value)' type='radio' id='" + block + "'name='city'value='" + district + '-' + city + '-' + block + "'/><label class='addcolor' for='" + block + "'>" + image + "" + block + '<br/>' + city + "</label></div>";
                    }
                    $('#popularcity').append(selOpts);

                    $(".addcolor").click(function() {
                        $('.addcolor').removeClass("activeloaction");
                        $(this).addClass("activeloaction");
                    });
                },
                error: function() {
                    console.log(response);
                }
            });
        }
        return false
    }

    function GetStateWisePartner(value) {
        $.ajax({
            type: 'GET',
            url: '/Get-Location-Wise-Partner/' + value,
            dataType: 'json',
            _token: "{{ csrf_token() }}",
            success: function(response) {
                var response = response;
                console.log(response)
                $('#partnerList').find('.partner_list').remove();
                var selOpts = "";
                for (i = 0; i < response.length; i++) {
                    var id = response[i]['user']['id'];
                    var name = response[i]['user']['name'];
                    selOpts += '<div class="partner_list">'
                    selOpts += '<div class="box new-box" id="partnerBox'+id+'">'
                    selOpts += '<div class="row new-row" style="display:flex; justify-content:center;">'
                    selOpts += '<div class="new-col-6" style="padding-bottom: 5px;">'
                    selOpts += '<img class="imboxx" src="https://img.freepik.com/free-photo/young-bearded-man-with-striped-shirt_273609-5677.jpg" alt="User 1" class="user-image">'
                    selOpts += '</div>'
                    selOpts += '<div class="new-sec">'
                    selOpts += '<div style="padding: 26px 10px;">'
                    selOpts += '<h3 style="font-weight: 800; font-size:2rem;">'+name+'</h3>'
                    selOpts += '<h5 style="font-size: 1.2rem;">About Us</h5></div>'
                    selOpts += '<div class="rating-main" style="margin-left: 7%;">'
                    selOpts += '<h5 class="white-p" style="font-size: 1.2rem; font-weight: 600; text-shadow: 0 0 5px black;"> Rating: 4.0/5.0</h5>'
                    selOpts += '<div class="rating">'
                    selOpts += '<span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span><span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span><span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span><span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span><span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span></div></div></div></div><div class="testi new-testi" style="margin-top: -6%;"><p class="white-p new-white-p" style="font-size: 10px;">"Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator."</p></div><div class="col text-center selectPartner" data-index="'+id+'" data-id="'+id+'"> <button class="sert new-sert" type="button" style="font-size:12px; font-weight:500;">Select</button></div></div></div>'


                    // selOpts += '<div class="partner_list"><div class="box new-box" id="partnerBox' + id + '">'
                    // selOpts += '<div class="row new-row">'
                    // selOpts += '<div class=" new-col-6" style="padding-bottom: 5px;">'
                    // selOpts += '<img class="imboxx" src="https://img.freepik.com/free-photo/young-bearded-man-with-striped-shirt_273609-5677.jpg" alt="User 1" class="user-image">'
                    // selOpts += '</div>'
                    // selOpts += '<div class="new-sec" style="height: fit-content;">'
                    // selOpts += '<div class="col-6" style="padding: 26px 10px;">'
                    // selOpts += '<h3 style="font-weight: 800; font-size:2rem;">' + name + '</h3>'
                    // selOpts += '<h5 style="font-size: 1.2rem;">About Us</h5>'
                    // selOpts += '</div>'
                    // selOpts += '<div class="col-6" style="margin-top: -5%; margin-left: -1.5%;">'
                    // selOpts += '<h5 class="white-p" style="font-size: 1.2rem; font-weight: 600; text-shadow: 0 0 5px black;">Rating: 4.0/5.0</h5>'
                    // selOpts += '<div class="rating">'
                    // selOpts += '<span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>'
                    // selOpts += '<span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>'
                    // selOpts += '<span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>'
                    // selOpts += '<span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>'
                    // selOpts += '<span class="text-dark" style="font-size: 1.1rem; font-weight: 600;">&#9733;</span>'
                    // selOpts += '</div>'
                    // selOpts += '</div>'
                    // selOpts += '</div>'
                    // selOpts += '</div>'

                    // selOpts += '<div class="testi new-testi">'
                    // selOpts += '<p class="white-p new-white-p">"Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator."</p>'
                    // selOpts += '</div>'
                    // selOpts += '<div class="col text-center selectPartner" data-index="' + id + '" data-id="' + id + '"> <button class="sert new-sert" type="button">Select Now</button>'
                    // selOpts += '</div>'
                    // selOpts += '</div>'
                    // selOpts += '</div>'
                }
                $('#partnerList').append(selOpts);
            },
            error: function() {
                console.log(response);
            }
        });
    }
</script>
@endpush