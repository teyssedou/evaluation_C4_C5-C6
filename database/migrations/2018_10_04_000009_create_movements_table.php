<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Schema table name to migrate.
     *
     * @var string
     */
    public $set_schema_table = 'movements';

    /**
     * Run the migrations.
     *
     * @table movements
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) {
            return;
        }
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('article_id');
            $table->decimal('quantity', 8, 2);
            $table->timestamp('date_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('movement_type_id');
            $table->unsignedInteger('purchase_id')->nullable()->default(null);
            $table->unsignedInteger('sale_id')->nullable()->default(null);
            $table->timestamps();

            $table->index(['sale_id'], '');

            $table->foreign('article_id', '')
                ->references('id')->on('articles')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('movement_type_id', '')
                ->references('id')->on('movement_types')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('purchase_id', '')
                ->references('id')->on('purchases')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('sale_id', '')
                ->references('id')->on('sales')
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
