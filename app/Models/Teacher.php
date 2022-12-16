<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $fillable = ['email', 'password', 'name', 'specialization_id', 'gender_id', 'joining_date', 'address'];
    public $translatable = ['name'];

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    public function specialization()
    {
        return $this->hasOne(Specialization::class, 'id', 'specialization_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_teacher');
    }

}
