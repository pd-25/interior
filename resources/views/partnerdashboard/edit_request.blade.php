@include('partnerdashboard.include.header')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <h6>Client Details</h6>
                    </div>
                    <div class="col-6 text-end">
                        <p> <span class="fw-bold">#ServiceId:</span> {{@$bookings->service_id}}</p>
                    </div>
                    <div class="col-lg-4">
                        <small class="m-0 fw-bold">NAME </small>
                        <p>{{ @$bookings->user_details->name}}</p>
                    </div>
                    <div class="col-lg-4">
                        <small class="m-0 fw-bold">Email</small>
                        <p>{{ @$bookings->user_details->email}}</p>
                    </div>
                    <div class="col-lg-2">
                        <small class="m-0 fw-bold">MOBILE NUMBER</small>
                        <p>{{ @$bookings->user_details->mobile_no}}</p>
                    </div>
                    <div class="col-lg-2">
                        <small class="m-0 fw-bold">PIN CODE</small>
                        <p>{{ @$bookings->user_details->pin}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-12 text-center">
        <div class="heading">
            <h2 style="text-transform: uppercase">{{@$bookings->category}} REQUIREMENTS</h2>
        </div>
    </div>
</div>
<form action="{{route('updateRequestdetails')}}" method="post">
    @csrf
    <div class="row">
        <input type="hidden" name="id" value="{{@$bookings->id}}" id="">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Renovation</h4>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" disabled id="item_8" readonly
                                name="renovation[]" value="bedroom"@if (!@empty(@$bookings->renovation))
                                @foreach ( json_decode(@$bookings->renovation) as $item)
                                {{ $item == 'bedroom' ? 'checked' : ''}} 
                                @endforeach @endif >
                            <label class=""
                                for="item_8">
                                <div class="icon">
                                    {{-- <img class="img-fluid" 
                                        src="images/bedroom.png" alt="">--}}
                                </div>
                                <small>Bedroom</small>
                            </label>
                        </div>
                        @php
                           $renovation = json_decode($bookings->renovation);
                        @endphp
                        <div class="col-6">
                            <input type="checkbox" disabled id="item_9" readonly
                                name="renovation[]" value="living_room" @if (!empty(@$bookings->renovation))
                                @foreach ( json_decode(@$bookings->renovation) as $item)
                                {{ $item == 'living_room' ? 'checked' : ''}}
                                @endforeach @endif>
                            <label class=""
                                for="item_9">
                                <div class="icon">
                                    {{-- <img class="img-fluid" 
                                        src="images/living-room.png"
                                        alt="">--}}
                                </div>
                                <small>Living Room</small>
                            </label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" disabled id="item_10"
                                name="renovation[]" value="bathroom"@if (!empty(@$bookings->renovation))
                                @foreach ( json_decode(@$bookings->renovation) as $item)
                                {{ $item == 'bathroom' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_10">
                                <div class="icon">
                                    {{-- <img class="img-fluid" 
                                        src="images/bathroom.png" alt="">--}}
                                </div>
                                <small>bathroom</small>
                            </label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" disabled id="item_11"
                                name="renovation[]" value="design_and_plan"  @if (!empty(@$bookings->renovation))
                                @foreach ( json_decode(@$bookings->renovation) as $item)
                                {{ $item == 'design_and_plan' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_11">
                                <div class="icon">
                                    {{-- <img class="img-fluid" src="images/model.png" 
                                        alt="">--}}
                                </div>
                                <small> design and plan</small>
                            </label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" disabled id="item_12"
                                name="renovation[]" value="kids_room" @if (!empty(@$bookings->renovation))
                                @foreach ( json_decode(@$bookings->renovation) as $item)
                                {{ $item == 'kids_room' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_12">
                                <div class="icon">
                                    {{-- <img class="img-fluid" src="images/play.png" 
                                        alt="">--}}
                                </div>
                                <small>Kids room</small>
                            </label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" disabled id="item_13"
                                name="renovation[]" value="dining_room" @if (!empty(@$bookings->renovation))
                                @foreach ( json_decode(@$bookings->renovation) as $item)
                                {{ $item == 'dining_room' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_13">
                                <div class="icon">
                                    {{-- <img class="img-fluid" 
                                        src="images/dining-table.png"
                                        alt="">--}}
                                </div>
                                <small>Dining room</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Services Required {{@$bookings->service}}</h4>
                        </div>
                            <div class="col-6">
                                <input type="radio" disabled id="item_14" name="services"
                                    value="architecture" {{@$bookings->service =='architecture' ? 'checked':''}}>
                                <label class="" for="item_14">
                                    <div class="icon">
                                        {{-- <img class="img-fluid" src="images/plan.png" alt=""> --}}
                                    </div>
                                    <small>architecture</small>
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" disabled id="item_15" name="services"
                                    value="hvac_consultation" {{@$bookings->service=='hvac_consultation' ? 'checked':''}}>
                                <label class="" for="item_15">
                                    <div class="icon">
                                        {{-- <img class="img-fluid" src="images/workspace.png" 
                                            alt="">--}}
                                    </div>
                                    <small>HVAC consultation</small>
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" disabled id="item_16" name="services"
                                    value="design_consultation" {{@$bookings->service=='design_consultation' ? 'checked':''}}>
                                <label class="" for="item_16" >
                                    <div class="icon">
                                        {{-- <img class="img-fluid" src="images/lighting.png"
                                            alt=""> --}}
                                    </div>
                                    <small>design consultation</small>
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" disabled id="item_17" name="services"
                                    value="electrical_consultation" {{@$bookings->service=='electrical_consultation' ? 'checked':''}}>
                                <label class="" for="item_17" >
                                    <div class="icon">
                                        {{-- <img class="img-fluid" src="images/plumbing.png" 
                                            alt="">--}}
                                    </div>
                                    <small>electrical consultation</small>
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" disabled id="item_18" name="services"
                                    value="contractor" {{@$bookings->service=='contractor' ? 'checked':''}}>
                                <label class="" for="item_18">
                                    <div class="icon">
                                        {{-- <img class="img-fluid" src="images/sketch.png" 
                                            alt="">--}}
                                    </div>
                                    <small>contractor</small>
                                </label>
                            </div>

                            <div class="col-6">
                                <input type="radio" disabled id="item_19" name="services"
                                    value="structural_consultation" {{@$bookings->service=='structural_consultation' ? 'checked':''}}>
                                <label class="" for="item_19">
                                    <div class="icon">
                                        {{-- <img class="img-fluid" src="{{asset('')}} " alt=""> --}}
                                    </div>
                                    <small>structural consultation</small>
                                </label>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Home</h4>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="checkbox" disabled id="item_1"
                                name="home_requirements[]"
                                value="complete_home_solution" 
                                @if (!empty(@$bookings->home_requirements))
                                @foreach ( json_decode(@$bookings->home_requirements) as $item)
                                {{ $item == 'complete_home_solution' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_1">
                                <div class="icon">
                                    {{-- <img class="img-fluid" src="images/smarthome.png" alt="">--}}
                                </div>
                                <small>Complete home solution</small>
                            </label>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="checkbox" disabled id="item_2"
                                name="home_requirements[]" value="living_room" @if (!empty(@$bookings->home_requirements))
                                @foreach ( json_decode(@$bookings->home_requirements) as $item)
                                {{ $item == 'living_room' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_2">
                                <div class="icon">
                                    {{-- <img class="img-fluid" 
                                        src="images/living-room.png"
                                        alt="">--}}
                                </div>
                                <small>Living Room</small>
                            </label>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="checkbox" disabled id="item_3"
                                name="home_requirements[]" value="kitchen" @if (!empty(@$bookings->home_requirements))
                                @foreach ( json_decode(@$bookings->home_requirements) as $item)
                                {{ $item == 'kitchen' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_3">
                                <div class="icon">
                                    {{-- <img class="img-fluid"
                                        src="images/kitchen.png" alt=""> --}}
                                </div>
                                <small>Kitchen</small>
                            </label>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="checkbox" disabled id="item_4"
                                name="home_requirements[]" value="terrace" @if (!empty(@$bookings->home_requirements))
                                @foreach ( json_decode(@$bookings->home_requirements) as $item)
                                {{ $item == 'terrace' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_4">
                                <div class="icon">
                                    {{-- <img class="img-fluid" 
                                        src="images/balcony.png" alt="">--}}
                                </div>
                                <small>Terrace/Balcony</small>
                            </label>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="checkbox" disabled id="item_5"
                                name="home_requirements[]" value="dining_room"@if (!empty(@$bookings->home_requirements))
                                @foreach ( json_decode(@$bookings->home_requirements) as $item)
                                {{ $item == 'dining_room' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_5">
                                <div class="icon">
                                    {{-- <img class="img-fluid" 
                                        src="images/dining-table.png"
                                        alt="">--}}
                                </div>
                                <small>Dining room</small>
                            </label>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="checkbox" disabled id="item_6"
                                name="home_requirements[]" value="kids_room" @if (!empty(@$bookings->home_requirements))
                                @foreach ( json_decode(@$bookings->home_requirements) as $item)
                                {{ $item == 'kids_room' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_6">
                                <div class="icon">
                                    {{-- <img class="img-fluid" src="images/play.png" 
                                        alt="">--}}
                                </div>
                                <small>Kids room</small>
                            </label>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="checkbox" disabled id="item_7"
                                name="home_requirements[]" value="pooja_room" @if (!empty(@$bookings->home_requirements))
                                @foreach ( json_decode(@$bookings->home_requirements) as $item)
                                {{ $item == 'pooja_room' ? 'checked' : ''}} @endforeach @endif>
                            <label class=""
                                for="item_7">
                                <div class="icon">
                                    {{-- <img class="img-fluid" src="images/temple.png" 
                                        alt="">--}}
                                </div>
                                <small>Pooja Room</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <small class="m-0 fw-bold">BUDGET</small>
                            <input type="number" class="form-control bg-light" disabled placeholder="Budget (in lakh)" name="budget" value="{{ @$bookings->budget}}">
                        </div>
                        <div class="col-lg-4">
                            <small class="m-0 fw-bold">BLOCK</small>
                            <input type="text" class="form-control bg-light" disabled placeholder="Block" name="block" value="{{ @$bookings->block}}">
                        </div>
                        <div class="col-lg-4">
                            <small class="m-0 fw-bold">CITY</small>
                            <input type="text" class="form-control bg-light" disabled placeholder="city" name="city" value="{{ @$bookings->city}}">
                        </div>
                        <div class="col-lg-4">
                            <small class="m-0 fw-bold">DISTRICT</small>
                            <input type="text" class="form-control bg-light" disabled placeholder="city" name="district" value="{{ @$bookings->district}}">
                        </div>
                        <div class="col-lg-4">
                            <small class="m-0 fw-bold">PINCODE</small>
                            <input type="text" maxlength="6" disabled pattern="\d{6}" class="form-control pincode bg-light" placeholder="Pin Code" required name="pincode" onkeypress="getPincodeloaction(value)" onblur="getPincodeloaction(value)" value="{{@$bookings->pincode}}">
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4> Partners</h4>
                        </div>
                        @if (!@empty($partners))
                            @foreach (@$partners as $index=>$item)
                                <div class="col-lg-3">
                                    <input type="radio" id="item_exp{{$index+1}}" name="expert_id"
                                    value="{{$item->id}}" {{@$bookings->expert_id == $item->id ? 'checked':''}}>
                                    <label class="" for="item_exp{{@$index+1}}">
                                        <small>{{@$item->name}}</small>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <small class="m-0 fw-bold">Date</small>
                            <input type="Date" class="form-control bg-light" disabled name="date" value="{{ date('Y-m-d', strtotime(@$bookings->date))}}">
                        </div>
                        <div class="col-lg-4">
                            <small class="m-0 fw-bold">Time</small>
                            <input type="Time" class="form-control bg-light" disabled name="time" value="{{ @$bookings->time}}">
                        </div>
                        <div class="col-lg-4">
                            <small class="m-0 fw-bold">Status</small>
                            <select name="status" id="" class="form-control">
                                <option value="0" {{@$bookings->status == 0? 'selected' : '' }}>Pending</option>
                                <option value="1" {{@$bookings->status == 1? 'selected' : '' }}>Approved</option>
                                <option value="2" {{@$bookings->status == 2? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('partner_renovation_edit', encrypt(@$bookings->id))}}" class="btn btn-danger" >Cancel</a>
        </div>
    </div>
</form>

@include('partnerdashboard.include.footer-bar')
@include('partnerdashboard.include.footer')