<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("suppliers", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->string("name");
			$table->string("street");
			$table->string("city");
			$table->string("country");
			$table->string("phone");
			$table->string("fax");
			$table->string("email");
			$table->string("contact_name");
			$table->string("contact_designation");
			$table->string("contact_phone");
			$table->string("contact_mobile");
			$table->string("contact_email");
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
        Schema::drop("suppliers");
    }

}