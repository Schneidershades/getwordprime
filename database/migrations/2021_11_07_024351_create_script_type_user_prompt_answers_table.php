<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptTypeUserPromptAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('script_type_user_prompt_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('script_type_prompt_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('answers');
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
        Schema::dropIfExists('script_type_user_prompt_answers');
    }
}
