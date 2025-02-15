<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsWpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable(config('menu.table_prefix').config('menu.table_name_items'))) {
            Schema::create(config('menu.table_prefix').config('menu.table_name_items'), function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('label');
                $table->string('link');
                $table->string('icon')->nullable();
                $table->unsignedBigInteger('parent')->default(0);
                $table->integer('sort')->default(0);
                $table->string('class')->nullable();
                $table->enum('target', ['_self', '_blank'])->default('_self');
                $table->unsignedBigInteger('menu');
                $table->integer('depth')->default(0);
                $table->timestamps();

                $table->foreign('menu')->references('id')->on(config('menu.table_prefix').config('menu.table_name_menus'))
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('menu.table_prefix').config('menu.table_name_items'));
    }
}
