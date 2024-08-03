<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\HomeBanner;
use App\Models\SubBanner;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $testimonial = Testimonial::where('status', '1')->get();
        $blog = Blog::where('status', '1')->get();
        $homeBanner = HomeBanner::where('status', '1')->get();
        $subBanner = SubBanner::where('status', '1')->get();
        View::share(compact('testimonial', 'blog', 'homeBanner', 'subBanner'));
    }
}
