<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("fines", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->smallInteger("max_days");
			$table->double("fine_amount");
			$table->bigInteger("membertype_id");
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
        Schema::drop("fines");
    }

}