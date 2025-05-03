@include('admin.include.header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('error'))
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
        <div class="col-12 mb-3">
            <a href="{{ route('service-cities.create') }}" class="btn btn-warning">Add City</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">City List</h5>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="table-info">
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Sub-areas</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cities as $city)
                                    <tr>
                                        <td scope="row">{{ @$city->city_name }}</td>
                                        <td scope="row">

                                            {{ $city->subCities->count() }}
                                        </td>
                                        <td>{{ date('d-m-Y h:i A', strtotime(@$city->created_at)) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div>
                                                    <a href="{{ route('service-cities.edit', @$city->id) }}"
                                                        class="btn btn-outline-primary btn-sm mx-2">Edit</a>
                                                </div>
                                                <form action="{{ route('service-cities.destroy', @$city->id) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-outline-danger DeleteEnquiry btn-sm"
                                                        type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No data found</td>
                                </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                        <div>
                            {{ @$cities->links() }}
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
