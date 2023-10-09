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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->date('scheduling_at');
            $table->unsignedBigInteger('soccer_field_id');
            $table->tinyInteger('num_team_players');
            $table->timestamps();

            $table->foreign('soccer_field_id')
                ->references('id')
                ->on('soccer_fields');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
