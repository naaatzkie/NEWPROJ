<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('payments')) {
            return;
        }

        if (!Schema::hasColumn('payments', 'booking_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->unsignedBigInteger('booking_id')->after('id')->nullable();
                $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        if (!Schema::hasTable('payments')) {
            return;
        }

        if (Schema::hasColumn('payments', 'booking_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->dropForeign(['booking_id']);
                $table->dropColumn('booking_id');
            });
        }
    }
};
