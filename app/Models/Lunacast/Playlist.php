<?php

namespace App\Models\Lunacast;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable = ['thumbnail', 'name', 'slug', 'description', 'price'];
}