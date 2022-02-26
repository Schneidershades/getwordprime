<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('script_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('icon')->nullable();
            $table->text('description')->nullable();
            $table->string('prompt_1')->nullable();
            $table->string('prompt_2')->nullable();
            $table->string('usage')->nullable();
            $table->string('engine')->nullable();
            $table->string('presence_penalty')->nullable();
            $table->string('frequency_penalty')->nullable();
            $table->string('best_of')->nullable();
            $table->string('stream')->nullable();
            $table->string('documents')->nullable();
            $table->string('query')->nullable();
            $table->string('max_tokens')->nullable();
            $table->string('temperature')->nullable();
            $table->string('top_p')->nullable();
            $table->string('variation')->nullable();
            $table->boolean('activate')->default(false);
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
        Schema::dropIfExists('script_types');
    }
}
