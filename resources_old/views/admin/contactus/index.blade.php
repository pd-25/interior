@include('admin.include.header')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Edit Contact us</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('contactus') }}">Contactus List</a></li>
                    <li class="breadcrumb-item active">Edit Contactus</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->




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

                <form action="{{ route('contactuseditpost',$contactus->id) }}" method="post"  name="contactuseditpost" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row mb-3">
                        <label for="location" class="col-3 col-form-label">Location *</label>
                        <div class="col-6">
                            <input type="text" name="location" class="form-control" id="location" placeholder="Location" value="{{ $contactus->location }}" />
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email1" class="col-3 col-form-label">Email One</label>
                        <div class="col-6">
                            <input type="text" name="email1" class="form-control" id="email1" placeholder="Email One" value="{{ $contactus->email1 }}" />
                            @error('email1')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email2" class="col-3 col-form-label">Email Two</label>
                        <div class="col-6">
                            <input type="text" name="email2" class="form-control" id="email2" placeholder="Email Two" value="{{ $contactus->email2 }}" />
                            @error('email2')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone1" class="col-3 col-form-label">Phone One </label>
                        <div class="col-6">
                            <input type="text" name="phone1" class="form-control" id="phone1" placeholder="Phone One" value="{{ $contactus->phone1 }}" />
                            @error('phone1')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone2" class="col-3 col-form-label">Phone Two</label>
                        <div class="col-6">
                            <input type="text" name="phone2" class="form-control" id="phone2" placeholder="Phone Two" value="{{ $contactus->phone2 }}" />
                            @error('phone2')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="location_map" class="col-3 col-form-label">Location Map *</label>
                        <div class="col-6">
                            <textarea name="location_map" rows="10" cols="78" required>{!! $contactus->location_map !!}</textarea>
                            @error('location_map')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-end">
                        <div class="col-9">
                            <input type="submit" class="col-md-2 btn btn-danger" name="Submit" />
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->
</div>




@include('admin.include.footer-bar')

@include('admin.include.footer')
