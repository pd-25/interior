@include('admin.include.header')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Partner Manager</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('partnerlist')}}">Partner List</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#" style="color: #6600ff;">Partner Details Edit</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <form action="{{route('partnerupdate', $user->id)}}">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <div class="col-6 mb-2">
                        <div class="fw-bold h6">
                            Partner Details
                        </div>
                        {{-- {{(($user->partner->major_category))}} --}}
                    </div>
                    <div class="col-6 mb-2 text-end">
                        <span>#Partner Id:  </span> <span class="fw-bold">{{@$user->partner->partner_id}}</span>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Partner Name</label>
                        <input type="text" class="form-control" name="full_name" value="{{@$user->name}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Partner Email</label>
                        <input type="text" class="form-control" name="email" value="{{@$user->email}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Partner Mobile No</label>
                        <input type="text" class="form-control" name="mobile_no" value="{{@$user->mobile_no}}"/>
                    </div>

                    <div class="col-4 mb-2">
                        <label class="form-label">Partner Country</label>
                        <input type="text" class="form-control" name="country" value="{{@$user->country}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Partner State</label>
                        <input type="text" class="form-control" name="state" value="{{@$user->state}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Partner City</label>
                        <input type="text" class="form-control" name="city" value="{{@$user->city}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Partner Pin</label>
                        <input type="text" class="form-control" name="pin" value="{{@$user->pin}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Partner DOB</label>
                        <input type="date" class="form-control" name="dob" value="{{@$user->dob}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Partner Occupation</label>
                        <input type="text" class="form-control" name="occupation" value="{{@$user->occupation}}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                       <p class="h6 fw-bold my-2">Business Details</p>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Firm name</label>
                        <input type="text" class="form-control" name="firm_name" value="{{@$user->partner->firm_name}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Pan</label>
                        <input type="text" class="form-control" name="firm_pan" value="{{@$user->partner->firm_pan}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">GST</label>
                        <input type="text" class="form-control" name="firm_gst" value="{{@$user->partner->firm_gst}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">City</label>
                        <select name="city" id="city" class="form-control">
                            <option value="" selected>Select City</option>
                            <option value="Delhi"  {{@$user->partner->city == 'Delhi' ? 'selected': ''}}>Delhi</option>
                            <option value="Hyderabad" {{@$user->partner->city == 'Hyderabad' ? 'selected': ''}}>Hyderabad</option>
                            <option value="Bangalore" {{@$user->partner->city == 'Bangalore' ? 'selected': ''}}>Bangalore</option>
                            <option value="Pune" {{@$user->partner->city == 'Pune' ? 'selected': ''}}>Pune</option>
                            <option value="Thane" {{@$user->partner->city == 'Thane' ? 'selected': ''}}>Thane</option>
                            <option value="Gurgaon" {{@$user->partner->city == 'Gurgaon' ? 'selected': ''}}>Gurgaon</option>
                            <option value="Gaziabad" {{@$user->partner->city == 'Gaziabad' ? 'selected': ''}}>Gaziabad</option>
                            <option value="Lucknow" {{@$user->partner->city == 'Lucknow' ? 'selected': ''}}>Lucknow</option>
                            <option value="Faridabad" {{@$user->partner->city == 'Faridabad' ? 'selected': ''}}>Faridabad</option>
                            <option value="Mumbai" {{@$user->partner->city == 'Mumbai' ? 'selected': ''}}>Mumbai</option>
                        </select>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">Official Company Address</label>
                        <input type="text" class="form-control" name="official_company_address" value="{{@$user->partner->Official_Company_Address}}"/>
                    </div>
                    <div class="col-4 mb-2">
                        <label class="form-label">How many years you have been this line</label>
                        <input type="text" class="form-control" name="how_many_years" value="{{@$user->partner->how_many_years}}"/>
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label">Partner Portfolio link</label>
                        <input type="text" class="form-control" name="partnerportfolio" value="{{@$user->partner->partnerportfolio}}"/>
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label">Your Line Of Work
                        </label>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" 
                                    @if (!@empty(($user->partner->major_category)))
                                        @foreach (explode(",",$user->partner->major_category) as $item)
                                            {{$item == 'Architect' ? 'checked': ''}}
                                        @endforeach
                                    @endif name="major_category[]" value="Architect" />
                                    <label for="" class="major_category">Architect</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",",$user->partner->major_category) as $item)
                                        {{$item == 'Interior Designer' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="Interior Designer" />
                                    <label for="" class="major_category">Interior Designer</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",",$user->partner->major_category) as $item)
                                        {{$item == '3D Designer' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="3D Designer" />
                                    <label for="" class="major_category">3D Designer</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",",$user->partner->major_category) as $item)
                                        {{$item == 'Civil & Structure' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="Civil & Structure" />
                                    <label for="" class="major_category">Civil & Structure</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",",$user->partner->major_category) as $item)
                                        {{$item == 'HVAC' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="HVAC" />
                                    <label for="" class="major_category">HVAC</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",",$user->partner->major_category) as $item)
                                        {{$item == 'Plumbing' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="Plumbing" />
                                    <label for="" class="major_category">Plumbing</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",",$user->partner->major_category) as $item)
                                        {{$item == 'Electrical' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="Electrical" />
                                    <label for="" class="major_category">Electrical</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",",$user->partner->major_category) as $item)
                                        {{$item == 'Contractor' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="Contractor" />
                                    <label for="" class="major_category">Contractor</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",",$user->partner->major_category) as $item)
                                        {{$item == 'Painting' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="Painting" />
                                    <label for="" class="major_category">Painting</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 mb-3">
                                <div class="radio-label-btn">
                                    <input type="checkbox" @if (!@empty(($user->partner->major_category)))
                                    @foreach (explode(",", $user->partner->major_category) as $item)
                                        {{$item == 'Others' ? 'checked': ''}}
                                    @endforeach
                                @endif name="major_category[]" value="Others" />
                                    <label for="" class="major_category">Others</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label">Your Work Profile
                        </label>
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <div class="radio-label-btn">
                                    <input type="radio" name="minor_category" value="Small Firm ( Upto 5 employees)" {{@$user->partner->minor_category == 'Small Firm ( Upto 5 employees)' ? 'checked':'' }}>
                                    <label for="" class="minor_category">Small Firm ( Upto 5 employees)</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-1">
                                <div class="radio-label-btn">
                                    <input type="radio" name="minor_category" value="Mid Size to Large Firm ( More than 5 employees)" {{@$user->partner->minor_category == 'Mid Size to Large Firm ( More than 5 employees)' ? 'checked':'' }}>
                                    <label for="" class="minor_category">Mid Size to Large Firm ( More than 5 employees)</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-1">
                                <div class="radio-label-btn">
                                    <input type="radio" name="minor_category" {{@$user->partner->minor_category == 'Employee' ? 'checked':'' }} value="Employee">
                                    <label for="" class="minor_category">Employee</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-1">
                                <div class="radio-label-btn">
                                    <input type="radio" name="minor_category" {{@$user->partner->minor_category == 'Freelancer' ? 'checked':'' }} value="Freelancer">
                                    <label for="" class="minor_category">Freelancer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>



@include('admin.include.footer-bar')
@include('admin.include.footer')
@push('scripts')
    <script>
        function delete_contest_category(delete_id) {
            if (confirm('Are you sure you want to delete this item?')) {

            }
        }
    </script>
@endpush