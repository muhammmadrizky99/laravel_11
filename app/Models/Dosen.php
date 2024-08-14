<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function scopePencarian(Builder $query):void
    {

        if (request('search')) {
            $search = request('search');
    
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhereHas('prodi', function($q) use ($search) {
                      $q->where('nama', 'like', '%' . $search . '%'); 
                  });
            });
        }
        
    }
}
