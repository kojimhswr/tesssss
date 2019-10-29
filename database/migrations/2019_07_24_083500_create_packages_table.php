<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ship_id')->index();
            $table->string('duration')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('name');
            $table->text('included')->nullable();
            $table->text('not_included')->nullable();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('featured')->default(0);

            $table->foreign('ship_id')->references('id')->on('ships')->onDelete('cascade');

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
        Schema::dropIfExists('packages');
    }
}
