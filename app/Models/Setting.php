<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public $timestamps =false;

    public function updateSetting($data,$key,$value){
        $this->where('meta_key',$key)->update($data);
    }
}
