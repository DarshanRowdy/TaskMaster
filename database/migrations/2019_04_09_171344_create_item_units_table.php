<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_units', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('items_id');
            $table->foreign('items_id')
                ->references('id')->on('items')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedInteger('units_id');
            $table->foreign('units_id')
                ->references('id')->on('units')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_units');
    }
}
