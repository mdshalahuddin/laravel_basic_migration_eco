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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('descript',1000);
            $table->string('email',50);
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')->references('id')->on('products')
            ->cascadeOnDelete()
            ->restrictOnUpdate();

            $table->foreign('email')->references('email')->on('profiles')
            ->cascadeOnDelete()
            ->restrictOnUpdate();


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
