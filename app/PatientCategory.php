<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientCategory extends Model
{
    public $table = 'patient_categories';

    protected $fillable = [
        'Pcategory',
        'discount',
     
    ];
    // public function catagory()
    // {
    //     return $this->belongsTo(Catagory::class);

    // }

    // public function testPerformed()
    // {
    //     return $this->hasMany(TestPerformed::class);

    // }

    
}
