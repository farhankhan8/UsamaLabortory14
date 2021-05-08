<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    public function run()
    {
        $status = [
            [
                'id'             => 1,
                'Sname'           => 'Progressing',
              
            ],
            [
                'id'             => 2,
                'Sname'           => 'Verified',
            
            ],
            [
                'id'             => 3,
                'Sname'           => 'Not Received',
            
            ],
            [
                'id'             => 4,
                'Sname'           => 'Cancelled',
            
            ],
        ];

        Status::insert($status);

    }
}
