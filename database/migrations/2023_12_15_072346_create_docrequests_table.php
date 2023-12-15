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
        Schema::create('docrequests', function (Blueprint $table) {
            $table->id('ReqID');
            $table->foreignId('ReqDocID')->constrained('documentinfos', 'DocID');
            $table->foreignId('ReqUserID')->constrained('users', 'id'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docrequests');
    }
};
