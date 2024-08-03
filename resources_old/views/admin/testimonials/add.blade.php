@include('admin.include.header')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Add Testimonial</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('testimonialslist') }}">Testimonial List</a></li>
                    <li class="breadcrumb-item active">Add Testimonial</li>
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

            {{-- @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}


                <form action="{{ route('testimonialsaddpost') }}" method="post"  name="testimonialsaddpost" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Name *</label>
                        <div class="col-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="" />
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="designation" class="col-3 col-form-label">Designation *</label>
                        <div class="col-6">
                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation" value="" />
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Description *</label>
                        <div class="col-6">
                            <textarea name="description" id="editor1" required></textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="user_image" class="col-3 col-form-label">Image</label>
                        <div class="col-6">
                           <input type="file" name="user_image" multiple >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rating" class="col-3 col-form-label">Rating *</label>
                        <div class="col-6">
                            <select name="rating" class="form-select" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="status" class="col-3 col-form-label">Status *</label>
                        <div class="col-6">
                            <select name="status" class="form-select" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
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
