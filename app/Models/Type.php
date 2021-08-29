<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    
    /**
     * add new model in the storage
     * @param $data
     * @return obj($new_model)
     *
     */
    public function addType($data){
    	$new_type                  = new static();
		$new_type->title           = $data['name'] ?? null;
		$new_type->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : null;
		$new_type->description     = $data['description'] ?? null;
		$new_type->status          = $data['status'] ?? '1';
		$new_type->save();
		return $new_type;
    }

    /**
     * update model in the storage
     * @param $data, $id
     * @return obj($updated_model)
     *
     */
    public function updateType($data,$id){
    	$selected_model   				= $this::findOrFail($id);
		$selected_model->title         	= $data['name'] ?? $selected_model->name;
		$selected_model->slug           = isset($data['name']) ? Str::slug($data['name'],'-') : $selected_model->slug;
		$selected_model->description    = $data['description'] ?? null;
		$selected_model->status         = $data['status'] ?? $selected_model->status;
		$selected_model->save();
		return $selected_model;

    }

    /**
     * a type has many activities
     */
    public function activities(){
        return $this->hasMany('App\Models\Activity');
    }
}
