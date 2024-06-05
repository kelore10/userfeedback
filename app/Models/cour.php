<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cour extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_cours',
        'date_heure',
        'user_id'
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
