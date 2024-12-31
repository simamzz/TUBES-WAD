<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->nullable();
            $table->string('name')->nullable();
            $table->string('category')->nullable(); //kategori ulasan (mentor/website)
            $table->text('testimonial')->nullable(); //isi ulasan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
