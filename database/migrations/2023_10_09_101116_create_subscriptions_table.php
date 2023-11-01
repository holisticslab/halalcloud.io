<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('plan_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'canceled', 'expired']);
            $table->enum('billing_interval', ['monthly', 'yearly']);
            $table->date('next_billing_date');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->date('trial_end_date')->nullable();
            $table->boolean('is_trial')->default(false);
            $table->string('coupon_code')->nullable();
            $table->integer('quantity')->default(1);
            $table->text('subscription_notes')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('company_id')->references('company_id')->on('companies');
            // $table->foreign('plan_id')->references('id')->on('subscription_plans');
            // $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
