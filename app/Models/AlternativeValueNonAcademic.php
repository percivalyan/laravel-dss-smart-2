<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeValueNonAcademic extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_non_academic_id', 'criteria_non_academic_id', 'sub_criteria_non_academic_id'];

    public function alternative()
    {
        return $this->belongsTo(AlternativeNonAcademic::class);
    }

    public function criteria()
    {
        return $this->belongsTo(CriteriaNonAcademic::class);
    }

    public function subCriteria()
    {
        return $this->belongsTo(SubCriteriaNonAcademic::class);
    }
}
