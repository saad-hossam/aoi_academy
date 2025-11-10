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
        Schema::create('capabilities_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->string('title');
            $table->text('desc');
            $table->unique(['capability_id','locale']);
            $table->foreignId('capability_id')->onDelete('cascade');
             $table->text('meta_desc');
            $table->text('meta_keyword');
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
        Schema::dropIfExists('capability_translations');
    }
};
