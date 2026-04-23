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

        if (Schema::hasColumn('payments', 'order_id')) {
            // Make order_id nullable to avoid insert errors when not provided.
            try {
                DB::statement('ALTER TABLE `payments` MODIFY `order_id` BIGINT UNSIGNED NULL');
            } catch (\Exception $e) {
                // If alter fails (missing privileges or different type), ignore.
            }
        }
    }

    public function down()
    {
        if (!Schema::hasTable('payments')) {
            return;
        }

        if (Schema::hasColumn('payments', 'order_id')) {
            try {
                DB::statement('ALTER TABLE `payments` MODIFY `order_id` BIGINT UNSIGNED NOT NULL');
            } catch (\Exception $e) {
                // ignore
            }
        }
    }
};
