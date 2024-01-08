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
        Schema::table('timetables', function (Blueprint $table) {
            $table->foreign(['group_id'])->references(['id'])->on('groups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['teacher_id'])->references(['id'])->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timetables', function (Blueprint $table) {
            $table->dropForeign('timetables_group_id_foreign');
            $table->dropForeign('timetables_teacher_id_foreign');
        });
    }
};
