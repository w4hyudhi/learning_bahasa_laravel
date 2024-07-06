<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tps', function (Blueprint $table) {
            $table->integer('jumlah_dpt')->default(0)->change();
            $table->integer('jumlah_dptb')->default(0)->change();
            $table->integer('jumlah_dps')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tps', function (Blueprint $table) {
            $table->integer('jumlah_dpt')->change();
            $table->integer('jumlah_dptb')->change();
            $table->integer('jumlah_dps')->change();
        });
    }
};
