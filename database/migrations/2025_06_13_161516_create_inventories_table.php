<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // inventories migration
    Schema::create('inventories', function (Blueprint $table) {
        $table->id('inventory_id'); // primary key diubah
        $table->string('name');
        $table->string('code');
        $table->integer('total');
        $table->string('status');
        $table->timestamps();
    });

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
