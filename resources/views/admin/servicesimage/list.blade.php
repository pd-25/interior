@include('admin.include.header')



<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Services Image Manager</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#" style="color: #6600ff;">Services Image List</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <select name="categorie_id" id="categorie_id" class="form-select">
                            <option value="0" selected disabled>Select a Service</option>
                            @foreach ($categorys as $categori)
                                <option value="{{ $categori->id }}" {{ $categori->id == $categorie_id ? "selected":"" }}>
                                    {{ $categori->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <a href="javascript:void(0);" class="btn btn-success" id="searchImagebyCat"><i class="uil uil-search me-1"></i> Search Images by Service</a>
                        <a href="{{ route('Serviceimagelist') }}" class="btn btn-info"><i class="uil uil-sync me-1"></i> Refresh</a>
                        <a href="{{ route('Serviceimageadd') }}" class="btn btn-primary"><i class="uil uil-plus me-1"></i> Add Services Images</a>
                    </div>    
                </div>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->
</div>
<!-- end row-->

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

                <table id="dataTable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Service</th>
                            <th>Services Image Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if(count($servicesimages)){
                                $count = 1;
                                foreach($servicesimages as $row){
                        ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><img src="{{ asset('storage/'.$row->image_path) }}" width="50" height="50"></td>
                                        <td>{{ $row->serviceTeel->name }}</td>
                                        <td>{{ $row->services_name }}</td>
                                        <td> {{ date('d-m-Y', strtotime(@$row->created_at)) }}</td>
                                        <td>
                                            <div class="btn-group mt-2 me-1">
                                                <button type="button" class="btn btn-secondary">Action</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                            <polyline points="6 9 12 15 18 9"></polyline>
                                                        </svg>
                                                    </i>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item" href="{{ route('Serviceimageedit',[$row->id]) }}"><i class="uil uil-edit me-1"></i>Update</a>
                                                    <a class="dropdown-item" href="{{ route('serviceimage.destroy',$row->id) }}" onclick="return confirm('Are you sure want to delete this record?')"><i class="uil uil-trash-alt me-1"></i>Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-->
</div>
<!-- end row-->



@include('admin.include.footer-bar')

@include('admin.include.footer')

<script>
	$(document).on("click","#searchImagebyCat",function(){
        var categorie_id = $("#categorie_id").val();
        if(categorie_id != null){
            window.location =  `{{URL::to('admin/searchserviceimagelist/${categorie_id}')}}`;
        }else{
            window.location =  `{{URL::to('admin/serviceimagelist')}}`;
        }
            
    });
</script>
