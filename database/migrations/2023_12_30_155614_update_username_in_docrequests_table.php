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
        DB::statement('UPDATE docrequests
                       INNER JOIN users ON docrequests.ReqUserID = users.id 
                       SET docrequests.RequestedName = users.name'); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('docrequests', function (Blueprint $table) {
            //
        });
    }
};
