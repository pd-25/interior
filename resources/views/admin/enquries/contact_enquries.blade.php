@include('admin.include.header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Contact Enquries List</h5>
                </div>
                <div class="card-body">
                    <form action="{{route("enquriesexport_data")}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row mb-3 justify-content-end">
                            <input type="hidden" name="form_type" value="2">
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="table-info">
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact Details</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($enquiry))
                                @foreach ($enquiry as $index=>$item)
                                <tr>
                                    <td scope="row">{{@$index+1}}</td>
                                    <td scope="row">{{@$item->fullName}}</td>
                                    <td scope="row">
                                        <div>{{@$item->email}}</div>
                                        <div>{{@$item->phoneNo}}</div>
                                    </td>
                                    <td scope="row">{{@$item->message}}</td>
                                    <td scope="row">
                                        @if (@$item->status == 0)
                                            <span class="text-info">Panding</span>
                                        @elseif(@$item->status == 1)
                                            <span class="text-success">Done</span>
                                        @elseif(@$item->status == 2)
                                            <span class="text-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td> {{ date('d-m-Y h:i A', strtotime(@$item->created_at)) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                <a href="{{route('enquries.edit', @$item->id)}}" class="btn btn-outline-primary btn-sm mx-2">Edit</a>
                                            </div>
                                            <form action="{{route('enquriesdelete', @$item->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-outline-danger DeleteEnquiry btn-sm" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div>
                            {{@$enquiry->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
            $('.DeleteEnquiry').click(function() {
                if (!confirm('Do you want to delete this Enquiry?')) {   
                    return false;
                }
            })
        });
</script>
@include('admin.include.footer-bar')
@include('admin.include.footer')

@push('custom_script')

@endpush