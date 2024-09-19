<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tour extends Model
{
    use HasFactory;
    protected $guarded=[];
    function category(){
        return $this-> belongsTo(Category::class);
       
    }
    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($tour) {
            // Hapus relasi dengan fasilitas di tabel pivot
            $tour->facilities()->detach();
            
            // Hapus semua galeri terkait
            $tour->gallery()->delete();
        });
    }
}
