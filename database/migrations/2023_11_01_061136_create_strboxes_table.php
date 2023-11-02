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
        Schema::create('strboxes', function (Blueprint $table) {
            $table->id();
            $table->string('file', 110);
			$table->enum('file_type', ['image', 'video', 'audio', 'pdf'])->default('image');
			$table->string('file_source', 255)->nullable();
			$table->string('ip_addr', 30); 
			$table->unsignedBigInteger('user_id');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strboxes');
    }
};
