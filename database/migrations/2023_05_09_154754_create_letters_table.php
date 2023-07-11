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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->nullable();
            $table->text('text')->nullable();
            $table->string('company', 50);
            $table->string('contract_type', 25);
            $table->string('localization', 50)->nullable();
            $table->integer('experience');
            $table->json('skills');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('appellation_id');
            $table->foreign('appellation_id')
                ->references('id')
                ->on('appellations')
                ->onDelete('cascade');
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
