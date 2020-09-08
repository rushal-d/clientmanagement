<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeClientsColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function($table){
            $table->string('address')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('website')->nullable()->change();
            $table->string('contact_person_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function($table){
            $table->string('address');
            $table->string('phone');
            $table->string('website');
            $table->string('contact_person_name');
        });
    }
}
