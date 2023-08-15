<?php

use App\Models\Plan;
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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plan::class)->references('id')->on('plans');
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->unique();

            // status tenant (se tiver invativo 'N' ele perde o acesso do sitema)
            $table->enum('active', ['Y', 'N']);

            // subscription
            $table->date('subscription')->nullable();  /* data que se inscreveu */
            $table->date('expires_at')->nullable();  /* data que expira o acesso */
            $table->string('subscription_id')->nullable();  /* identificação do gateway de pagamento*/
            $table->string('subscription_active')->default(false);  /*  assinatura ativa (porque)  */
            $table->string('subscription_suspended')->default(false);  /* assinatura cancelada */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
