<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("issues", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->bigInteger("member_id");
			$table->timestamp("due_date");
			$table->timestamp("return_date")->nullable();
			$table->double("fine_amount");
			$table->double("paid_amount");
			$table->double("remaining_amount");
			$table->bigInteger("accession_id");
			$table->bigInteger("bstype_id");
			$table->string("issue_type");
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
        Schema::drop("issues");
    }

}
