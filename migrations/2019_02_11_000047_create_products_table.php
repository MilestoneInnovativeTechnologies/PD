<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 15)->nullable()->index();
            $table->string('name', 64)->nullable();
            $table->string('description', 1024)->nullable();
            $table->string('narration', 800)->nullable();
            $table->string('narration2', 800)->nullable();
            $table->string('narration3', 800)->nullable();
            $table->string('narration4', 800)->nullable();
            $table->string('narration5', 800)->nullable();
            $table->string('narration6', 800)->nullable();
            $table->string('narration7', 800)->nullable();
            $table->string('narration8', 800)->nullable();
            $table->string('narration9', 800)->nullable();
            $table->string('narration10', 800)->nullable();
            $table->string('refno', 64)->nullable();
            $table->string('refno2', 64)->nullable();
            $table->enum('itemserial', ['Yes','No'])->default('No');
            $table->enum('type', ['Public','Protected','System'])->default('Public');
            $table->unsignedInteger('group01')->nullable()->index();
            $table->unsignedInteger('group02')->nullable()->index();
            $table->unsignedInteger('group03')->nullable()->index();
            $table->unsignedInteger('group04')->nullable()->index();
            $table->unsignedInteger('group05')->nullable()->index();
            $table->unsignedInteger('group06')->nullable()->index();
            $table->unsignedInteger('group07')->nullable()->index();
            $table->unsignedInteger('group08')->nullable()->index();
            $table->unsignedInteger('group09')->nullable()->index();
            $table->unsignedInteger('group10')->nullable()->index();
            $table->enum('status', ['Active','Inactive'])->default('Active')->index();
            $table->audit();
            $table->foreign('group01')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group02')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group03')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group04')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group05')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group06')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group07')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group08')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group09')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('group10')->references('id')->on('group_details')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
