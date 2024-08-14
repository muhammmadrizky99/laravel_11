<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function scopePencarian(Builder $query): void
    {
        //$query->where('votes','>',100);

        if(request('search')){
            $query->Where('nama','like','%'.request('search') .'%');
        }
    }
}
