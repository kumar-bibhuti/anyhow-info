<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('Inventory', function (Blueprint $table) {
            $table->id();
            $table->string('p_id');
            $table->string('p_name');
            $table->string('vendor');
            $table->string('mrp');
            $table->string('batch_no');
            $table->string('batch_date');
            $table->string('qty');
            $table->string('status');
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
        //
    }
}