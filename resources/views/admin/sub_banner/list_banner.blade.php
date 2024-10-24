@include('admin.include.header')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Sub Banner Manager</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#" style="color: #6600ff;">Sub Banner</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <a href="{{route('subbanner.create')}}"  class="btn btn-warning">Add Sub Banner</a>
    </div>
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
                            <th>SL No</th>
                            <th>Media</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!@empty($SubBanner))
                            @foreach ($SubBanner as $index=>$item)
                                <tr>
                                    <td>{{@$index+1}}</td>
                                    <td>
                                        <img src="/storage/{{@$item->media}}" alt="No images" class="img_fluid" style="height: 100px">
                                    </td>
                                    <td>{{@$item->short_description}}</td>
                                    <td>
                                        @if (@$item->status == 0)
                                            <span class="text-primary"> <i data-feather="alert-triangle"></i> </span>
                                            @elseif(@$item->status == 1)
                                            <span class="text-success"> <i data-feather="check"></i> </span>
                                            @elseif(@$item->status == 2)
                                            <span class="text-danger"> <i data-feather="x"></i> </span>
                                        @endif
                                    </td>
                                    <td> {{ date('d-m-Y', strtotime(@$item->created_at)) }}</td>
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
                                                <a class="dropdown-item" href="{{ route('subbanner.destroy',$item->id) }}" onclick="return confirm('Are you sure want to delete this record?')"><i class="uil uil-trash-alt me-1"></i>Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.include.footer-bar')
@include('admin.include.footer')

@push('scripts')
<script>
</script>
@endpush