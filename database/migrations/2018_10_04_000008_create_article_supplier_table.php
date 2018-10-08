<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleSupplierTable extends Migration
{
    /**
     * Schema table name to migrate.
     *
     * @var string
     */
    public $set_schema_table = 'article_supplier';

    /**
     * Run the migrations.
     *
     * @table article_supplier
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) {
            return;
        }

        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('article_id')->index();
            $table->unsignedInteger('supplier_id')->index();
            $table->decimal('purchase_price', 8, 2)->nullable()->default(null);
            $table->timestamps();

            $table->foreign('article_id', 'article_supplier_article_id')
                ->references('id')->on('articles')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('supplier_id', 'fk_article_supplier_supplier')
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
