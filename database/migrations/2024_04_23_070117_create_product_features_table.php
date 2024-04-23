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
        Schema::create('product_features', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->text('size')->nullable();
            $table->text('color')->nullable();
            $table->text('brand')->nullable();
            $table->text('compound')->nullable();
            $table->integer('count')->nullable();
            $table->text('package_link')->nullable();
            $table->text('image_link')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_h1')->nullable();
            $table->text('seo_description')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('length')->nullable();
            $table->integer('package_weight')->nullable();
            $table->integer('package_width')->nullable();
            $table->integer('package_height')->nullable();
            $table->integer('package_length')->nullable();
            $table->text('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_features');
    }
};
