<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('script_responses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('script_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->uuid('campaign_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->uuid('script_type_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->uuid('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->longText('text')->nullable();
            $table->string('index')->nullable();
            $table->string('logprobs')->nullable();
            $table->string('finish_reason')->nullable();
            $table->bigInteger('word_count')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('script_responses');
    }
}
