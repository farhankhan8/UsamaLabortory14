<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $table = 'patients';


    protected $fillable = [
        'Pname',
        'email',
        'phone',
        'start_time',
        'gend',
        'dob',
        'catagory',


      
    ];

    public function availableTest()
    {
        return $this->hasMany(AvailableTest::class);

    }
 public function testPerformed()
 {
     return $this->hasMany(TestPerformed::class);

 }

}
