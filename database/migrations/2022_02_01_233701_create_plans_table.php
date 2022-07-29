<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('role')->nullable();
            $table->boolean('teams')->default(false);
            $table->string('description')->nullable();
            $table->boolean('discount_applied')->default(false);
            $table->string('discount_mode')->nullable();
            $table->float('amount')->default(0);
            $table->float('discount')->default(0);
            $table->integer('minimum_discount_unit')->default(0);
            $table->integer('maximum_discount_unit')->default(0);
            $table->float('discount_percentage')->default(0);
            $table->float('discount_amount')->default(0);
            $table->integer('grace_days')->default(0);
            $table->unsignedInteger('periodicity')->nullable(0);
            $table->string('periodicity_type');
            $table->softDeletes();
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
        Schema::dropIfExists('plans');
    }
};
