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
        if (!Schema::hasTable('d_orf'))
        {
            Schema::connection('mysql7')->create('d_orf', function (Blueprint $table) {
                $table->bigIncrements('d_orf_id');

                $table->string('HN')->nullable();// 
                $table->date('DATEOPD')->nullable();// 
                 
                $table->string('CLINIC')->nullable();//  
                $table->string('REFER')->nullable(); //             
                $table->string('REFERTYPE')->nullable(); //  
                $table->string('SEQ')->nullable(); //  
                 
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
        Schema::dropIfExists('d_orf');
    }
};
