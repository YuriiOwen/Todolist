<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskListUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks_list', function (Blueprint $table) {
            $table->dropForeign('tasks_list_user_id_foreign');
            $table->dropForeign('tasks_list_list_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('list_id')->references('id')->on('to_do_lists')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks_list', function (Blueprint $table) {
            //
        });
    }
}
