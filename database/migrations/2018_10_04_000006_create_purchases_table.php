<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Schema table name to migrate.
     *
     * @var string
     */
    public $set_schema_table = 'purchases';

    /**
     * Run the migrations.
     *
     * @table purchases
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) {
            return;
        }

        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('supplier_id');
            $table->timestamp('order_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->index(['supplier_id'], '');

            $table->foreign('supplier_id', '')
                ->references('id')->on('suppliers')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
