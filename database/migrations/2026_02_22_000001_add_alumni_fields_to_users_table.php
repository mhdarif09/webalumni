<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('jenis_kelamin')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('tahun_masuk')->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('kota')->nullable();
            $table->text('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'jenis_kelamin',
                'jurusan',
                'tempat_lahir',
                'tanggal_lahir',
                'tahun_masuk',
                'tahun_lulus',
                'jabatan',
                'perusahaan',
                'kota',
                'alamat',
            ]);
        });
    }
};
