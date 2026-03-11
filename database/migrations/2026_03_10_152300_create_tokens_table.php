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
        Schema::create('tokens', function (Blueprint $table) {
            $table->string("token_id")->primary;
            $table->integer("token");
            $table->string('token_used');
            $table->timestamp('token_expiresat');
            $table->string('cust_id');
            $table->foreign('cust_id')->references('cust_id')->on('customers')->onDelete("cascade");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
