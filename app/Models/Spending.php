<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;

    protected $fillable = ['amount' , 'date' , 'type_id', 'comment'];
    public function type(){
        return $this->belongsTo('App\Models\Type','type_id','id');
    }
}
