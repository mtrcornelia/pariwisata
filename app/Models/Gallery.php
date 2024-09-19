<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['tour_id', 'image_path'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
