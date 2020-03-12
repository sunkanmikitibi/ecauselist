<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case_fileno')->unique();
            $table->unsignedInteger('judge_id');
            $table->unsignedInteger('court_id');
            $table->enum('state',  array('enable', 'disable'));
            $table->string('status');
            $table->date('case_date');
            $table->date('dateof_nextadj')->nullable();
            $table->unsignedInteger('user_id');
            $table->longText('action')->nullable();
            $table->longText('litigants');
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
        Schema::dropIfExists('cases');
    }
}
