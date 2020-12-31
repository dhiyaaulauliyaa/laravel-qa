<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title, '-');
    }
}
