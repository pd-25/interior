@include('admin.include.header')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Add Services Image</h4>
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

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('error') }}
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


                <form action="{{ route('ServiceCatimageaddpost',['category'=>$categorie_id]) }}" method="post"  name="addcategorie" enctype="multipart/form-data" class="form-horizontal">
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
                        <label for="name" class="col-3 col-form-label">Category Image Name </label>
                        <div class="col-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Category Image Name" value="" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="product_name" class="col-3 col-form-label">Image *</label>
                        <div class="col-6">
                           <input type="file" name="servicecatimage[]" multiple>
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
