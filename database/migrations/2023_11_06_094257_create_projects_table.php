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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_company_id');
            $table->foreignId('group_id')->nullable();
            $table->foreignId('game_id')->nullable();
            $table->foreignId('period_id')->nullable();
            $table->foreignId('type_id')->nullable();
            $table->string('name');
            $table->unsignedInteger('number');
            $table->text('description')->nullable();
            $table->date('due_on')->nullable();
            $table->decimal('estimation', 6, 2)->nullable();
            $table->unsignedInteger('order_column');
            $table->string('motive_archived')->nullable();
            $table->boolean('default')->default(false);
            $table->timestamps();
            $table->timestamp('completed_at')->nullable();
            $table->archivedAt();

            $table->foreign('client_company_id')->references('id')->on('client_companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
