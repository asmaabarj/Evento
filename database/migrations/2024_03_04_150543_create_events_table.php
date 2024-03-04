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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titre');
            $table->string('description');
            $table->string('dateDubet');
            $table->string('dateFin');
            $table->string('lieu');
            $table->string('photo');
            $table->integer('nbPlaces');
            $table->enum('acceptation', ['manuelle', 'automatique'])->default('automatique');
            $table->foreignId('id_categorie')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};