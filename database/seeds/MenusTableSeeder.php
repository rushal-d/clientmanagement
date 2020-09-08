<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 9,
                'menu_name' => 'role.index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Roles',
                'parent_id' => 46,
                'order' => 3,
                'icon' => NULL,
                'created_at' => '2019-01-02 10:04:13',
                'updated_at' => '2019-01-02 10:32:33',
            ),
            1 => 
            array (
                'id' => 16,
                'menu_name' => 'permission.index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Permission',
                'parent_id' => 46,
                'order' => 4,
                'icon' => NULL,
                'created_at' => '2019-01-02 10:04:25',
                'updated_at' => '2019-01-02 10:32:33',
            ),
            2 => 
            array (
                'id' => 25,
                'menu_name' => 'user.index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Users',
                'parent_id' => 46,
                'order' => 2,
                'icon' => NULL,
                'created_at' => '2019-01-02 09:31:06',
                'updated_at' => '2019-01-02 10:32:16',
            ),
            3 => 
            array (
                'id' => 32,
                'menu_name' => 'assignrole.index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Assign Permission',
                'parent_id' => 46,
                'order' => 5,
                'icon' => NULL,
                'created_at' => '2019-01-02 10:04:48',
                'updated_at' => '2019-01-02 10:32:33',
            ),
            4 => 
            array (
                'id' => 46,
                'menu_name' => '#usermanagement',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'User Management',
                'parent_id' => 0,
                'order' => 7,
                'icon' => NULL,
                'created_at' => '2019-01-02 09:26:37',
                'updated_at' => '2019-08-21 10:14:20',
            ),
            5 => 
            array (
                'id' => 47,
                'menu_name' => 'menu-index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Menu Builder',
                'parent_id' => 46,
                'order' => 6,
                'icon' => NULL,
                'created_at' => '2019-01-02 10:06:43',
                'updated_at' => '2019-01-02 10:07:25',
            ),
            6 => 
            array (
                'id' => 88,
                'menu_name' => 'client.index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Clients',
                'parent_id' => 0,
                'order' => 3,
                'icon' => 'fas fa-user',
                'created_at' => '2019-07-16 05:08:14',
                'updated_at' => '2019-07-23 06:25:19',
            ),
            7 => 
            array (
                'id' => 95,
                'menu_name' => 'servicetype.index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Service Types',
                'parent_id' => 0,
                'order' => 4,
                'icon' => 'fab fa-servicestack',
                'created_at' => '2019-07-16 06:22:15',
                'updated_at' => '2019-07-23 06:25:20',
            ),
            8 => 
            array (
                'id' => 102,
                'menu_name' => 'service.index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Services',
                'parent_id' => 0,
                'order' => 6,
                'icon' => 'fas fa-award',
                'created_at' => '2019-07-17 05:19:53',
                'updated_at' => '2019-08-21 10:14:20',
            ),
            9 => 
            array (
                'id' => 112,
                'menu_name' => 'quotation.index',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Pending',
                'parent_id' => 121,
                'order' => 2,
                'icon' => 'fab fa-500px',
                'created_at' => '2019-08-20 06:35:54',
                'updated_at' => '2019-08-21 10:20:48',
            ),
            10 => 
            array (
                'id' => 120,
                'menu_name' => 'quotation.finalized',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Finalized',
                'parent_id' => 121,
                'order' => 3,
                'icon' => 'fas fa-book-open',
                'created_at' => '2019-08-21 10:11:41',
                'updated_at' => '2019-08-21 10:14:20',
            ),
            11 => 
            array (
                'id' => 121,
                'menu_name' => '#quotation',
                'parameters' => NULL,
                'route' => NULL,
                'display_name' => 'Quotation',
                'parent_id' => 0,
                'order' => 5,
                'icon' => 'fas fa-clipboard',
                'created_at' => '2019-08-21 10:13:04',
                'updated_at' => '2019-08-21 10:19:36',
            ),
        ));
        
        
    }
}