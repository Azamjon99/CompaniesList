<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('company_id')->unsigned();

            $table->foreign('company_id')->references('id')->on('companies_lists')->onDelete('cascade');
            $table->string('first_name')->required();
            $table->string('last_name');
            $table->string('email')->nullable()->unique();
            $table->string('phone');
           
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
