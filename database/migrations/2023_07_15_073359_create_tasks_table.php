<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->bigInteger('assigned_for')->unsigned();
            $table->bigInteger('assigned_by')->unsigned();
            $table->foreign('assigned_for')->references('id')->on('users');
            $table->foreign('assigned_by')->references('id')->on('users');
            $table->string('status',20)->default('new');//new - done
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
