<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('env_water_icon'))
        {
            Schema::connection('mysql')->create('env_water_icon', function (Blueprint $table) {
                $table->bigIncrements('env_water_icon_id'); 
                $table->string('env_water_icon_name',1000)->nullable();// 
                // $table->string('d_query_type')->nullable();//  
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_icon');
    }
};
