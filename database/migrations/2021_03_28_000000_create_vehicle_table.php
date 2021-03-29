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
            $table->string('name')->nullable();
            $table->text('model')->nullable();
            $table->text('manufacturer')->nullable();
            $table->text('cost_in_credits')->nullable();
            $table->text('length')->nullable();
            $table->text('max_atmosphering_speed')->nullable();
            $table->text('crew')->nullable();
            $table->text('passengers')->nullable();
            $table->text('cargo_capacity')->nullable();
            $table->text('consumables')->nullable();
            $table->text('vehicle_class')->nullable();
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
