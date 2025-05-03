@include('admin.include.header')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Edit City</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('service-cities.index') }}">City</a></li>
                    <li class="breadcrumb-item active"><a href="#" style="color: #6600ff;">Edit</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="col-12 my-1">
        @if (Session::has('success'))
            <div class="text-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="text-danger">
                {{ Session::get('error') }}
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('service-cities.update', $city->id) }}" class="padding_infor_info" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="name" class="form-label">City Name <span class="text-danger">*</span></label>
                            <input type="text" name="city_name" id="name" value="{{ old('city_name', $city->city_name) }}" class="form-control" placeholder="Enter City Name" required>
                            @error('city_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-2">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="city_status" class="form-control">
                                <option value="1" {{ $city->city_status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $city->city_status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('city_status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sub Areas Section -->
                        <div class="col-md-12 mb-3">
                            <label for="sub_areas" class="form-label">Sub Areas</label>
                            <div id="sub-areas-container">
                                @foreach ($city->subCities as $index => $subCity)
                                    <div class="row mb-2 sub-area-row">
                                        <div class="col-md-4">
                                            <input type="text" name="sub_areas[{{ $index }}][sub_city_name]" class="form-control" value="{{ old('sub_areas.' . $index . '.sub_city_name', $subCity->sub_city_name) }}" placeholder="Enter Sub Area" required>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="sub_areas[{{ $index }}][sub_city_status]" class="form-control">
                                                <option value="1" {{ $subCity->sub_city_status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $subCity->sub_city_status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-danger remove-sub-area" style="margin-top: 0;">-</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-primary" id="add-sub-area">Add Sub Area</button>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-end">
                                <button type="submit" class="btn btn-primary mx-2"> Save</button>
                                <a href="{{ route('service-cities.index') }}" type="button" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Add new sub-area row
    document.getElementById('add-sub-area').addEventListener('click', function() {
        var container = document.getElementById('sub-areas-container');
        var currentCount = container.querySelectorAll('.sub-area-row').length;
        
        var newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-2', 'sub-area-row');
        newRow.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="sub_areas[${currentCount}][sub_city_name]" class="form-control" placeholder="Enter Sub Area" required>
            </div>
            <div class="col-md-4">
                <select name="sub_areas[${currentCount}][sub_city_status]" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger remove-sub-area" style="margin-top: 0;">-</button>
            </div>
        `;
        container.appendChild(newRow);
    });

    // Remove sub-area row
    document.getElementById('sub-areas-container').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-sub-area')) {
            event.target.closest('.sub-area-row').remove();
        }
    });
</script>

@include('admin.include.footer-bar')
@include('admin.include.footer')
