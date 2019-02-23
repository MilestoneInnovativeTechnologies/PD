<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_name', 64)->nullable();
            $table->string('display_name', 128)->nullable();
            $table->unsignedTinyInteger('order')->default(1);
            $table->unsignedTinyInteger('priority')->default(1);
            $table->enum('type', ['Public','Private'])->default('Public')->index();
            $table->enum('status', ['Active','Inactive'])->default('Active')->index();
            $table->audit();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_fields');
    }
}
