<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformIntegrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_integrations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('platform_integration_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->text('platform_keys');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->boolean('activate')->default(true);
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
        Schema::dropIfExists('platform_integrations');
    }
}
