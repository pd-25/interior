@include('admin.include.header')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Add Services Image</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <?php if(!empty($serviceImgFilterId)){ ?>
                        <li class="breadcrumb-item"><a href="{{ route('searchServiceImageList',[$serviceImgFilterId]) }}">Services Filtered Image List</a></li>
                    <?php }else{ ?>    
                        <li class="breadcrumb-item"><a href="{{ route('Serviceimagelist') }}">Services Image List</a></li>
                    <?php } ?>
                    <li class="breadcrumb-item active">Add Services Image</li>
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


                <form action="{{ route('Serviceimageaddpost') }}" method="post"  name="addcategorie" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Services</label>
                        <div class="col-6">
                            <select name="categorie_id" class="form-select">
                                <option value="0" selected disabled>Select a Service</option>
                                @forelse ($categorys as $categori)
                                <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                                @empty
                                <option value="">No Record Found</option>
                                @endforelse

                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="services_name" class="col-3 col-form-label">Service Image Name </label>
                        <div class="col-6">
                            <input type="text" name="services_name" class="form-control" id="services_name" placeholder="Service Name" value="" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row mb-3 dropzone">
                        <label for="product_name" class="col-3 col-form-label">Image *</label>
                        <div class="col-6">
                            <div class="fallback">
                                <input name="file" type="file" multiple="">
                            </div>
                            <div class="dz-message needsclick">
                                <i class="h1 text-muted uil-cloud-upload"></i>
                                <h3>Drop files here or click to upload.</h3>
                                <span class="text-muted">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                            </div>
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label for="product_name" class="col-3 col-form-label">Image *</label>
                        <div class="col-6">
                           <input type="file" name="serviceimage[]" multiple>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Status</label>
                        <div class="col-6">
                            <select name="status" class="form-select">
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
