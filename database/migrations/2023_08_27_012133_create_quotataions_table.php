<?php

use App\Models\Drug;
use App\Models\Prescription;
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
        Schema::create('quotataions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Drug::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('total_amount',8,2);
            $table->foreignIdFor(Prescription::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('email_status')->default(0)->comment('0-sent, 1-not-sent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotataions');
    }
};
