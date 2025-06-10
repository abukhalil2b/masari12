<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.Run the migrationsRun the migrations
     *
     * @return void
     */
    public function up()
    {

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100); // Human-readable title of the permission (e.g., "Create Course", "View Reports")
            $table->string('slug', 100)->unique();//(e.g., "create_course", "view_reports")
            $table->string('category', 50)->nullable(); // Category for organizing permissions (e.g., "Course Management", "User Management")
            $table->text('description')->nullable(); // Detailed description of what the permission allows
            $table->timestamps(); // Permissions should have timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
