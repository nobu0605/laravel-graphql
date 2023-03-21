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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("from")->unsigned();
            $table->bigInteger("to")->unsigned();
            $table->boolean("is_super");
            $table->boolean("is_like");
            $table->timestamps();

            $table->foreign('from')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('to')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
            $table->unique([
                'from',
                'to'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
