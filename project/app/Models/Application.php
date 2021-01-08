<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'title', 'status', 'motivation'
    ];
    use HasFactory;
    public function applications()
    {
        return $this->hasMany('\App\Models\Application');
    }

    public function internship(){
        return $this->belongsTo('\App\Models\Internship');
    }

    public function user(){
        return $this->belongsTo('\App\Models\user');
    }
}
