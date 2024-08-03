@include('admin.include.header')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Edit About us</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{ route('contactus') }}">Contactus List</a></li> --}}
                    <li class="breadcrumb-item active">Edit Aboutus</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->




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

                <form action="{{ route('aboutuseditpost',$aboutus->id) }}" method="post"  name="aboutuseditpost" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row mb-3">
                        <label for="description" class="col-3 col-form-label">Description *</label>
                        <div class="col-6">
                            <textarea name="description" id="editor1" required>{!! $aboutus->description !!}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="aboutusimage" class="col-3 col-form-label">Image</label>
                        <div class="col-6">
                           <input type="file" name="aboutusimage" >
                           <img src="{{ asset('storage/'.$aboutus->image) }}" width="100" height="auto">
                           <input type="hidden" name="old_image_path" value="{{ $aboutus->image }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title_one" class="col-3 col-form-label">Title One</label>
                        <div class="col-6">
                            <input type="text" name="title_one" class="form-control" id="title_one" placeholder="Title One" value="{{ $aboutus->title_one }}" />
                            @error('title_one')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title_one_description" class="col-3 col-form-label">Title One Description *</label>
                        <div class="col-6">
                            <textarea name="title_one_description" id="editor2">{!! $aboutus->title_one_description !!}</textarea>
                            @error('title_one_description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title_two" class="col-3 col-form-label">Title Two</label>
                        <div class="col-6">
                            <input type="text" name="title_two" class="form-control" id="title_two" placeholder="Title Two" value="{{ $aboutus->title_two }}" />
                            @error('title_two')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title_two_description" class="col-3 col-form-label">Title Two Description *</label>
                        <div class="col-6">
                            <textarea name="title_two_description" id="editor3">{!! $aboutus->title_two_description !!}</textarea>
                            @error('title_two_description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title_three" class="col-3 col-form-label">Title Three</label>
                        <div class="col-6">
                            <input type="text" name="title_three" class="form-control" id="title_three" placeholder="Title Three" value="{{ $aboutus->title_three }}" />
                            @error('title_three')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="title_three_description" class="col-3 col-form-label">Title Three Description *</label>
                        <div class="col-6">
                            <textarea name="title_three_description" id="editor4" >{!! $aboutus->title_three_description !!}</textarea>
                            @error('title_three_description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="title_one_faq" class="col-3 col-form-label">Faq Title One</label>
                        <div class="col-6">
                            <input type="text" name="title_one_faq" class="form-control" id="title_one_faq" placeholder="Faq Title" value="{{ $aboutus->title_one_faq }}" />
                            @error('title_one_faq')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="faq_item_one_description" class="col-3 col-form-label">Faq Description One </label>
                        <div class="col-6">
                            <textarea name="faq_item_one_description" cols="80" rows="10">{!! $aboutus->faq_item_one_description !!}</textarea>
                            @error('faq_item_one_description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="title_two_faq" class="col-3 col-form-label">Faq Title Two</label>
                        <div class="col-6">
                            <input type="text" name="title_two_faq" class="form-control" id="title_two_faq" placeholder="Faq Title Two" value="{{ $aboutus->title_two_faq }}" />
                            @error('title_two_faq')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="faq_item_two_description" class="col-3 col-form-label">Faq Description Two </label>
                        <div class="col-6">
                            <textarea name="faq_item_two_description" cols="80" rows="10">{!! $aboutus->faq_item_two_description !!}</textarea>
                            @error('faq_item_two_description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="title_three_faq" class="col-3 col-form-label">Faq Title Three</label>
                        <div class="col-6">
                            <input type="text" name="title_three_faq" class="form-control" id="title_three_faq" placeholder="Faq Title Three" value="{{ $aboutus->title_three_faq }}" />
                            @error('title_three_faq')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="faq_item_three_description" class="col-3 col-form-label">Faq Description Three </label>
                        <div class="col-6">
                            <textarea name="faq_item_three_description" cols="80" rows="10">{!! $aboutus->faq_item_three_description !!}</textarea>
                            @error('faq_item_three_description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="row mt-3 justify-content-end">
                        <div class="col-9">
                            <input type="submit" class="col-md-2 btn btn-danger" name="Submit" />
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->
</div>




@include('admin.include.footer-bar')

@include('admin.include.footer')
