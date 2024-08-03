@include('include.header')

<!-- Office Interior Banner -->
<section class="inner_banner inner_bannerblog">
</section>
<!-- blog section starts -->
<section class="section-my">
    <div class="container">
        <div class="row">
            @if (!@empty($blog))
                @foreach ($blog as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="holiday_pack_slide blog">
                            <a href="{{ route('blog-details', encrypt($item->id)) }}">
                                <div class="holiday_pack_area">
                                    <div class="pack_image">
                                        <img class="img-fluid" src="{{ asset('storage/' . $item->image) }}"
                                            style="object-fit: cover; height: -webkit-fill-available;" alt="No Images">
                                    </div>
                                    <div class="blog_content">
                                        <h3> {!! Str::words(@$item->title, 8, ' ...') !!}</h3>
                                        <p> {!! Str::words($item->description, 20, ' ...') !!}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

{{-- <p>{!! @$item->description !!}</p> --}}
<!-- /blog section ends -->

@include('include.footer')
