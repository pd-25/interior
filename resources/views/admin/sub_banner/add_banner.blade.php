@include('admin.include.header')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Create Home Banner</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('homebanner.index') }}">Sub Banner List</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#" style="color: #6600ff;">Sub Banner</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-12 my-1">
        @if(Session::has('success'))
            <div class="text-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="text-danger">
                {{ Session::get('error') }}
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col 12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('subbanner.store')}}" class="padding_infor_info" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-8 mb-2" id="media_input">
                            <label for="media" class="form-label">Select Image </label>
                            <input type="file" name="media" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"value="" class="form-control">
                        </div>
                        <div class="col-4 mb-2">
                            <img src="" id="blah" alt="No Images" class="img_fluid" style="height: 100px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea name="short_description" rows="5" id="article-ckeditor" class="form-control article-ckeditor" placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary mx-2"> Save</button>
                            <a href="{{route('homebanner.create')}}" type="button"  class="btn btn-secondary">
                                 Cancel
                            </a>
                        </div>
                    </div>
                </form>
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