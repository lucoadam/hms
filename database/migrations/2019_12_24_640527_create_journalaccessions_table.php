<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalaccessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("journalaccessions", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->integer("accession_number");
			$table->bigInteger("journal_id");
			$table->bigInteger("journaldetail_id");
			$table->string("status");
			$table->bigInteger("location_id");
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
        Schema::drop("journalaccessions");
    }

}