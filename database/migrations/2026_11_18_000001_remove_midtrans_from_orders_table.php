<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('snap_token');
        });

        DB::statement("ALTER TABLE orders MODIFY payment_method ENUM('cod') NOT NULL DEFAULT 'cod'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE orders MODIFY payment_method ENUM('cod','midtrans') NOT NULL DEFAULT 'cod'");

        Schema::table('orders', function (Blueprint $table) {
            $table->string('snap_token')->nullable()->after('payment_status');
        });
    }
};
