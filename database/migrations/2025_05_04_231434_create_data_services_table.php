<?php

use App\Core\DocStatus;
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
        Schema::create('data_services', function (Blueprint $table) {
            $table->id();
            $table->string('phone_client');
            $table->string('address_client');
            $table->string('type_contact');
            $table->integer('bathrooms')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('kitchens')->nullable();
            $table->integer('meters')->nullable();
            $table->integer('yard')->comment('patio o jardin')->nullable();
            $table->integer('stairs')->comment('escaleras')->nullable();
            $table->unsignedBigInteger('services_id');
            $table->unsignedBigInteger('user_id');
            $table->string(DocStatus::COLUMN_NAME,DocStatus::LENGTH_COL)->default(DocStatus::ACTIVE);
            $table->foreign('services_id','fk_services_id')->references('id')->on('services')->onDelete('CASCADE');
            $table->foreign('user_id','fk_user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_services', function (Blueprint $table) {
            $table->dropForeign('fk_services_id');
            $table->dropForeign('fk_user_id');
        });
        Schema::dropIfExists('data_services');
    }
};
