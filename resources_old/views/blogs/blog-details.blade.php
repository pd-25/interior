@include('include.header')
<!-- inner banner sec -->
<section class="inner_banner inner_bannerblog">
</section>
<!-- inner banner sec end -->
<!-- services section -->
<section class="section-my">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2>{{ $blogs->title }}</h2>
                </div>
            </div>
            <div class="col-12">
                {!! $blogs->description !!}
            </div>
        </div>
    </div>
</section>
{{-- <div class="text-center">
        <img src="{{ asset('storage/'.$blogs->image) }}" class="img_fluid" style="object-fit: cover; height: 500px" alt="" />
     </div> --}}
<!-- services section end -->

@include('include.footer')
