<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Schema table name to migrate.
     *
     * @var string
     */
    public $set_schema_table = 'articles';

    /**
     * Run the migrations.
     *
     * @table articles
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) {
            return;
        }
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 50);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('unit_id');
            $table->decimal('sales_price', 6, 2);
            $table->timestamps();

            $table->index(['unit_id'], '');

            $table->unique(['name'], '');

            $table->foreign('category_id', '')
                ->references('id')->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('unit_id', '')
                ->references('id')->on('units')
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
