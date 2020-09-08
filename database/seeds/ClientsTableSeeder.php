<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

//        \DB::statement('set FOREIGN_KEY_CHECKS = 0');
        \DB::table('clients')->delete();

        \DB::table('clients')->insert(array (
            0 =>
            array (
                'id' => 16,
                'org_name' => 'Nine Nine',
                'address' => 'New York',
                'phone' => '464646464',
                'website' => 'www.xyz.com',
                'contact_person_name' => 'rushal',
                'email' => 'xzc@gmail.com',
                'notes' => NULL,
                'created_at' => '2019-07-23 05:46:58',
                'updated_at' => '2019-07-24 05:50:44',
            ),
            1 =>
            array (
                'id' => 17,
                'org_name' => 'Money Heist',
                'address' => '796 Silver Harbour, TX 79273, US',
                'phone' => NULL,
                'website' => NULL,
                'contact_person_name' => '',
                'email' => 'dangolrushal@gmail.com',
                'notes' => NULL,
                'created_at' => '2019-07-24 05:53:20',
                'updated_at' => '2019-07-24 11:10:49',
            ),
            2 =>
            array (
                'id' => 18,
                'org_name' => 'asdasd',
                'address' => NULL,
                'phone' => NULL,
                'website' => NULL,
                'contact_person_name' => 'zxc',
                'email' => NULL,
                'notes' => NULL,
                'created_at' => '2019-07-31 04:55:40',
                'updated_at' => '2019-07-31 04:56:59',
            ),
            3 =>
            array (
                'id' => 19,
                'org_name' => 'test',
                'address' => NULL,
                'phone' => NULL,
                'website' => NULL,
                'contact_person_name' => '',
                'email' => NULL,
                'notes' => NULL,
                'created_at' => '2019-08-20 08:36:17',
                'updated_at' => '2019-08-20 08:36:17',
            ),
            4 =>
            array (
                'id' => 20,
                'org_name' => 'test2',
                'address' => NULL,
                'phone' => NULL,
                'website' => NULL,
                'contact_person_name' => '',
                'email' => NULL,
                'notes' => NULL,
                'created_at' => '2019-08-20 09:06:59',
                'updated_at' => '2019-08-20 09:06:59',
            ),
            5 =>
            array (
                'id' => 21,
                'org_name' => 'test3',
                'address' => 'New Road, USA',
                'phone' => NULL,
                'website' => NULL,
                'contact_person_name' => '',
                'email' => 'test3@gmail.com',
                'notes' => NULL,
                'created_at' => '2019-08-20 09:07:05',
                'updated_at' => '2019-08-23 10:46:17',
            ),
        ));


    }
}
