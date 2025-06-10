<?php

use App\Models\Message;
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
        Schema::create('messagegroups', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->bigInteger('createdby_id')->unsigned();//user_id
            $table->timestamps();

            $table->foreign('createdby_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();
        });

        Schema::create('messagegroup_member', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('messagegroup_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();//user_id
            $table->boolean('moderator')->default(false);
            
            $table->foreign('messagegroup_id')
            ->references('id')
            ->on('messagegroups')
            ->cascadeOnDelete();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

        });

        Schema::create('messagegroup_messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sender_id')->unsigned();//user_id
            $table->bigInteger('messagegroup_id')->unsigned();
            $table->text('content');

            $table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->foreign('messagegroup_id')
            ->references('id')
            ->on('messagegroups')
            ->cascadeOnDelete();

            $table->timestamps();
        });

        Schema::create('messagegroup_message_receiver',function(Blueprint $table){
            $table->id();
            $table->bigInteger('messagegroup_message_id')->unsigned();
            $table->bigInteger('receiver_id')->unsigned();

            $table->foreign('messagegroup_message_id')
            ->references('id')
            ->on('messagegroup_messages')
            ->cascadeOnDelete();

            $table->foreign('receiver_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->boolean('seen')->default(false);// receiver has read the message
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sender_id')->unsigned();//user_id
            $table->text('content');

            $table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->timestamps();
        });

        Schema::create('message_receiver',function(Blueprint $table){
            $table->id();
            $table->bigInteger('message_id')->unsigned();
            $table->bigInteger('receiver_id')->unsigned();

            $table->foreign('message_id')
            ->references('id')
            ->on('messages')
            ->cascadeOnDelete();

            $table->foreign('receiver_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->boolean('seen')->default(false);// receiver has read the message
        });


        Schema::create('message_replies', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('message_receiver_id')->unsigned()->nullable();//
            $table->bigInteger('original_message_id')->unsigned()->nullable();//
            $table->bigInteger('original_messagegroup_message_id')->unsigned()->nullable();//
            $table->bigInteger('sender_id')->unsigned();//

            $table->text('content');

            $table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->foreign('message_receiver_id')
            ->references('id')
            ->on('message_receiver')
            ->cascadeOnDelete();

            $table->foreign('original_message_id')
            ->references('id')
            ->on('messages')
            ->cascadeOnDelete();

            $table->foreign('original_messagegroup_message_id')
            ->references('id')
            ->on('messagegroup_messages')
            ->cascadeOnDelete();

            $table->boolean('seen')->default(false);// receiver has read the message

            $table->timestamps();
        });

        Schema::create('message_sender_contact',function(Blueprint $table){
            $table->id();
            $table->bigInteger('sender_id')->unsigned();
            $table->bigInteger('contact_id')->unsigned();

            $table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->foreign('contact_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messagegroup_member');
        Schema::dropIfExists('messagegroup_message_receiver');
        Schema::dropIfExists('messagegroups');
        Schema::dropIfExists('messagegroup_messages');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('message_receiver');
        Schema::dropIfExists('replies');
        Schema::dropIfExists('message_contact');
    }
};
