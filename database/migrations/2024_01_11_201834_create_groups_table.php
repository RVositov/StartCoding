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
        Schema::create('groups', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('course_id')->nullable()->index('groups_course_id_foreign');
            $table->integer('status_id')->nullable()->index('groups_status_id');
            $table->string('name', 255);
            $table->decimal('price', 10);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('shift', ['1', '2'])->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
