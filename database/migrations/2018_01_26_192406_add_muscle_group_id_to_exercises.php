<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMuscleGroupIdToExercises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->unsignedInteger('muscle_group_id')->nullable()->after('description');
            $table->foreign('muscle_group_id')->references('id')->on('muscle_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropForeign(['muscle_group_id']);
            $table->dropColumn('muscle_group_id');
        });
    }
}