<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('classification')->nullable();
            $table->text('designation')->nullable();
            $table->text('average_height')->nullable();
            $table->text('skin_colors')->nullable();
            $table->text('hair_colors')->nullable();
            $table->text('eye_colors')->nullable();
            $table->text('average_lifespan')->nullable();
            $table->text('language')->nullable();
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
        Schema::dropIfExists('species');
    }
}
