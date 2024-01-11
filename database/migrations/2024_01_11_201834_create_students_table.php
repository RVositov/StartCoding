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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('city_id')->index('students_city_id_foreign');
            $table->integer('school_id')->index('students_school_id_foreign');
            $table->string('name', 45);
            $table->string('surname', 45);
            $table->string('phone', 13);
            $table->decimal('discount', 10)->nullable()->comment('скидка');
            $table->date('birthday')->nullable();
            $table->integer('class')->nullable();
            $table->string('address', 100)->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('students');
    }
};
