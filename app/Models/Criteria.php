<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = ['criteria_code_id', 'criteria_name', 'weight'];

    public function criteriaCode()
    {
        return $this->belongsTo(CriteriaCode::class);
    }

    public function subCriterias()
    {
        return $this->hasMany(SubCriteria::class);
    }

    public function alternativeValues()
    {
        return $this->hasMany(AlternativeValue::class);
    }
}
