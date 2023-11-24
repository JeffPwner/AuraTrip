<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    protected $table =  'places';

    public function travels(){
        return $this->hasMany('App\Models\Travel');
    }

    protected $guarded = [];
    
    protected $casts = [
        'places' => 'array'
    ];

}
