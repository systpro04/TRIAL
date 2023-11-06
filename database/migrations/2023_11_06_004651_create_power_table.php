<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powers', function (Blueprint $table) {
            $table->id();
            $table->string('capacity');
            $table->string('morning');
            $table->string('afternoon');
            $table->string('evening');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations. 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('powers');
    }
}
