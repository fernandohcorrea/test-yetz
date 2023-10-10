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
        Schema::create('soccer_field_player', function (Blueprint $table) {
            $table->bigInteger('soccer_field_id')->unsigned();
            $table->bigInteger('player_id')->unsigned();
            $table->primary(['soccer_field_id', 'player_id'])->unique();

            $table->foreign('soccer_field_id')
                ->references('id')
                ->on('soccer_fields');

            $table->foreign('player_id')
                ->references('id')
                ->on('players');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soccer_field_player');
    }
};
