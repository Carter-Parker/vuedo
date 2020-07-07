<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PopulateTaskCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('task_categories')->insert([
            array('name' => 'Requirements'),
            array('name' => 'Design'),
            array('name' => 'Development'),
            array('name' => 'Testing'),
            array('name' => 'Complete'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_categories', function (Blueprint $table) {
            DB::table('task_categories')->truncate();
        });
    }
}
