<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingatlanok extends Model
{
    use HasFactory;
    public function kategoria(){
        return $this->hasOne(kategoriak::class, 'id', 'kategoria');
    }
}
