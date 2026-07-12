<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->string('developer_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('map_plus_code')->nullable();
            $table->string('rera_id')->nullable();
            $table->string('rera_agent_id')->nullable();
            $table->string('configuration')->nullable();
            $table->string('possession_date')->nullable();
            $table->string('launch_date')->nullable();
            $table->string('project_area')->nullable();
            $table->string('project_size')->nullable();
            $table->unsignedInteger('units')->nullable();
            $table->unsignedInteger('towers')->nullable();
            $table->unsignedInteger('floors')->nullable();
            $table->string('size_range')->nullable();
            $table->string('price_range')->nullable();
            $table->string('avg_price')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('status')->default('Under Construction');
            $table->boolean('is_featured')->default(false);
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->json('schema_json')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
