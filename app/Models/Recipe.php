<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
    protected $fillable = ['title', 'description', 'image', 'userid']; // Add 'titre' and other fields as needed

}
