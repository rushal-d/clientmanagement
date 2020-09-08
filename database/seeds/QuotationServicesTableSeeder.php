<?php

use Illuminate\Database\Seeder;

class QuotationServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quotation__services')->delete();
        
        \DB::table('quotation__services')->insert(array (
            0 => 
            array (
                'id' => 43,
                'client_id' => 19,
                'date' => '2019-08-20',
                'servicetype_id' => 5,
                'recurring_stat' => 'No',
                'recurring_type' => NULL,
                'amount' => 60000.0,
                'taxable_stat' => 'Yes',
                'notes' => 'ayayayaya',
                'expiry_date' => NULL,
                'status' => 0,
                'created_at' => '2019-08-27 09:11:12',
                'updated_at' => '2019-08-28 05:06:54',
                'quotation_id' => 1,
                'main_taxable' => 'Yes',
            ),
            1 => 
            array (
                'id' => 44,
                'client_id' => 19,
                'date' => '2019-08-22',
                'servicetype_id' => 6,
                'recurring_stat' => 'No',
                'recurring_type' => NULL,
                'amount' => 80000.0,
                'taxable_stat' => 'No',
                'notes' => 'owowowowowow',
                'expiry_date' => NULL,
                'status' => 0,
                'created_at' => '2019-08-27 09:11:12',
                'updated_at' => '2019-08-28 05:06:54',
                'quotation_id' => 1,
                'main_taxable' => 'Yes',
            ),
            2 => 
            array (
                'id' => 45,
                'client_id' => 21,
                'date' => '2019-08-14',
                'servicetype_id' => 4,
                'recurring_stat' => 'Yes',
                'recurring_type' => '2',
                'amount' => 60000.0,
                'taxable_stat' => 'No',
                'notes' => 'ayayayaya',
                'expiry_date' => NULL,
                'status' => 1,
                'created_at' => '2019-08-27 09:52:47',
                'updated_at' => '2019-08-28 05:01:03',
                'quotation_id' => 2,
                'main_taxable' => 'No',
            ),
            3 => 
            array (
                'id' => 46,
                'client_id' => 21,
                'date' => '2019-08-31',
                'servicetype_id' => 7,
                'recurring_stat' => 'No',
                'recurring_type' => NULL,
                'amount' => 70000.0,
                'taxable_stat' => 'Yes',
                'notes' => 'hehehehehehe',
                'expiry_date' => NULL,
                'status' => 1,
                'created_at' => '2019-08-27 09:52:47',
                'updated_at' => '2019-08-28 05:01:04',
                'quotation_id' => 2,
                'main_taxable' => 'No',
            ),
        ));
        
        
    }
}