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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->char('id_provinsi', 2);
            $table->char('id_kota', 4);
            $table->char('id_kecamatan', 7);
            $table->timestamps();

            $table->foreign('id_provinsi')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kota')->references('id')->on('regencies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kecamatan')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penggunas');
    }
};
