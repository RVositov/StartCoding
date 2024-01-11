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
        Schema::create('timetables', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('group_id')->index('timetables_group_id_foreign');
            $table->integer('teacher_id')->index('timetables_teacher_id_foreign');
            $table->integer('classroom_id')->nullable()->index('timetables_classroom_id_foreign');
            $table->integer('day');
            $table->time('lesson_time')->nullable();
            $table->enum('shift', ['1', '2'])->nullable();
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
};
