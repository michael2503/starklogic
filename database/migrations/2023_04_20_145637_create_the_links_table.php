<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('the_links', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('link_name', 150)->nullable();
            $table->string('title', 150)->nullable();
            $table->integer('clicks')->default(0);
            $table->text('image')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('the_links');
    }
};
