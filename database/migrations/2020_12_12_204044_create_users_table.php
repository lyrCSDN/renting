<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            //角色
            $table->unsignedInteger('role_id')->default(0)->comment('角色ID');
            $table->string('username',250)->comment('账号');
            $table->string('truename',100)->default('未知')->comment('真实姓名');
            $table->string('password',255)->comment('密码');
            $table->string('phone',90)->comment('电话');
            $table->string('email',150)->nullable()->comment('邮箱');
            $table->enum('gender',['先生','女士'])->default('先生')->comment('性别');
            $table->char('last_ip',15)->default('')->comment('登录IP');

            $table->softDeletes();

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
        Schema::dropIfExists('users');
    }
}
