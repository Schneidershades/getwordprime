<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserScriptTypePresetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_script_type_presets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('script_type_preset_id')->nullable()->constrained();
            $table->foreignId('script_id')->nullable()->constrained();
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
        Schema::dropIfExists('user_script_type_presets');
    }
}
