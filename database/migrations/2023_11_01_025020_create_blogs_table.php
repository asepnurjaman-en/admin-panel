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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('slug', 150);
            $table->longText('content');
            $table->string('file', 110);
            $table->enum('file_type', ['image', 'video', 'audio', 'pdf'])->default('image');
            $table->string('file_source', 255)->nullable();
            $table->string('author', 50);
            $table->dateTime('datetime');
            $table->text('description');
            $table->enum('publish', ['publish', 'draft', 'schedule', 'archive'])->default('draft');
            $table->dateTime('schedule_time')->nullable();
            $table->json('tags')->nullable();
            $table->json('related')->nullable();
            $table->unsignedBigInteger('reads')->default(0)->index();
            $table->json('vote')->nullable();
            $table->string('ip_addr', 30)->nullable();
            $table->unsignedBigInteger('blog_category_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
