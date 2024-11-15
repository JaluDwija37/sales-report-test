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
        Schema::create('customer_alamat', function (Blueprint $table) {
            $table->bigIncrements('idcustomeralamat');
            $table->foreignId('customer_id')->constrained('customers', 'customerid')->cascadeOnDelete();
            $table->text('customer_alamat');

            $table->primary('idcustomeralamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_alamat');
    }
};
