<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lawyers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('photo')->nullable();
                $table->string('phone');
                $table->string('gender');
                $table->date('birth_date');
                $table->string('email')->unique();
                $table->string('function');
                $table->string('cv')->nullable();
                $table->integer('level');
                $table->text('description_en')->nullable();
                $table->text('description_fr')->nullable();
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyers');
    }
};
