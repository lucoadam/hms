<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("reservations", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->bigInteger("member_id");
			$table->bigInteger("edition_id");
			$table->timestamp("reservation_date")->default(now());
			$table->timestamp("for_date")->default(now());
			$table->tinyInteger("status");
			$table->longText("remarks");
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
        Schema::drop("reservations");
    }

}
