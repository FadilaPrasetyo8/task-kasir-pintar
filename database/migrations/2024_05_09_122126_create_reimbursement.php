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
    Schema::create('reimbursements', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('nip');
        $table->foreign('nip')->references('id')->on('users');
        $table->date('tanggal_reimbursement')->nullable();
        $table->string('nama_reimbursement');
        $table->text('deskripsi');
        $table->enum('status', ['pending', 'submit', 'approved', 'rejected'])->default('pending'); // Ubah sesuai kebutuhan
        $table->string('file_name')->nullable();
        $table->string('file_path')->nullable(); // Sesuaikan tipe data sesuai kebutuhan
        $table->timestamps(); // Opsional, tambahkan jika Anda ingin waktu pembuatan dan pembaruan catatan
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reimbursement');
    }
};
