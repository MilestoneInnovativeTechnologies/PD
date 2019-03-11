<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno', 64)->nullable()->index();
            $table->unsignedInteger('group')->nullable()->index();
            $table->char('code', 15)->nullable()->index();
            $table->string('name', 64)->index();
            $table->enum('list', ['Yes','No'])->default('Yes');
            $table->enum('type', ['Public','Private'])->default('Public')->index();
            $table->enum('status', ['Active','Inactive'])->default('Active')->index();
            $table->audit();
            $table->foreign('group')->references('id')->on('group_master')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_details');
    }
}
