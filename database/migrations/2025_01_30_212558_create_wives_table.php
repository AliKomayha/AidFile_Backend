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
        Schema::create('wives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Beneficiary_ID');
            $table->string('full_name');
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('religious_commitment')->nullable();   //الإلتزام الديني
            $table->string('doctrine')->nullable();         //المذهب
            $table->string('lineage')->nullable();          //النسب
            $table->string('academic_level')->nullable();    //المستوى التعليمي
            $table->string('type_of_work')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();   //الدخل الشهري
            $table->string('health_status')->nullable();        //الوضع الصحي
            $table->string('guarantor')->nullable()->nullable();        //الجهة الضامنة
            $table->string('blood_type')->nullable();
            $table->string('property_type')->nullable();
            $table->decimal('property_value',10,2)->nullable();

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
        Schema::dropIfExists('wives');
    }
};
