<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("members", function (Blueprint $table) {
            $table->increments("id");
			$table->string("library_id");
			$table->string("first_name");
			$table->string("middle_name");
			$table->string("last_name");
			$table->timestamp("date_of_birth");
			$table->boolean("gender");
			$table->string("street")->default("");
			$table->string("city");
			$table->string("country");
			$table->bigInteger("phone_number");
			$table->string("email");
			$table->timestamp("valid_from")->default(now());
			$table->timestamp("valid_till")->default(now()->addYears(4));
			$table->string("photo");
			$table->boolean("status")->default(1);
			$table->bigInteger('branch_id')->default(0);
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
        Schema::drop("members");
    }

}