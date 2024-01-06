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
        Schema::table('docrequests', function (Blueprint $table) {
            //
            $table->string('ReqStatus')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('docrequests', function (Blueprint $table) {
            //
            $table->dropColumn('ReqStatus');
        });
    }
};
