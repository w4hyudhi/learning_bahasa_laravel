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
        Schema::table('electors', function (Blueprint $table) {
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('SET NULL');
            $table->unsignedBigInteger('distrik_id')->nullable();
            $table->foreign('distrik_id')->references('id')->on('distriks')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('electors', function (Blueprint $table) {
            $table->dropForeign(['distrik_id']);
            $table->dropColumn('distrik_id');
            $table->dropForeign(['desa_id']);
            $table->dropColumn('desa_id');
        });
    }
};
