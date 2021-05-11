<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function(Blueprint $table)
		{
			$table->id();
			$table->string('name', 100);
            $table->bigInteger('id_category')->unsigned();
            $table->float('price');
            $table->integer('quantity');            
            $table->date('expiration')->nullable(); 
            $table->text('comments')->nullable(); 
			$table->string('imgPath')->nullable();
			$table->timestamps();
		});

        Schema::table('Products', function($table) {
            $table->foreign('id_category', 'fk_id')->references('id')->on('categories')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Products');
    }
}
