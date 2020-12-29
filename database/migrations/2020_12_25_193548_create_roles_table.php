<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *角色表
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
           $table->string('name','20')->comment('角色名称');
            $table->bigIncrements('id');
            $table->timestamps();
            //软删除
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
