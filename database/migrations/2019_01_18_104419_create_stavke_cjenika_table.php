<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStavkeCjenikasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stavke_cjenikas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Naziv_stavke_cjenika');
            $table->double('Cijena');
            $table->string('Opis');
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
        Schema::dropIfExists('stavke_cjenikas');
    }
}