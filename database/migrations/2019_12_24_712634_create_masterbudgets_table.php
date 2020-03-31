<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterbudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("masterbudgets", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->timestamp("start_fiscal_date")->default(now());
			$table->timestamp("end_fiscal_date")->default(now()->addYear());
			$table->bigInteger("budget_id");
			$table->double("total_budget");
			$table->string("comments");
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
        Schema::drop("masterbudgets");
    }

}
