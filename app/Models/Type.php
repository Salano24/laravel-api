<?php

namespace App\Models;
use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable =['name', 'slug'];

    public static function createSlug($input)
    {
        return Str::slug($input);
    }

    
public function projects()
    {
        return $this->hasMany(Project::class);
    }
}