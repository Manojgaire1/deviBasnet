<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Banner extends Model
{
    use HasFactory;
    public function addBanner($data)
    {
        $banner = new static();
        $banner->title = $data['title'] ?? null;
        $banner->slug = isset($data['title']) ? Str::slug($data['title'], '-') : null;
        $banner->featured_image = $data['image_path'] ?? null;
        $banner->save();
        return $banner;
    }
    public function updateBanner($data, $id)
    {
        $selected = $this::findOrFail($id);
        $selected->title = $data['title'] ?? $selected->title;
        $selected->slug = isset($data['title']) ? Str::slug($data['title'], '-') : $selected->slug;
        $selected->featured_image = $data['image_path'] ?? $selected->featured_image;
        $selected->save();
        return $selected;
    }

}
