<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Schema table name to migrate.
     *
     * @var string
     */
    public $set_schema_table = 'sales';

    /**
     * Run the migrations.
     *
     * @table sales
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) {
            return;
        }

        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('sale_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->index(['sale_date'], '');
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
