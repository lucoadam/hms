<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("idcards", function (Blueprint $table) {
            $table->increments("id");
			$table->string("member_type");
			$table->string("institute");
			$table->string("faculty_designation");
			$table->integer("batch_joined_year");
			$table->integer("serial_number");
			$table->bigInteger("branch_id")->default(1);
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
        Schema::drop("idcards");
    }

}