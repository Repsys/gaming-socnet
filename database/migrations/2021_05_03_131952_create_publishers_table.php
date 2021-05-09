<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('publisher_id')->nullable()->unique();
            $table->foreign('publisher_id')
                ->references('id')->on('publishers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('accounts', ['publisher_id']);
        Schema::dropIfExists('publishers');
    }
}
