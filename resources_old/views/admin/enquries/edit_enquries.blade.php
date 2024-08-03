@include('admin.include.header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="container">
    <div class="card my-4">
        <div class="card-body">
            <div class="row p-3">
                <div class="col-6 mb-2 border-bottom">
                    <h6 class="mb-0"><b>Enquries Details</b></h6>
                </div>
                <div class="col-6 mb-2 text-end border-bottom">
                    <a href="{{route('enquries.index')}}" class="btn-link mb-0 text-primary">Back</a>
                </div>
                <div class="col-md-4">
                    <span class="form-label fw-bold">Name</span>
                    <p>{{$enquiry->fullName}}</p>
                </div>
                <div class="col-md-4">
                    <span class="form-label fw-bold">Email</span>
                    <p >{{$enquiry->email}}</p>
                </div>
                <div class="col-md-4">
                    <span class="form-label fw-bold">Phone</span>
                    <p >{{$enquiry->phoneNo}}</p>
                </div>
                @if ($enquiry->type_query)
                    <div class="col-md-4">
                        <span class="form-label fw-bold">Type of query</span>
                        <p >{{$enquiry->type_query}}</p>
                    </div>
                @endif
                <div class="col-md-4">
                    <span class="form-label fw-bold">status (
                            @if ($enquiry->status == 0)
                                <span class="text-info">Panding...</span>
                            @elseif($enquiry->status == 1)
                                <span class="text-success">Done</span>
                            @elseif($enquiry->status == 2)
                                <span class="text-danger">Rejected</span>
                            @endif
                    )
                    </span>
                    <select name="status" class="form-select form-select-sm" style="width:150px" onchange="ChangeEStatus({{$enquiry->id}}, value)">
                        <option value="0" {{$enquiry->status == 0 ? 'selected':''}}>Panding...</option>
                        <option value="1" {{$enquiry->status == 1 ? 'selected':''}}>Done</option>
                        <option value="2" {{$enquiry->status == 2 ? 'selected':''}}>Rejected</option>
                    </select>
                    <div id="bindstatus">
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="form-label fw-bold">Ip</span>
                    <p >{{$enquiry->ip}}</p>
                </div>
                {{-- <div class="col-md-4">
                    <span class="form-label fw-bold">State</span>
                    <p >{{$enquiry->state}}</p>
                </div>
                <div class="col-md-4">
                    <span class="form-label fw-bold">City</span>
                    <p >{{$enquiry->city}}</p>
                </div>
                <div class="col-md-4">
                    <span class="form-label fw-bold">Latitude</span>
                    <p >{{$enquiry->latitude}}</p>
                </div>
                <div class="col-md-4">
                    <span class="form-label fw-bold">Longitude</span>
                    <p >{{$enquiry->longitude}}</p>
                </div> --}}
                <div class="col-md-12">
                    @if ($enquiry->type_query)
                    <span class="form-label fw-bold">Message</span>
                    @else
                    <span class="form-label fw-bold">Address</span>
                    @endif
                    <p >{{$enquiry->address}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ChangeEStatus(id, val){
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/admin/enquries-status/"+id,
            data : {'status' : val},
            type : 'GET',
            dataType : 'json',
            success : function(result){
                console.log(result);
                if(result=='success'){
                    $('#bindstatus').html('<span class="text-success">Status change successfully!!</span>')
                }else{
                    $('#bindstatus').html('<span class="text-danger">Something went wrong</span>')
                }
            }
        });
        }
</script>
@include('admin.include.footer-bar')
@include('admin.include.footer')

@push('custom_script')

@endpush