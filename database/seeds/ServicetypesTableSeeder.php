<?php

use Illuminate\Database\Seeder;

class ServicetypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('servicetypes')->delete();
        
        \DB::table('servicetypes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Web Hosting',
                'description' => 'This section is for web hosting.',
                'created_at' => '2019-07-17 05:37:46',
                'updated_at' => '2019-07-17 05:37:46',
                'VAT' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Web Designing',
                'description' => 'Thisssssssssssssssssssssssssssss',
                'created_at' => '2019-07-18 06:02:30',
                'updated_at' => '2019-07-18 06:02:30',
                'VAT' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'Mobile App Developement',
                'description' => 'Mobile',
                'created_at' => '2019-07-18 06:02:55',
                'updated_at' => '2019-07-18 06:02:55',
                'VAT' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'title' => 'IOS Application',
                'description' => NULL,
                'created_at' => '2019-07-22 09:07:27',
                'updated_at' => '2019-07-22 09:07:27',
                'VAT' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'title' => 'CRM',
                'description' => 'Create a CRM for a company',
                'created_at' => '2019-08-20 04:36:25',
                'updated_at' => '2019-08-20 04:36:25',
                'VAT' => 13,
            ),
            5 => 
            array (
                'id' => 7,
                'title' => 'MIS',
                'description' => 'Create a MIS',
                'created_at' => '2019-08-20 04:53:50',
                'updated_at' => '2019-08-20 04:53:50',
                'VAT' => 13,
            ),
            6 => 
            array (
                'id' => 8,
                'title' => 'asd',
                'description' => 'asdasdsad',
                'created_at' => '2019-08-22 10:08:16',
                'updated_at' => '2019-08-22 10:08:16',
                'VAT' => 13,
            ),
        ));
        
        
    }
}