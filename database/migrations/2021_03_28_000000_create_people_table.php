<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('height')->nullable();
            $table->text('mass')->nullable();
            $table->text('hair_color')->nullable();
            $table->text('skin_color')->nullable();
            $table->text('eye_color')->nullable();
            $table->text('birth_year')->nullable();
            $table->text('gender')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
