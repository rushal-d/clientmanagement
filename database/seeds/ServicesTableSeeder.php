<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 56,
                'client_id' => 19,
                'date' => '2019-08-21',
                'servicetype_id' => 1,
                'recurring_stat' => 'Yes',
                'recurring_type' => '2',
                'amount' => 80000.0,
                'notes' => 'uioiuouiouo',
                'expiry_date' => '2021-08-21',
                'created_at' => '2019-08-28 08:04:33',
                'updated_at' => '2019-08-28 08:04:33',
                'taxable_stat' => 'Yes',
                'main_taxable' => 'Yes',
                'service_id' => 1,
            ),
            1 => 
            array (
                'id' => 57,
                'client_id' => 20,
                'date' => '2019-08-27',
                'servicetype_id' => 6,
                'recurring_stat' => 'No',
                'recurring_type' => NULL,
                'amount' => 80000.0,
                'notes' => 'asdasdasdsadsadsad',
                'expiry_date' => NULL,
                'created_at' => '2019-08-28 08:05:38',
                'updated_at' => '2019-08-28 08:05:38',
                'taxable_stat' => 'Yes',
                'main_taxable' => 'No',
                'service_id' => 2,
            ),
            2 => 
            array (
                'id' => 58,
                'client_id' => 20,
                'date' => '2019-08-30',
                'servicetype_id' => 5,
                'recurring_stat' => 'Yes',
                'recurring_type' => '1',
                'amount' => 90000.0,
                'notes' => 'asdasd',
                'expiry_date' => '2020-08-30',
                'created_at' => '2019-08-28 08:05:38',
                'updated_at' => '2019-08-28 08:05:38',
                'taxable_stat' => 'No',
                'main_taxable' => 'No',
                'service_id' => 2,
            ),
        ));
        
        
    }
}