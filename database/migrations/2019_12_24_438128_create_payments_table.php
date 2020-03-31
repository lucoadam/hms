<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("payments", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->bigInteger("purchase_id");
			$table->double("final_amount");
			$table->double("paid_amount");
			$table->double("remaining_amount");
			$table->string("receipt_number");
			$table->timestamp("receipt_date");
			$table->bigInteger("approved_by");
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
        Schema::drop("payments");
    }

}