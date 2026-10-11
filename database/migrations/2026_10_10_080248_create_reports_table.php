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
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->string('title');
        $table->string('category');
        $table->string('location');
        $table->text('description');
        $table->string('photo')->nullable();
        $table->enum('priority', ['Rendah', 'Sedang', 'Tinggi'])->default('Sedang');
        $table->enum('status', [
            'Diajukan',
            'Diverifikasi',
            'Diproses',
            'Selesai',
            'Ditolak'
        ])->default('Diajukan');
        $table->text('rejection_reason')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
