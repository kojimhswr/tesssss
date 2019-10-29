<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPackageAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_attributes', function (Blueprint $table) {

            $table->unsignedBigInteger('attribute_id')->after('id');
            $table->foreign('attribute_id')->references('id')->on('attributes');

            $table->string('value')->after('attribute_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('package_attributes', function (Blueprint $table) {
            $table->dropColumn('value');
        });
    }
}
