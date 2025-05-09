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
        Schema::create('users_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->string(DocStatus::COLUMN_NAME, DocStatus::LENGTH_COL)->default(DocStatus::ACTIVE);
            $table->timestamps();
        });

        $this->insertData();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_roles');
    }

    public function insertData(): void
    {
        $data = [[
            'user_id'=> 1,
            'role_id'=> 1,
        ]];

        DB::table('users_roles')->insert($data);
    }
};
