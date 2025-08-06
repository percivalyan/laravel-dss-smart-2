<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriteriaNonAcademic extends Model
{
    use HasFactory;

    protected $fillable = ['criteria_code_id', 'sub_criteria_name', 'sub_criteria_value'];

    public function criteriaCode()
    {
        return $this->belongsTo(CriteriaCode::class);
    }

    public function alternativeValues()
    {
        return $this->hasMany(AlternativeValueNonAcademic::class);
    }
}
