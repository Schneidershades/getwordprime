<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserScriptTypeLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_script_type_languages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('script_type_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->uuid('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->uuid('language_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('user_script_type_languages');
    }
}
