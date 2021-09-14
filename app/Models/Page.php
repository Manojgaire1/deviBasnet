<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    public function addPage($data)
    {
        $new_page = new static();
        $new_page->title = $data['title'] ?? null;
        $new_page->slug = isset($data['title']) ? Str::slug($data['title'], '-') : null;
        $new_page->excerpt = $data['excerpt'] ?? null;
        $new_page->content = $data['content'] ?? null;
        $new_page->sort_order = $data['sort_order'] ?? rand(0, 15);
        $new_page->status = $data['status'] ?? '1';
        $new_page->featured_image = $data['image_path'] ?? null;
        $new_page->save();
        return $new_page;
    }
    public function updatePage($data, $id)
    {
        $selected_page = $this::findOrFail($id);
        $selected_page->title = $data['title'] ?? $selected_page->title;
        $selected_page->slug = isset($data['title']) ? Str::slug($data['title'], '-') : $selected_page->slug;
        $selected_page->excerpt = $data['excerpt'] ?? $selected_page->excerpt;
        $selected_page->content = $data['content'] ?? $selected_page->content;
        $selected_page->status = $data['status'] ?? $selected_page->status;
        $selected_page->sort_order = $data['sort_order'] ?? $selected_page->sort_order;
        $selected_page->featured_image = $data['image_path'] ?? $selected_page->featured_image;
        $selected_page->save();
        return $selected_page;
    }
    public function pageDetail()
    {
        return $this->hasMany('App\Models\PageDetail');
    }
}
