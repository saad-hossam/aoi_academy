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
        Schema::create('course_translations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('course_id')->constrained()->cascadeOnDelete();
        $table->string('locale')->index();

        $table->string('title');
        $table->text('goal')->nullable();
        $table->longText('content')->nullable();
        $table->string('duration')->nullable();
        $table->text('pre_request')->nullable();
        $table->text('meta_desc')->nullable();
        $table->text('meta_keyword')->nullable();
        $table->unique(['course_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_translations');
    }
};
