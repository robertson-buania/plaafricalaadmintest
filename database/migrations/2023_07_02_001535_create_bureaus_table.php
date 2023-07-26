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
        Schema::create('bureaus', function (Blueprint $table) {
            $table->id();
            $table->string('nom',50);
            $table->string('email',50);
            $table->string('pays_fr',50);
            $table->string('pays_en',50);
            $table->string('telephone',30);
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->string('photo');
            $table->string('adresse_physique_fr');
            $table->string('adresse_physique_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureaus');
    }
};
