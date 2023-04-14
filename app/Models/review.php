<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class review extends Model
{
    use HasFactory;

    protected $fillable = ['rating','path_id'];

    public function path(){
        return $this->belongsTo(Path::class);
    }




}
