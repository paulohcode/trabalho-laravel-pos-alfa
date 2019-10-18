<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'image',
        'featured',
        'status',
        'date',
        'hour',
        'user_id',
        'category_id',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    /** REGRAS DE VÁLIDAÇÃO */
    public function rules($id = '')
    {
        return [
            'title'          => 'required|min:3|max:100',
            'image'         => 'image|max:2048',
            'description'   => 'required|min:3|max:1000',
            'category_id' => 'required'
        ];
    }
}
