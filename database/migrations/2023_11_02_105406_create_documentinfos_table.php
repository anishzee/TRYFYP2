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
        Schema::create('documentinfos', function (Blueprint $table) {
            $table->id('DocID');
            $table->string('DocName');
            $table->date('DocDate');
            $table->string('LastUsed');
            $table->string('Location');
            $table->string('DocUpload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentinfos');
    }
};
