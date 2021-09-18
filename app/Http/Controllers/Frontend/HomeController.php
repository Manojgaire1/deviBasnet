<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Interest;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Timeline;
use App\Models\Type;
use Session;

class HomeController extends Controller
{
    protected $facebook_link,
    $insta_link,
    $linkedin_link,
    $twitter_link,
    $gate_link,
    $seo_keyword,
    $seo_description,
    $admin_contact_phone,
    $admin_contact_email,
    $admin_address,
        $tags;
    //
    public function index()
    {
        //get the active types
        $types = Type::where('status', '1')->select('id', 'title', 'slug')->get();
        //get timelines
        $timelines = Timeline::where('status', '1')->orderBy('sort_order', 'asc')->get();
        //get the active activities
        $activities = Activity::join('types', 'types.id', 'activities.type_id')
            ->select('activities.id', 'activities.title as activity_title', 'activities.description', 'activities.featured_image', 'activities.documents_path', 'types.title', 'types.slug')
            ->where('activities.status', '1')
            ->get();
        $this->renderSettingData();
        //get the active testimonials
        $testimonials = Testimonial::where('status', '1')->select('client_name', 'company_name', 'position', 'featured_image', 'description')->get();

        //get the active blogs
        $blogs = Blog::where('status', '1')->select('id', 'slug', 'title', 'featured_image', 'content', 'external_link')->get();

        // get the banner
        $banner = Banner::first();
        $about = Page::where('slug', 'about-me')->first();
        $hireme = Page::where('slug', 'nrna-election-2021')->first();
        // dd($hireme->pageDetails);
        $hiremeButtonLink = '';
        if (isset($hireme->pageDetails)) {
            $link = $hireme->pageDetails->where('meta_key', 'Link')->first();
            if ($link) {
                $hiremeButtonLink = $link->meta_value;
            }

        }

        //get the interest
        $interests = Interest::where('status', '1')->take(4)->get();
        return view('frontend.index')->with([
            'types' => $types,
            'activities' => $activities,
            'timelines' => $timelines,
            'blogs' => $blogs,
            'testimonials' => $testimonials,
            'interests' => $interests,
            'social_facebook_link' => $this->facebook_link,
            'social_instagram_link' => $this->insta_link,
            'social_linkedin_link' => $this->linkedin_link,
            'social_gate_link' => $this->gate_link,
            'social_twitter_link' => $this->twitter_link,
            'admin_contact_email' => $this->admin_contact_email,
            'admin_contact_phone' => $this->admin_contact_phone,
            'seo_keywords' => $this->seo_keyword,
            'seo_description' => $this->seo_description,
            'admin_address' => $this->admin_address,
            'tags' => $this->tags,
            'banner' => $banner,
            'about' => $about,
            'hireme' => $hireme,
            'hiremeButtonLink' => $hiremeButtonLink,
        ]);
    }

    protected function renderSettingData()
    {
        $site_settings = Setting::select('meta_key', 'meta_value')->get()->toArray();
        foreach ($site_settings as $index => $setting) {
            if (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "social_facebook_link"):
                $this->facebook_link = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "social_linkedin_link"):
                $this->linkedin_link = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "social_instagram_link"):
                $this->insta_link = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "social_gate_link"):
                $this->gate_link = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "social_twitter_link"):
                $this->twitter_link = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "seo_keywords"):
                $this->seo_keyword = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "seo_description"):
                $this->seo_description = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "admin_contact_email"):
                $this->admin_contact_email = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "admin_contact_phone"):
                $this->admin_contact_phone = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "admin_address"):
                $this->admin_address = $setting['meta_value'];
            elseif (array_key_exists('meta_key', $setting) && $setting['meta_key'] == "tags"):
                $this->tags = $setting['meta_value'];
            endif;
        }
    }
}
