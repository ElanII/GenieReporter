<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatebhmcSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creating all relevant Fields for BHMC Sale table
        Schema::create('bhmcSales', function($table){
            $table->string('saleID');
            $table->string('ITEMNUM');
            $table->string('PT_ID_FK');
            $table->string('patientID');
            $table->date('SERVICEDATE');
            $table->string('FIRSTNAME');
            $table->string('SURNAME');
            $table->date('DOB');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
