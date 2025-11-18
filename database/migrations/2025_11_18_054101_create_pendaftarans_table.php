<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('hp', 13);
            $table->string('email', 50);
            $table->integer('nominal');
            $table->string('bank', 30);
            $table->string('anbank', 40);
            $table->text('gambar');
            $table->date('tanggal_transfer');
            $table->string('ipaddress');
            $table->timestamps(); 
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};