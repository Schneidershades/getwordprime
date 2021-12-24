<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptTypePresetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('script_type_presets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('script_type_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('question')->nullable();
            $table->string('field_type')->nullable();
            $table->string('label')->nullable();
            $table->string('placeholder')->nullable();
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
        Schema::dropIfExists('script_type_presets');
    }
}
