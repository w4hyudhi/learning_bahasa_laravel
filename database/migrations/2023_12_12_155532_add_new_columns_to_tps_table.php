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
            $table->string('koordinator')->nullable();
            $table->string('no_hp')->nullable();
            $table->integer('suara')->default(0);
            $table->integer('suara_sah')->default(0);
            $table->integer('suara_tidak_sah')->default(0);
            $table->integer('suara_golput')->default(0);
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
            $table->dropColumn('koordinator');
            $table->dropColumn('no_hp');
            $table->dropColumn('suara');
            $table->dropColumn('suara_sah');
            $table->dropColumn('suara_tidak_sah');
            $table->dropColumn('suara_golput');
        });
    }
};
