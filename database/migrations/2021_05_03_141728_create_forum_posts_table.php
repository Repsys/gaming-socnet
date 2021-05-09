<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('index');
            $table->string('title', 100);
            $table->text('text');
            $table->timestamps();

            $table->unsignedBigInteger('forum_topic_id');
            $table->foreign('forum_topic_id')
                ->references('id')->on('forum_topics')
                ->onDelete('cascade');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')
                ->references('id')->on('accounts')
                ->onDelete('set null');

            $table->unsignedBigInteger('reply_to')->nullable();
            $table->foreign('reply_to')
                ->references('id')->on('forum_posts')
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
        Schema::dropIfExists('forum_posts');
    }
}
