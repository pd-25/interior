@include('admin.include.header')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Add Blogs</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <?php if(!empty($serviceCatFilterId)){ ?>
                        <li class="breadcrumb-item"><a href="{{ route('searchServiceCatList',[$serviceCatFilterId]) }}">Services Filtered Category List</a></li>
                    <?php }else{ ?>    
                        <li class="breadcrumb-item"><a href="{{ route('Servicecategorylist') }}">Services Category List</a></li>
                    <?php } ?>    
                    <li class="breadcrumb-item active">Edit Services Category</li>
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

                <form action="{{ route('ServiceCategoryEditPost',$serviceCategory->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Services</label>
                        <div class="col-6">
                            <select name="categorie_id" class="form-select">
                                <option value="0" selected disabled>Select a Service</option>
                                @forelse ($categorys as $categori)
                                <option value="{{ $categori->id }}" {{ $serviceCategory->categorie_id == $categori->id ? "selected":"" }}>
                                    {{ $categori->name }}
                                </option>
                                @empty
                                <option value="">No Record Found</option>
                                @endforelse

                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title" class="col-3 col-form-label">Service Category Name *</label>
                        <div class="col-6">
                            <input type="text" name="name" class="form-control" id="title" placeholder="Title" value="{{ $serviceCategory->name }}" />
                            @error('title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="icon" class="col-3 col-form-label">Image</label>
                        <div class="col-6">
                           <input type="file" name="icon" >
                           <img src="{{ asset('storage/'.$serviceCategory->icon) }}" width="100" height="auto">
                           <input type="hidden" name="old_image_path" value="{{ $serviceCategory->icon }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="col-3 col-form-label">Status *</label>
                        <div class="col-6">
                            <select name="status" class="form-select" required>
                                <option value="1" {{ $serviceCategory->status == "1" ? "selected":"" }}>Active</option>
                                <option value="0" {{ $serviceCategory->status == "0" ? "selected":"" }}>Inactive</option>
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
