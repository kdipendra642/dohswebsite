<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassToMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(config('menu.table_prefix').config('menu.table_name_menus'), function (Blueprint $table) {
            $table->string('class')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('menu.table_prefix').config('menu.table_name_menus'), function ($table) {
            $table->dropColumn('class');
        });
    }
}
