<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_master', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 15)->nullable()->index();
            $table->string('name', 64)->index();
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
        Schema::dropIfExists('group_master');
    }
}
