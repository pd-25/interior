@include('partnerdashboard.include.header')
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
                
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Service No</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Budget</th>
                            <th>Location</th>
                            <th>Book Slot</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!@empty($bookings))
                            @foreach ($bookings as $item)
                                <tr>
                                    <td>{{@$item->service_id}}</td>
                                    <td>{{@$item->category}}</td>
                                    <td>
                                        {{@$item->user_details->name }} <br>
                                        {{@$item->user_details->email }} <br>
                                        {{@$item->user_details->mobile_no }}

                                    </td>
                                    <td>{{@$item->budget }}</td>
                                    <td>
                                        {{@$item->block }} <br>
                                        {{@$item->city }}
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime(@$item->date))}} <br>
                                        {{@$item->time}}
                                    </td>
                                    <td>
                                        @if (@$item->status == 0)
                                            <span class="text-primary"> <i data-feather="alert-triangle"></i> </span>
                                            @elseif(@$item->status == 1)
                                            <span class="text-success"> <i data-feather="check"></i> </span>
                                            @elseif(@$item->status == 2)
                                            <span class="text-danger"> <i data-feather="x"></i> </span>
                                        @endif
                                    </td>
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
                                                <a class="dropdown-item" href="{{ route('partner_renovation_edit', encrypt($item->id)) }}"><i class="uil uil-edit me-1"></i>Update</a>
                                                {{-- <a class="dropdown-item" href="{{ route('bookingsDelete',$item->id) }}" onclick="return confirm('Are you sure want to delete this record?')"><i class="uil uil-trash-alt me-1"></i>Delete</a> --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                                   
                    </tbody>
                </table>
                <div>
                    {!! $bookings->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@include('partnerdashboard.include.footer-bar')
@include('partnerdashboard.include.footer')
