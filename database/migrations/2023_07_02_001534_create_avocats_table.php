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
        Schema::create('avocats', function (Blueprint $table) {
            $table->id();
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->string('photo')->nullable();
            $table->string('telephone',30)->nullable();
            $table->text('adresse')->nullable();
            $table->string('sexe',10)->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('email',30)->unique();
            $table->string('cv')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->enum('niveau', [1, 2, 3, 4, 5])->nullable();
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
        Schema::dropIfExists('avocats');
    }
};
