<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesissTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("thesiss", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->string("d_account_number");
			$table->string("writer");
			$table->string("title");
			$table->string("subject");
			$table->bigInteger("department_id");
			$table->string("university");
			$table->string("pages");
			$table->tinyInteger("year");
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
        Schema::drop("thesiss");
    }

}