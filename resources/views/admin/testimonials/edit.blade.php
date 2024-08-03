@include('admin.include.header')





<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Edit Testimonial</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('testimonialslist') }}">Testimonial List</a></li>
                    <li class="breadcrumb-item active">Edit Testimonial</li>
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

                <form action="{{ route('testimonialseditpost',$testimonial->id) }}" method="post"  name="testimonialeditpost" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Name *</label>
                        <div class="col-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $testimonial->name }}" />
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="designation" class="col-3 col-form-label">Designation *</label>
                        <div class="col-6">
                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation" value="{{ $testimonial->designation }}" />
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Description *</label>
                        <div class="col-6">
                            <textarea name="description" id="editor1" required>{!! $testimonial->description !!}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="user_image" class="col-3 col-form-label">Image</label>
                        <div class="col-6">
                           <input type="file" name="user_image" >
                           <img src="{{ asset('storage/'.$testimonial->user_image) }}" width="100" height="auto">
                           <input type="hidden" name="old_image_path" value="{{ $testimonial->user_image }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rating" class="col-3 col-form-label">Rating *</label>
                        <div class="col-6">
                            <select name="rating" class="form-select" required>
                                <option value="1" @if($testimonial->rating == '1') selected @endif>1</option>
                                <option value="2" @if($testimonial->rating == '2') selected @endif>2</option>
                                <option value="3" @if($testimonial->rating == '3') selected @endif>3</option>
                                <option value="4" @if($testimonial->rating == '4') selected @endif>4</option>
                                <option value="5" @if($testimonial->rating == '5') selected @endif>5</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="col-3 col-form-label">Status *</label>
                        <div class="col-6">
                            <select name="status" class="form-select" required>
                                <option value="1" @if($testimonial->status == '1') selected @endif>Active</option>
                                <option value="0" @if($testimonial->status == '0') selected @endif>Inactive</option>
                            </select>
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
