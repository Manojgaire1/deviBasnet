<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Timeline extends Model
{
    use HasFactory;
    
    /**
     * add new model in the storage
     * @param $data
     * @return obj($new_model)
     *
     */
    public function addTimeline($data){
    	$new_timeline                  = new static();
		$new_timeline->title           = $data['name'] ?? null;
		$new_timeline->slug            = isset($data['name']) ? Str::slug($data['name'],'-') : null;
		$new_timeline->description     = $data['description'] ?? null;
		$new_timeline->excerpt         = $data['excerpt'] ?? null;
		$new_timeline->start_date      = isset($data['from_date']) ? date('Y-m-d',strtotime($this->convertStringToDate($data['from_date']))) : null;
		$new_timeline->end_date        = isset($data['to_date']) ? date('Y-m-d',strtotime($this->convertStringToDate($data['to_date']))) : null;
		$new_timeline->position        = $data['position'] ?? 'left';
		$new_timeline->status          = $data['status'] ?? '1';
		$new_timeline->save();
		return $new_timeline;
    }

    /**
     * update model in the storage
     * @param $data, $id
     * @return obj($updated_model)
     *
     */
    public function updateTimeline($data,$id){
    	$selected_timeline   			   = $this::findOrFail($id);
		$selected_timeline->title          = $data['name'] ?? $selected_timeline->title;
		$selected_timeline->slug           = isset($data['name']) ? Str::slug($data['name'],'-') : $selected_timeline->slug;
		$selected_timeline->description    = $data['description'] ?? null;
        $selected_timeline->excerpt        = $data['excerpt'] ?? null;
		$selected_timeline->start_date     = isset($data['from_date']) ? date('Y-m-d',strtotime($this->convertStringToDate($data['from_date']))) : null;
		$selected_timeline->end_date       = isset($data['to_date']) ? date('Y-m-d',strtotime($this->convertStringToDate($data['to_date']))) : null;
		$selected_timeline->position       = $data['position'] ?? 'left';
		$selected_timeline->status         = $data['status'] ?? $selected_timeline->status;
		$selected_timeline->save();
		return $selected_timeline;

    }

	protected function convertStringToDate($year){
        if(isset($year) && $year != ""):
            //check for the month
            return $year.'-01-01';
        endif;
    }
}
