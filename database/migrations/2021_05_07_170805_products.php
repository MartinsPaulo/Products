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
            $table->string('category', 100);
            $table->float('price');
            $table->integer('quantity');
            $table->date('expiration')->nullable(); 
            $table->text('comments')->nullable(); 
			$table->string('imgPath')->nullable();
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
