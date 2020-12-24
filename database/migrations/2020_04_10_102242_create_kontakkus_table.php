<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontakku', function (Blueprint $table) {
            $table->increments('id_kontak');
            $table->string('nama_kontak');
            $table->string('email_kontak');
            $table->string('nohp_kontak');
            $table->string('alamat_kontak');

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
        Schema::dropIfExists('kontakku');
    }
}
