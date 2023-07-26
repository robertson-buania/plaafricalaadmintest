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
        Schema::create('expertises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('titre_fr');
            $table->string('sous_titre_fr')->nullable();
            $table->string('photo')->nullable();
            $table->text('contenu_fr')->nullable();
            $table->string('titre_en');
            $table->string('sous_titre_en')->nullable();
            $table->string('contenu_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expertises');
    }
};
