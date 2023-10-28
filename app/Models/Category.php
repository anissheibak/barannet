<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'slug', 'parent_id', 'status'];

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id')->with('parent');
    }
    public function children()
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }
}
