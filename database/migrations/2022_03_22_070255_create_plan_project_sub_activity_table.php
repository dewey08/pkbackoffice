<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanProjectSubActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('plan_project_sub_activity')){

            Schema::create('plan_project_sub_activity', function (Blueprint $table) {
                $table->id("PRO_SUBACTIVITY_ID",11);
                $table->String("PRO_SUB_ID",20)->nullable(); 
                $table->String("PRO_SUBACTIVITY_NAME",600)->nullable(); 
                $table->String("PRO_SUBACTIVITY_AMOUNT",50)->nullable(); 
                $table->String("PRO_SUBACTIVITY_CODE",255)->nullable(); 
                $table->String("PRO_SUBACTIVITY_HR",255)->nullable(); 
                $table->String("PRO_SUBACTIVITY_HR_NAME",255)->nullable(); 
                $table->dateTime('updated_at')->nullable();
                $table->dateTime('created_at')->nullable();
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
        Schema::dropIfExists('plan_project_sub_activity');
    }
}
