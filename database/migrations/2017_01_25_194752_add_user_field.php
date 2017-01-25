<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserField extends Migration {
	protected $table = 'users';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table($this->table, function(Blueprint $table) {
			$table->integer('subscribe')->default(0)->comment('');
			$table->string('openid')->default('')->comment('');
			$table->string('nickname')->default('')->comment('用户姓名');
			$table->tinyInteger('sex')->default(0)->comment('');
			$table->string('language', 16)->default('')->comment('');
			$table->string('city')->default('')->comment('');
			$table->string('province')->default('')->comment('');
			$table->string('country')->default('')->comment('');
			$table->string('headimgurl')->default('')->comment('用户头像');
			$table->integer('subscribe_time')->default(0)->comment('');
			$table->string('register_from', 16)->default('')->comment('注册来源:weixin,android,ios,web等');
			$table->timestamp('register_at')->nullable()->comment('注册时间');
			$table->string('register_ip', 16)->nullable()->comment('注册IP');
			$table->timestamp('last_login_at')->nullable()->comment('最后登录时间');
			$table->string('last_login_ip', 16)->nullable()->comment('最后登录IP');
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
