<?php

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
        Schema::table('student_groups', function (Blueprint $table) {
            $table->foreign(['group_id'])->references(['id'])->on('groups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['student_id'], 'student_groups_student_id')->references(['id'])->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_groups', function (Blueprint $table) {
            $table->dropForeign('student_groups_group_id_foreign');
            $table->dropForeign('student_groups_student_id');
        });
    }
};
