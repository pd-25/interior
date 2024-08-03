@include('admin.include.header')



<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Testimonial Manager</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#" style="color: #6600ff;">Testimonial List</a>
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
                    <div class="form-row">
                        <div class="col-md-4 row">
                            <div class="">
                                <a href="{{ route('testimonialsadd') }}" class="btn btn-danger">Add Testimonial</a>
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
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if(count($testimonial)){
                                $count = 1;
                                foreach($testimonial as $row){
                        ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><img src="{{ asset('storage/'.$row->user_image) }}" width="50" height="50"></td>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->designation; ?></td>
                                        <td><?php echo $row->description; ?></td>
                                        <td><?php echo $row->rating; ?></td>
                                        <td><?php echo $row->status == '1' ? 'Active' : 'Inactive'; ?></td>
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
                                                    <a class="dropdown-item" href="{{ route('testimonialsedit',$row->id) }}"><i class="uil uil-edit me-1"></i>Update</a>
                                                    <a class="dropdown-item" href="{{ route('testimonials.destroy',$row->id) }}" onclick="return confirm('Are you sure want to delete this record?')"><i class="uil uil-trash-alt me-1"></i>Delete</a>
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
	function delete_contest_category(delete_id){
		if(confirm('Are you sure you want to delete this item?')){

		}
	}
</script>
@endpush
