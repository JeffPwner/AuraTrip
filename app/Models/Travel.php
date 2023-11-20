<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travels';
    use HasFactory;

    protected $startDate = ['startDate'];
    protected $endDate = ['endDate'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    protected $guarded = [];

    protected $casts = [
        'places' => 'array'
    ];
}
