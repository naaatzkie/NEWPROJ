<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('payments')) {
            return;
        }

        if (Schema::hasColumn('payments', 'amount_paid')) {
            try {
                DB::statement("ALTER TABLE `payments` MODIFY `amount_paid` DECIMAL(8,2) NOT NULL DEFAULT '0.00'");
            } catch (\Exception $e) {
                // ignore errors
            }
        }
    }

    public function down()
    {
        if (!Schema::hasTable('payments')) {
            return;
        }

        if (Schema::hasColumn('payments', 'amount_paid')) {
            try {
                DB::statement("ALTER TABLE `payments` MODIFY `amount_paid` DECIMAL(8,2) NOT NULL");
            } catch (\Exception $e) {
                // ignore
            }
        }
    }
};
