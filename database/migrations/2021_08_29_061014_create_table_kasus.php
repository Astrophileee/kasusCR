<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKasus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_kasus', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nama_mapel');
            $table->string('nama_tugas');
            $table->string('deskripsi_tugas')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('skor')->unsigned()->nullable();
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
        Schema::dropIfExists('table_kasus');
    }
}
