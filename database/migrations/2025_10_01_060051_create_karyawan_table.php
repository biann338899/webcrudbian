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
    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id(); // primary key auto increment
            $table->integer('nip')->unique(); // NIP unik biar tidak dobel
            $table->string('nama_karyawan', 100);
            $table->integer('gaji_karyawan');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);

            // relasi ke departemen (nullable kalau opsional)
            $table->unsignedBigInteger('departemen_id')->nullable();

            // foreign key constraint (aktifkan jika tabel departemen sudah ada)
            $table->foreign('departemen_id')->references('id')->on('departemen')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // sebelum drop tabel, drop dulu foreign key-nya
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropForeign(['departemen_id']);
        });

        Schema::dropIfExists('karyawan');
    }
};
