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
            $table->string('job_type');
            $table->string('contract_type');
            $table->decimal('monthly_income', 10, 2);

            $table->timestamps();

            $table->foreign('Beneficiary_ID')->references('id')->on('beneficiaries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work');
    }
};
