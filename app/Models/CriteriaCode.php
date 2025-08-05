<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaCode extends Model
{
    use HasFactory;

    protected $fillable = ['criteria_code'];

    public function criterias()
    {
        return $this->hasMany(Criteria::class);
    }
}
