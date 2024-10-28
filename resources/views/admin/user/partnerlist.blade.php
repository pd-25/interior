@include('admin.include.header')



<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Partner List Manager</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#" style="color: #6600ff;">Partner List Manager</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>




<div class="row">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route("partnerlistexport")}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row mb-3 justify-content-end">
                        {{-- <input type="hidden" name="form_type" value="2"> --}}
                        <div class="col-3" id="FromDateShowHide">
                            <label for="" class="form-label" >From Date</label>
                            <input type="date" class="form-control" id="FromDate" name="fromDate">
                        </div>
                        <div class="col-3" id="ToDateShowHide">
                            <label for="" class="form-label" >To Date</label>
                            <input type="date" class="form-control" id="ToDate" name="toDate">
                        </div>
                        <div class="col-2"  id="DownloadBtnShowHide">
                            <label for="" class="form-label" style="display: list-item;"> </label>
                            <button type="submit" class="btn btn-success btn-success" href="javascript:void(0)">Download Excel</button>
                        </div>
                    </div>
                </form>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Patner Details</th>
                            <th>Firm Name</th>
                            <th>Firm GST</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if(count($user)){
                                $count = 1;
                                foreach($user as $row){
                        ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td>
                                            <?php echo $row->user->name; ?> <br>
                                            <?php echo $row->user->email; ?> <br>
                                            <?php echo $row->user->mobile_no; ?>
                                        </td>
                                        <td><?php echo $row->firm_name; ?></td>
                                        <td><?php echo $row->firm_gst; ?></td>
                                        <td> {{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                        {{-- <td>
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
                                                    <a class="dropdown-item" href="{{ route('Categorieaddpost',[$row->id]) }}"><i class="uil uil-edit me-1"></i>Update</a>
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_contest_category('<?php echo $row->id; ?>')"><i class="uil uil-trash-alt me-1"></i>Delete</a>
                                                </div>
                                            </div>
                                        </td> --}}
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
                                                    <a class="dropdown-item" href="{{ route('partnerdetails',[$row->user->id]) }}"><i class="uil uil-edit me-1"></i>View</a>

                                                    <a class="dropdown-item DeleteEnquiry" href="{{route('partnerdelete', $row->user->id)}}"><i class="uil uil-trash-alt me-1"></i>Delete</a>
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

@push('scripts')
<script>
    $(document).ready(function() {
            $('.DeleteEnquiry').click(function() {
                if (!confirm('Do you want to delete this user?')) {   
                    return false;
                }
            })
        });
	// function delete_contest_category(delete_id){
	// 	if(!confirm('Are you sure you want to delete this item?')){
    //         return false;
	// 	}
	// }
</script>
@endpush
