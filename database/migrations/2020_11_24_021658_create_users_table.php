<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->bigIncrements('user_id');
			$table->string('name', 60);
			$table->string('email', 100)->unique();
			$table->string('password', 254);
			$table->string('phone', 15);
			$table->set('genero', ['feminino', 'masculino','outros'])->nullable();
			$table->set('status',[1,0])->default(1);

			$table->timestamps();
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
		Schema::drop('users');
	}
}
