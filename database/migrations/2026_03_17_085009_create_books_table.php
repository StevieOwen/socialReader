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
        Schema::create('books', function (Blueprint $table) {
            $table->string('book_id')->primary();
            $table->string('book');
            $table->string('book_title');
            $table->string('book_author');
            $table->string('cust_id');
            $table->foreign('cust_id')->references('cust_id')->on('customers')->onDelete("cascade");
            $table->string('private');
            $table->string('status');
            $table->integer('last_page');
            $table->string('cover_path');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
