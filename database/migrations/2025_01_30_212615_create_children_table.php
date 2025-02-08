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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Beneficiary_ID');
            $table->string('name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('religious_commitment')->nullable();   //الإلتزام الديني
            $table->string('sex');
            $table->string('resident_in_house');   //مقيم في المنزل
            $table->string('academic_level')->nullable();    //المستوى التعليمي            
            $table->string('continues_studying');       //يتابع الدراسة
            $table->decimal('yearly_installment', 10, 2)->nullable();   //القسط السنوي
            $table->string('type_of_work')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();    //الدخل الشهري
            $table->decimal('monthly_contribution', 10, 2)->nullable();   //المساهمة الشهرية
            $table->string('health_status')->nullable();        //الوضع الصحي
            $table->string('guarantor')->nullable()->nullable();        //الجهة الضامنة
            $table->string('blood_type')->nullable();

            $table->timestamps();

            $table->foreign('Beneficiary_ID')->references('id')->on('beneficiaries')->onDelete('cascade')->onUpdate('cascade');

        });
        DB::statement("ALTER TABLE beneficiaries CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
