<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('subjectid');
            $table->string('name');
            $table->timestamps();
        });
        DB::table ('subjects')->insert(
            array(
            ['name' =>'Maths'],
            ['name' =>'English'],
            ['name' =>'Kiswahili'],
            ['name' =>'Computer Class'],
            ['name' =>'Social Science']
            )
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
