<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planet', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('rotation_period');
            $table->text('orbital_period');
            $table->text('diameter');
            $table->text('climate');
            $table->text('gravity');
            $table->text('terrain');
            $table->text('surface_water');
            $table->text('population');
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
        Schema::dropIfExists('planet');
    }
}
