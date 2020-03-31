<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("journals", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->string("title");
			$table->string("subtitle");
			$table->string("author");
			$table->bigInteger("frequency_id");
			$table->integer("quantity");
			$table->integer("volume");
			$table->timestamp("start_date");
			$table->timestamp("end_date")->default(now());
			$table->bigInteger("bstype_id");
			$table->bigInteger("publication_id");
			$table->bigInteger("journaltype_id");
			$table->text("keywords");
			$table->text("description");
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
        Schema::drop("journals");
    }

}
