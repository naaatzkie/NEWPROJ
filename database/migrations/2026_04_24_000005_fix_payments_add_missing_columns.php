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

        Schema::table('payments', function (Blueprint $table) {
            if (!Schema::hasColumn('payments', 'amount')) {
                $table->decimal('amount', 8, 2)->default(0)->after('booking_id');
            }

            if (!Schema::hasColumn('payments', 'method')) {
                $table->string('method')->nullable()->after('amount');
            }

            if (!Schema::hasColumn('payments', 'status')) {
                $table->string('status')->default('unpaid')->after('method');
            }

            if (!Schema::hasColumn('payments', 'transaction_reference')) {
                $table->string('transaction_reference')->nullable()->after('status');
            }
        });
    }

    public function down()
    {
        if (!Schema::hasTable('payments')) {
            return;
        }

        Schema::table('payments', function (Blueprint $table) {
            if (Schema::hasColumn('payments', 'transaction_reference')) {
                $table->dropColumn('transaction_reference');
            }
            if (Schema::hasColumn('payments', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('payments', 'method')) {
                $table->dropColumn('method');
            }
            if (Schema::hasColumn('payments', 'amount')) {
                $table->dropColumn('amount');
            }
        });
    }
};
