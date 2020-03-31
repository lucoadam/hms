<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("accessions", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->integer("accession_number");
			$table->bigInteger("bstype_id");
			$table->string("book_source");
			$table->string("book_status");
			$table->bigInteger("book_id");
			$table->bigInteger("edition_id");
			$table->bigInteger("zone_id");
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
        Schema::drop("accessions");
    }

}