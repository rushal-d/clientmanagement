<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation__services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->date('date')->nullable();
            $table->unsignedInteger('servicetype_id');
            $table->foreign('servicetype_id')->references('id')->on('servicetypes');
            $table->string('recurring_stat')->nullable();
            $table->string('recurring_type')->nullable();
            $table->float('amount')->nullable();
            $table->string('taxable_stat')->nullable();
            $table->string('notes')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation__services');
    }
}
