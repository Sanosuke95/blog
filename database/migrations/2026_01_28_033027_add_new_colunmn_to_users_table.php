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
        Schema::table('users', function (Blueprint $table) {
            $table->uuid()->unique();
            $table->string("avatar")->nullable();
            $table->boolean("active")->default(true)->nullable();
            $table->string('name', 128)->nullable()->change();
            $table->string('email', 128)->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'active', 'uuid']);
            $table->string('name')->change();
        });
    }
};
