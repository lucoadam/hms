<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("baskets", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->bigInteger("order_id");
			$table->bigInteger("supplier_id");
			$table->bigInteger("department_id");
			$table->string("book_title");
			$table->string("author");
			$table->string("publication");
			$table->string("isbn");
			$table->smallInteger("edition");
			$table->mediumInteger("volume");
			$table->mediumInteger("quantity");
			$table->double("cost");
			$table->bigInteger("suggest_id");
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
        Schema::drop("baskets");
    }

}