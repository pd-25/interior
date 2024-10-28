@include('admin.include.header')



<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">User List Manager</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#" style="color: #6600ff;">User List Manager</a>
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
                <div class="row mb-4">
                    <div class="col-md-6">
                        <select class="form-select" name="userstatus" id="userSelect">
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <a href="javascript:void(0);" class="btn btn-success" id="searchCategorybyService"><i class="uil uil-search me-1"></i> Search User by Status</a>
                    </div>    
                </div>  
                <form action="{{route("customerlistexport")}}" method="post">
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Occupation</th>
                            <th>City/Pin</th>
                            <th>Country</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($user->count())
                            @foreach ($user as $users)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ @$users->name }}</td>
                                    <td>{{ @$users->email }}</td>
                                    <td>{{ @$users->mobile_no }} </td>
                                    <td>{{ @$users->occupation }}</td>
                                    <td>{{ @$users->city }}</td>
                                    <td>{{ @$users->country }}</td>
                                    <td> {{ date('d-m-Y', strtotime(    @$users->created_at)) }}</td>
                                    <td>
                                        <div class="btn-group mt-2 me-1">
                                            <button type="button" class="btn btn-secondary">Action</button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-chevron-down">
                                                        <polyline points="6 9 12 15 18 9"></polyline>
                                                    </svg>
                                                </i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item viewUser" data-id="{{ $users->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#userModal" href=""><i
                                                        class="uil uil-eye me-1"></i>View</a>

                                                <a class="dropdown-item " href="#"
                                                    onclick="updateStatus({{ $users->id }},{{ $users->status }});">
                                                    @if ($users->status)
                                                        <i class="uil uil-toggle-off me-1"></i>Deactivate
                                                    @else
                                                        <i class="uil uil-toggle-on me-1"></i>Activate
                                                    @endif
                                                </a>
                                            </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            No Users Found
                        @endif
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

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" value="" id="name" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" value="" id="email" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input class="form-control" value="" id="mobile" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="occu" class="form-label">Occupation</label>
                            <input class="form-control" value="" id="occu" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="city" class="form-label">City/Pin</label>
                            <input class="form-control" value="" id="city" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="country" class="form-label">Country</label>
                            <input class="form-control" value="" id="country" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="doj" class="form-label">DOJ</label>
                            <input class="form-control" value="" id="doj" readonly>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>


@include('admin.include.footer-bar')

@include('admin.include.footer')


<script>
    $(".viewUser").click(function() {
        event.preventDefault(); // Prevent the default behavior of the link    
        var id = $(this).data("id");
        $.ajax({
            url: "{{ route('viewcustomer') }}",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                // Handle the response data
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile_no);
                $('#occu').val(data.occupation);
                $('#city').val(data.city);
                $('#country').val(data.country);
                $('#doj').val(data.created_at);
            },
            error: function(xhr, status, error) {
                // Handle errors, if any
                console.log(error);
            }
        });

    });
</script>

<script>
    function updateStatus(id, status) {
        $.ajax({
            url: "{{ route('updatestatus') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                status: status
            },
            success: function(data) {
                // Handle the response data                
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle errors, if any
                //console.log(error);
            }
        });
    }
</script>

{{-- <script>
    $(document).ready(function() {
        $('#userSelect').change(function() {
            var status = $(this).val();
            alert(status);
            $.ajax({
                url: "{{ route('customerlist') }}",
                type: "GET",
                data: {
                    status: status
                },
                success: function(data) {
                    alert('status changed');
                    location.reload();
                },

            });
        });
    });
</script> --}}


@push('scripts')
    <script>
        function delete_contest_category(delete_id) {
            if (confirm('Are you sure you want to delete this item?')) {

            }
        }
    </script>
@endpush
