<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'img_url',
        'price',
        'is_instock'
    ];

    protected $casts = [
        'is_instock' => 'boolean',
        'created_at' => 'datetime:d, l F Y H:i:s A'
    ];

    protected $hidden = [
        'updated_at'
    ];

}
