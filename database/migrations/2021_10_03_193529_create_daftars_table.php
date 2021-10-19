<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pelatihan');
            $table->string('jenis_pelatihan');
            $table->string('sesi');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('nomor_hp');
            $table->string('email');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('status');
            $table->string('instansi')->nullable();
            $table->string('kode_unik')->unique();
            $table->string('is_payed')->default('belum');
            $table->integer('id_jadwal');
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
        Schema::dropIfExists('daftars');
    }
}