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
            DELETE FROM payments
            WHERE id NOT IN (
                SELECT MAX(id) FROM payments GROUP BY booking_id
            )
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
