<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("books", function (Blueprint $table) {
            $table->increments("id");
			$table->bigInteger("branch_id");
			$table->string("class");
			$table->bigInteger("category_id");
			$table->bigInteger("call_id");
			$table->string("title");
			$table->string("author");
			$table->bigInteger("publication_id");
			$table->timestamp("published_at");
			$table->bigInteger("bstype_id");
			$table->string("book_source");
			$table->string("isbn");
			$table->text("keywords");
			$table->text("description");
			$table->bigInteger("department_id");
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
        Schema::drop("books");
    }

}