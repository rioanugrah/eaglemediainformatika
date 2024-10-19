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
        Schema::create('cooperation', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('cooperation_code');
            $table->string('cooperation_name');
            $table->string('cooperation_email');
            $table->string('cooperation_no_telp');
            $table->string('cooperation_company');
            $table->string('cooperation_email_company');
            $table->string('cooperation_location');
            $table->string('cooperation_address_one');
            $table->string('cooperation_address_two')->nullable();
            $table->string('cooperation_city');
            $table->string('cooperation_country');
            $table->string('cooperation_state');
            $table->string('cooperation_zip_code');
            $table->string('status',50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooperation');
    }
};
