<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Support\Facades\Storage;
use App\Category;

class Post extends Model
{
    //

    

    use softDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'published_at',
        'category_id'

    ];

    public function deleteImage(){
        Storage::delete($this->image);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tags_id){
        return in_array($tags_id, $this->tag->pluck('id')->toArray());
    }
}
