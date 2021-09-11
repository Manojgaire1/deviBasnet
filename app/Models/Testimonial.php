<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    /**
     * add new model in the storage
     * @param $data
     * @return obj($new_model)
     *
     */
    public function addTestimonial($data){
    	$new_testimonial                  = new static();
		$new_testimonial->client_name     = $data['name'] ?? null;
		$new_testimonial->description     = $data['description'] ?? null;
		$new_testimonial->company_name    = $data['company_name'] ?? null;
		$new_testimonial->status          = $data['status'] ?? '1';
		$new_testimonial->featured_image  = $data['image_path'] ?? null;
		$new_testimonial->position        = $data['position'] ?? '1';
		$new_testimonial->save();
		return $new_testimonial;
    }

    /**
     * update model in the storage
     * @param $data, $id
     * @return obj($updated_model)
     *
     */
    public function updateTestimonial($data,$id){
    	$selected_testimonial   				= $this::findOrFail($id);
		$selected_testimonial->client_name      = $data['name'] ?? $selected_testimonial->client_name;
		$selected_testimonial->description      = $data['description'] ?? null;
		$selected_testimonial->status           = $data['status'] ?? $selected_testimonial->status;
		$selected_testimonial->position         = $data['position'] ?? null;
		$selected_testimonial->featured_image   = $data['image_path'] ?? $selected_testimonial->featured_image;
		$selected_testimonial->save();
		return $selected_testimonial;

    }
}
