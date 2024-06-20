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
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover');
            $table->string('author');
            $table->integer('page_count');
            $table->time('reading_time');
            $table->integer('year_of_publication');
            $table->integer('age_restriction');
            $table->text('description');
            $table->date('date_of_writing');
            $table->integer('volume');
            $table->string('isbn');
            $table->string('interpreter');
            $table->string('epub');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
