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
        Schema::create('aid_distributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Aid_ID');
            $table->unsignedBigInteger('Beneficiary_ID');
            $table->date('date_given');
            $table->decimal('unit_value', 10, 2); 
            $table->decimal('amount', 10, 2)->default(1); 
            $table->decimal('total_value', 10, 2)->storedAs('unit_value * amount');

            $table->timestamps();

            $table->foreign('Aid_ID')->references('id')->on('aids')->onDelete('cascade');
            $table->foreign('Beneficiary_ID')->references('id')->on('beneficiaries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_distributions');
    }
};
