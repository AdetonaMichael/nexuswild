<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id'
    ];

    /**
     * Delete Post image from storage
     * @return void
     */

    public function deleteImage(){
        Storage::delete($this->image);
    }

    public function category(){
           return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    /**
     * 
     * Check if a Post has tag
     * @return bool
     */
    public function hasTag($tadid){
        return in_array($tadid, $this->tags->pluck('id')->toArray());
    }
}
