<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeNonAcademic extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_code', 'alternative_name'];

    public function alternativeValues()
    {
        return $this->hasMany(AlternativeValueNonAcademic::class);
    }
}
