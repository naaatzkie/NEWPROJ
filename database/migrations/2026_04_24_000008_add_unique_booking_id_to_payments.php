<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('payments')) {
            return;
        }

        // Remove duplicate payments, keeping only the latest per booking
        DB::statement('
            DELETE p1 FROM payments p1
            INNER JOIN payments p2
            WHERE p1.booking_id = p2.booking_id AND p1.id < p2.id
        ');

        Schema::table('payments', function (Blueprint $table) {
            $table->unique('booking_id');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropUnique(['booking_id']);
        });
    }
};
