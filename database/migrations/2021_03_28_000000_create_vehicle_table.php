<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('model');
            $table->text('manufacturer');
            $table->text('cost_in_credits');
            $table->text('length');
            $table->text('max_atmosphering_speed');
            $table->text('crew');
            $table->text('passengers');
            $table->text('cargo_capacity');
            $table->text('consumables');
            $table->text('vehicle_class');
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
        Schema::dropIfExists('vehicle');
    }
}
