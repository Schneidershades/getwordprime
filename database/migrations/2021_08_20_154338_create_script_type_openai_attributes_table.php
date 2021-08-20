<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptTypeOpenaiAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('script_type_openai_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('script_type_id')->nullable()->constrained();
            $table->foreignId('openai_attribute_id')->nullable()->constrained();
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
        Schema::dropIfExists('script_type_openai_attributes');
    }
}
