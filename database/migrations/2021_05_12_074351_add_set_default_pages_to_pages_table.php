<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSetDefaultPagesToPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('is_cybersec_one')->nullable()->after('id');
            $table->boolean('is_cybersec_two')->nullable()->after('is_cybersec_one');
            $table->boolean('has_laboratory')->nullable()->after('is_cybersec_two');
            $table->text('server')->nullable()->after('has_laboratory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            //
        });
    }
}
