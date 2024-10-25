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
                    <h5 class="m-0">Enquries List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="table-info">
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact Details</th>
                                    <th scope="col">Message/Address</th>
                                    <th scope="col">Page Reference</th>
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
                                    <td scope="row">{{@$item->address}}</td>
                                    <td scope="row">{{@$item->page_ref}}</td>
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