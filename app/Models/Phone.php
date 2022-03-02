<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image_name',
        'description',
        'colors',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
