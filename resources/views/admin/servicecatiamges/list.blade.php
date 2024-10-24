@include('admin.include.header')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Services Image Manager</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <?php if(!empty($serviceCatFilterId)){ ?>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('searchServiceCatList',[$serviceCatFilterId]) }}" style="color: #6600ff;">Services Filtered Category List</a>
                        </li>
                    <?php }else{ ?>    
                        <li class="breadcrumb-item active">
                            <a href="{{ route('Servicecategorylist') }}" style="color: #6600ff;">Services Category List</a>
                        </li>
                    <?php } ?>    
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
                    <div class="form-row">
                        <div class="col-md-4 row">
                            <div class="">
                                <a href="{{ route('ServiceCatimageadd',['category'=>$categorie_id]) }}" class="btn btn-danger">Add Services Category Images</a>
                            </div>
                        </div>
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
                            <th>Service Category</th>
                            <th>Category Image Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if(count($servicecatiamges)){
                                $count = 1;
                                foreach($servicecatiamges as $row){
                        ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><img src="{{ asset('storage/'.$row->image_path) }}" width="50" height="50"></td>
                                        <td>{{ $row->servicecategory->name }}</td>
                                        <td><?php echo $row->name; ?></td>
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
                                                    <a class="dropdown-item" href="{{ route('ServiceCatimageedit',['category'=>$categorie_id,'image'=>$row->id]) }}"><i class="uil uil-edit me-1"></i>Update</a>
                                                    <a class="dropdown-item" href="{{ route('ServiceCatimageDestroy',['category'=>$categorie_id,'image'=>$row->id]) }}" onclick="return confirm('Are you sure want to delete this record?')"><i class="uil uil-trash-alt me-1"></i>Delete</a>
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

