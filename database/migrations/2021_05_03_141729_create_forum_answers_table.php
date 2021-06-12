<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_answers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('text');
            $table->string('image', 200)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('forum_topic_id');
            $table->foreign('forum_topic_id')
                ->references('id')->on('forum_topics')
                ->onDelete('cascade');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')
                ->references('id')->on('accounts')
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
        Schema::dropIfExists('forum_answers');
    }
}
