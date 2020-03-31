<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("orderdetails", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->bigInteger("department_id");
			$table->string("item_id");
			$table->string("book_title");
			$table->string("author");
			$table->string("publication");
			$table->string("isbn");
			$table->integer("edition");
			$table->integer("volume");
			$table->bigInteger("quantity");
			$table->double("cost");
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
        Schema::drop("orderdetails");
    }

}