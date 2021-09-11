<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Interest extends Model
{
    use HasFactory;
    public function addInterest($data){
		$new_interest                    = new static();
		$new_interest->title             = $data['name'] ?? null;
		$new_interest->slug              = isset($data['name']) ? Str::slug($data['name'],'-') : null;
		$new_interest->description       = $data['description'] ?? null;
		$new_interest->status            = $data['status'] ?? '1';
		$new_interest->icon_path         = $data['image_path'] ?? null;
		$new_interest->hover_icon_path   = $data['hover_image_path'] ?? null;
		$new_interest->save();
		return $new_interest;
	}

	public function updateInterest($data,$id){
		$selected_interest   				= $this::findOrFail($id);
  		$selected_interest->title         	= $data['name'] ?? $selected_interest->name;
		$selected_interest->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : $selected_interest->slug;
		$selected_interest->description     = $data['description'] ?? null;
		$selected_interest->status          = $data['status'] ?? $selected_interest->status;
		$selected_interest->icon_path       = $data['image_path'] ?? $selected_interest->icon_path;
		$selected_interest->hover_icon_path = $data['hover_image_path'] ?? $selected_interest->hover_icon_path;
		$selected_interest->save();
		return $selected_interest;
	}
}
