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
            $table->id();
            $table->foreignId('script_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('user_id')->after('script_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('campaign_id')->after('script_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('script_type_id')->after('script_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->longText('text')->nullable();
            $table->string('index')->nullable();
            $table->string('logprobs')->nullable();
            $table->string('finish_reason')->nullable();
            $table->boolean('active')->default(true);
            $table->bigInteger('word_count')->default(0);
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
