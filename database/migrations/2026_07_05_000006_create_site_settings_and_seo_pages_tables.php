<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('text');
            $table->string('group')->default('general');
            $table->timestamps();
        });

        Schema::create('seo_pages', function (Blueprint $table) {
            $table->id();
            $table->string('route_name')->unique();
            $table->string('title');
            $table->string('description');
            $table->string('canonical_path')->nullable();
            $table->string('robots')->default('index,follow');
            $table->json('schema_json')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_pages');
        Schema::dropIfExists('site_settings');
    }
};
