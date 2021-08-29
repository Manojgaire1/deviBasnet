<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Activity extends Model
{
    use HasFactory;
    public function addActivity($data){
		$new_activity                  = new static();
        $new_activity->type_id         = $data['type'] ?? null;
		$new_activity->title           = $data['name'] ?? null;
		$new_activity->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : null;
		$new_activity->description     = $data['description'] ?? null;
		$new_activity->status          = $data['status'] ?? '1';
		$new_activity->featured_image  = $data['image_path'] ?? null;
		$new_activity->documents_path   = $data['activitiy_doc'] ?? null;
		$new_activity->save();
		return $new_activity;
	}

	public function updateActivity($data,$id){
		$selected_activity   				= $this::findOrFail($id);
        $selected_activity->type_id         = $data['type'] ?? $selected_activity->type_id;
  		$selected_activity->title         	= $data['name'] ?? $selected_activity->name;
		$selected_activity->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : $selected_activity->slug;
		$selected_activity->description     = $data['description'] ?? null;
		$selected_activity->status          = $data['status'] ?? $selected_activity->status;
		$selected_activity->featured_image  = $data['image_path'] ?? $selected_activity->featured_image;
		$selected_activity->documents_path  = $data['activitiy_doc'] ?? $selected_activity->documents_path;
		$selected_activity->save();
		return $selected_activity;
	}

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }
}
