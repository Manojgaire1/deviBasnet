<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    protected $setting;
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
    public function __construct(Setting $setting){
        $this->setting = $setting;
    }
    /**
     * function to show the edit form
     */
    public function edit(){
        $this->setting = Setting::select('meta_key','meta_value')->get()->toArray();
        foreach($this->setting as $index=>$setting){
            if(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_facebook_link"):
                 $this->facebook_link = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_linkedin_link"):
                 $this->linkedin_link = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_instagram_link"):
                 $this->insta_link = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_gate_link"):
                 $this->gate_link = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "social_twitter_link"):
                 $this->twitter_link = $setting['meta_value']; 
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "seo_keywords"):
                 $this->seo_keyword = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "seo_description"):
                 $this->seo_description = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "admin_contact_email"):
                $this->admin_contact_email = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "admin_contact_phone"):
                $this->admin_contact_phone = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "admin_address"):
                $this->admin_address = $setting['meta_value'];
            elseif(array_key_exists('meta_key',$setting) && $setting['meta_key'] == "tags"):
                $this->tags = $setting['meta_value'];
            endif;
        }
        return view('admin.setting.edit')->with([
           'social_facebook_link'     =>$this->facebook_link,
           'social_instagram_link'    =>$this->insta_link,
           'social_linkedin_link'     =>$this->linkedin_link,
           'social_gate_link'         =>$this->gate_link,
           'social_twitter_link'      =>$this->twitter_link,
           'admin_contact_email'      => $this->admin_contact_email,
           'admin_contact_phone'      => $this->admin_contact_phone,
           'seo_keywords'             => $this->seo_keyword,
           'seo_description'          => $this->seo_description,
           'admin_address'            => $this->admin_address,
           'tags'                     => $this->tags
        ]);
    }

    public function update(Request $request){
        $this->setting = Setting::select('meta_key','meta_value')->get()->toArray();
        $setting_udpated_datas = $request->except('_token');
        //loop through each of the data 
        foreach($setting_udpated_datas as $key=>$value):
            $this->updateSetting($request,$key,$value);
        endforeach;
        //response the response back to the client
        $request->session()->flash('zen_setting_msg','Admin settings has been updated successfully!');
        return redirect()->route('admin.settings.edit');
    }


    /**
     * function to update the setting
     * @param Illuminate\Http\Request
     * @param $key
     * @param $value
     * @return void
     */

    protected function updateSetting($request,$key,$value){
        if($request->has($key) && $request->get($key) != null):
            //upate setting
            //check the setting or not if not insert it
            $open_time_exists = Setting::where('meta_key',$key)->first();
            if($open_time_exists):
                $open_time_exists->meta_value = $request->input($key);
                $open_time_exists->save();  
            else:
                //if not exist then insert new one
                $setting              = new Setting();
                $setting->meta_key    = $key;
                $setting->meta_value  = $request->input($key);
                $setting->save();
            endif;
        endif;
    }
}
