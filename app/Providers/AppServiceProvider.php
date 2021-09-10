<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*', function ($view) {
            $settings = Setting::whereIn('meta_key',['social_facebook_link','social_twitter_link','social_gate_link','social_instagram_link','social_linkedin_link'])->select('meta_value','meta_key')->get()->toArray();
            if($settings):
                foreach($settings as $setting):
                    if(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_facebook_link"):
                            $facebook_link = $setting['meta_value'];
                    elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_linkedin_link"):
                            $linkedin_link = $setting['meta_value'];
                    elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_instagram_link"):
                            $insta_link = $setting['meta_value'];
                    elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_gate_link"):
                            $gate_link = $setting['meta_value'];
                    elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_twitter_link"):
                            $twitter_link = $setting['meta_value']; 
                    endif;
                endforeach;
            endif;
            return $view->with([
                'social_facebook_link'    => $facebook_link,
                'social_linkedin_link'    => $linkedin_link,
                'social_instagram_link'   => $insta_link,
                'social_gate_link'        => $gate_link,
                'social_twitter_link'     => $twitter_link
            ]);
        });
    }
}
