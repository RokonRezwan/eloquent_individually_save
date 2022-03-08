<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'is_active',
    ];

    protected $guarded = [
        'name',
        'category_id',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
