<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'title', 'summary', 'content', 'imagePath'];
    
    public function getImagePath($imagePath)
    {
      return str_replace('public', 'storage', asset($imagePath));
    }
    public function getCreatedAtAttribute($date)
    {
      return date('d/m/Y H:i:s', strtotime($date));
    }
}
