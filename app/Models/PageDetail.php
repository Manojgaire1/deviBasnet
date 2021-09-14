<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDetail extends Model
{
    use HasFactory;
    public function addPageDetail($data)
    {
        $new_page = new static();
        $new_page->meta_key = $data['meta_key'] ?? null;
        $new_page->meta_value = $data['meta_value'] ?? null;
        $new_page->page_id = $data['page'] ?? null;
        $new_page->save();
        return $new_page;
    }
    public function updatePageDetail($data, $id)
    {
        $selected_page = $this::findOrFail($id);
        $selected_page->meta_key = $data['meta_key'] ?? $selected_page->meta_key;
        $selected_page->meta_value = $data['meta_value'] ?? $selected_page->meta_value;
        $selected_page->page_id = $data['page'] ?? $selected_page->page_id;
        $selected_page->save();
        return $selected_page;
    }
    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }
}
