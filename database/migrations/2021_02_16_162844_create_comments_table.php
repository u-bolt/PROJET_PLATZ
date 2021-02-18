<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();

            $table->foreignId('resource_id')->nullable();
            $table->foreign('resource_id')
                  ->references('id')
                  ->on('resources')
                  ->onUpdate('set null')
                  ->onDelete('set null');

            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('set null')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
