<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournaldetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("journaldetails", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->bigInteger("journal_id");
			$table->smallInteger("issue_number");
			$table->smallInteger("volume");
			$table->smallInteger("year");
			$table->smallInteger("month");
			$table->smallInteger("pages");
			$table->double("cost");
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
        Schema::drop("journaldetails");
    }

}