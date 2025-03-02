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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('grandfather_name')->nullable();
            $table->string('lastname');
            $table->date('date_of_birth')->nullable();
            $table->string('mothers_name');
            $table->string('social_status')->nullable();     //الوضع الاجتماعي
            $table->string('family_situation')->nullable();   //الوضع العائلي
            $table->string('health_status')->nullable();        //الوضع الصحي
            $table->string('number_place_of_registration')->nullable();         // محل ورقم القيد
            $table->string('nationality')->nullable();      //الجنسية
            $table->string('doctrine')->nullable();         //المذهب
            $table->string('guarantor')->nullable();        //الجهة الضامنة
            $table->string('political_affiliation')->nullable();   //الانتماء السياسي
            $table->string('lineage')->nullable();          //النسب
            $table->string('academic_level')->nullable();    //المستوى التعليمي
            $table->string('blood_type')->nullable();
            $table->string('religious_commitment')->nullable();   //الإلتزام الديني
            $table->string('phone_number');
            $table->string('second_phone')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE beneficiaries CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
