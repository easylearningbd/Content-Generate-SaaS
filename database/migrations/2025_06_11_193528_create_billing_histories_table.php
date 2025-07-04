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
        Schema::create('billing_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            $table->dateTime('payment_date');
            $table->decimal('total',8,2);
            $table->string('bank_name')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('account_number')->nullable();
            $table->enum('status', ['Paid','Failed','Pending'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_histories');
    }
};
