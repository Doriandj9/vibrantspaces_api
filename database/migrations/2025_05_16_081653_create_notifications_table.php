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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender')->nullable();
            $table->unsignedBigInteger('data_service_id')->nullable();
            $table->unsignedBigInteger('receiver');

            $table ->text('payload');
            $table->string('type')->default('TEXT');
            $table->string('doc_type')->default('NT');
            $table->string(DocStatus::COLUMN_NAME,length: DocStatus::LENGTH_COL)->default(DocStatus::ACTIVE);

            $table->foreign('sender')->references('id')->on('users')->onDelete('RESTRICT');
            $table->foreign('receiver')->references('id')->on('users')->onDelete('RESTRICT');
            $table->foreign('data_service_id')->references('id')->on('data_services')->onDelete('RESTRICT');
            $table->string('email')->nullable();
            $table->text('attachments')->nullable();
            $table->unsignedBigInteger("created_by")->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('RESTRICT');
            $table->unsignedBigInteger("updated_by")->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('RESTRICT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
