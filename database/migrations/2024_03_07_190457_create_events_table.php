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
            $table->string('date');
            $table->string('lieu');
            $table->string('photo');
            $table->integer('nbPlaces');
            $table->integer('nbPlacesRester');
            $table->enum('acceptation', ['manuelle', 'automatique'])->default('automatique');
            $table->string('price');
            $table->foreignId('id_categorie')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['1', '0','2','3'])->default('0');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

