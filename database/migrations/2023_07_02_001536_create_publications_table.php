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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('titre_fr');
            $table->string('sous_titre_fr')->nullable();
            $table->string('pdf_fr');
            $table->string('photo');
            $table->text('contenu_fr');
            $table->string('titre_en');
            $table->string('sous_titre_en')->nullable();
            $table->string('pdf_en');
            $table->text('contenu_en');
            $table->foreignId('avocat_id')->constrained()->nullable();
            $table->foreignId('domaine_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
