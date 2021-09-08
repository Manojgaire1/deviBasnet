<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    /**
     * add new model in the storage
     * @param $data
     * @return obj($new_model)
     *
     */
    public function addCategory($data){
    	$new_category                  = new static();
		$new_category->title           = $data['name'] ?? null;
		$new_category->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : null;
		$new_category->content         = $data['description'] ?? null;
		$new_category->status          = $data['status'] ?? '1';
		$new_category->save();
		return $new_category;
    }

    /**
     * update model in the storage
     * @param $data, $id
     * @return obj($updated_model)
     *
     */
    public function updateCategory($data,$id){
    	$selected_category   				= $this::findOrFail($id);
		$selected_category->title         	= $data['name'] ?? $selected_category->name;
		$selected_category->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : $selected_category->slug;
		$selected_category->content         = $data['description'] ?? null;
		$selected_category->status          = $data['status'] ?? $selected_category->status;
		$selected_category->save();
		return $selected_category;

    }

    /**
     * a type has many activities
     */
    public function blogs(){
        return $this->hasMany('App\Models\Blog');
    }
}
