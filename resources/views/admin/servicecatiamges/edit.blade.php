@include('admin.include.header')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Add Blogs</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ServiceCatimagelist',['category'=>$categorie_id]) }}">Services Category Image List</a></li>
                    <li class="breadcrumb-item active">Add Service Category Image</li>
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

                <form action="{{ route('ServiceCatImageEditPost',['category'=>$categorie_id,'image'=>$servicecatiamge->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Category</label>
                        <div class="col-6">
                            <select name="categorie_id" class="form-select">
                                @foreach ($categorys as $categori)
                                    <?php if($categori->id == $categorie_id): ?>
                                        <option value="{{ $categori->id }}" selected disabled>{{ $categori->name }}</option>
                                    <?php endif; ?>    
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title" class="col-3 col-form-label">Service Image Name*</label>
                        <div class="col-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Title" value="{{ $servicecatiamge->name }}" />
                            @error('title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image_path" class="col-3 col-form-label">Image</label>
                        <div class="col-6">
                           <input type="file" name="image_path" >
                           <img src="{{ asset('storage/'.$servicecatiamge->image_path) }}" width="100" height="auto">
                           <input type="hidden" name="old_image_path" value="{{ $servicecatiamge->image_path }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="col-3 col-form-label">Status *</label>
                        <div class="col-6">
                            <select name="status" class="form-select" required>
                                <option value="1" {{ $servicecatiamge->status == "1" ? "selected":"" }}>Active</option>
                                <option value="0" {{ $servicecatiamge->status == "0" ? "selected":"" }}>Inactive</option>
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
