<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("editions", function (Blueprint $table) {
            $table->increments("id");
			$table->string("edition");
			$table->integer("pages");
			$table->string("volume");
			$table->timestamp("published_at");
			$table->boolean("cd");
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
        Schema::drop("editions");
    }

}