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
        Schema::create('work', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Beneficiary_ID');
            $table->string('job_type')->nullable();
            $table->string('contract_type')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();

            $table->timestamps();

            $table->foreign('Beneficiary_ID')->references('id')->on('beneficiaries')->onDelete('cascade');

        });
        DB::statement("ALTER TABLE beneficiaries CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work');
    }
};
