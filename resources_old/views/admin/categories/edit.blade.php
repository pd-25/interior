@include('admin.include.header')





<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Add Blogs</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('Categorielist') }}">Services List</a></li>
                    <li class="breadcrumb-item active">Add Services</li>
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

                <form action="{{ route('Categoryeditpost',$category->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-3 col-form-label">Title *</label>
                        <div class="col-6">
                            <input type="text" name="name" class="form-control" id="title" placeholder="Title" value="{{ $category->name }}" />
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Show Child Category's Image</label>
                        <div class="col-6">
                            <select name="show_child_images" class="form-select">
                                <option value="1" {{ $category->show_child_images == "1" ? "selected":"" }}>Yes</option>
                                <option value="0" {{ $category->show_child_images == "0" ? "selected":"" }}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Description *</label>
                        <div class="col-6">
                            <textarea name="description" id="editor1" required>{!! $category->description !!}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="icon" class="col-3 col-form-label">Image</label>
                        <div class="col-6">
                           <input type="file" name="icon" >
                           <img src="{{ asset('storage/'.$category->icon) }}" width="100" height="auto">
                           <input type="hidden" name="old_image_path" value="{{ $category->icon }}" accept="image/*">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="col-3 col-form-label">Status *</label>
                        <div class="col-6">
                            <select name="status" class="form-select" required>
                                <option value="1" {{ $category->status == "1" ? "selected":"" }}>Active</option>
                                <option value="0" {{ $category->status == "0" ? "selected":"" }}>Inactive</option>
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
