<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('region_id')->unsigned()->index();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->Biginteger('package_id')->unsigned()->index();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_regions');
    }
}
