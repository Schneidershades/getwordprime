<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_ads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('city')->nullable();
            $table->text('title')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->bigInteger('date')->nullable();
            $table->bigInteger('bids')->nullable();
            $table->string('status')->nullable();
            $table->integer('bid_count')->nullable();
            $table->integer('bid_avg')->nullable();
            $table->string('budget_type')->nullable();
            $table->integer('budget_low')->nullable();
            $table->integer('budget_high')->nullable();
            $table->longText('url')->nullable();
            $table->string('currency_id')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('currency_sign')->nullable();
            $table->string('currency_name')->nullable();
            $table->string('currency_exchange_rate')->nullable();
            $table->string('currency_country')->nullable();
            $table->string('currency_is_escrowcom_supported')->nullable();
            $table->integer('hourly_commitment')->nullable();
            $table->string('hourly_interval')->nullable();
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
        Schema::dropIfExists('freelancer_ads');
    }
}
