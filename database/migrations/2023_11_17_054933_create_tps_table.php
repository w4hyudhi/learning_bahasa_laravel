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
        Schema::create('tps', function (Blueprint $table) {
            $table->id();
            $table->string('nomer');
            $table->string('nama');
            $table->text('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('jumlah_dpt');
            $table->integer('jumlah_dptb');
            $table->integer('jumlah_dps');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tps');
    }
};
