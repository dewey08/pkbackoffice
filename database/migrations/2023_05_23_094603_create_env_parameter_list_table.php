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
        if (!Schema::hasTable('env_parameter_list'))
        {
            Schema::create('env_parameter_list', function (Blueprint $table) {
                $table->bigIncrements('parameter_list_id');  
                $table->string('parameter_list_name',255)->nullable();//    
                $table->string('parameter_list_unit',255)->nullable();//    
                $table->string('parameter_list_normal',255)->nullable();// 
                $table->string('parameter_list_user_analysis_results',255)->nullable();//     
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
        Schema::dropIfExists('env_parameter_list');
    }
};
