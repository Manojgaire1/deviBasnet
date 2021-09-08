<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    public function addBlog($data){
		$new_blog                  = new static();
        $new_blog->category_id     = $data['category'] ?? null;
		$new_blog->title           = $data['name'] ?? null;
		$new_blog->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : null;
		$new_blog->content         = $data['description'] ?? null;
		$new_blog->sort_order      = $this->calculateSortOrder();
		$new_blog->status          = $data['status'] ?? '1';
		$new_blog->featured_image  = $data['image_path'] ?? null;
		$new_blog->external_link   = $data['external_link'] ?? null;
		$new_blog->save();
		return $new_blog;
	}

	public function updateBlog($data,$id){
		$selected_blog   				= $this::findOrFail($id);
        $selected_blog->category_id     = $data['category'] ?? $selected_blog->category_id;
  		$selected_blog->title         	= $data['name'] ?? $selected_blog->name;
		$selected_blog->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : $selected_blog->slug;
		$selected_blog->content         = $data['description'] ?? null;
		$selected_blog->status          = $data['status'] ?? $selected_blog->status;
		$selected_blog->featured_image  = $data['image_path'] ?? $selected_blog->featured_image;
		$selected_blog->external_link   = $data['external_link'] ?? null;
		$selected_blog->save();
		return $selected_blog;
	}

    /**
    * A blog belongs to the blog category
    * @param void
    * @return void
    */
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }


	protected function calculateSortOrder(){
		$last_sort_order = $this::where('id','desc')->select('sort_order')->first();
		if($last_sort_order){
			return ($last_sort_order->sort_order + 1);
		}else{
			return 1;
		}
	}

}
