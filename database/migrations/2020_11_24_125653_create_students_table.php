<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStudentsTable.
 */
class CreateStudentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->increments('student_id');
			$table->integer('user_id',11)->unsined();
			$table->char('cpf', 14)->unique();
			$table->date('date_birth')->nullable();
			$table->integer('registration',11);
			$table->char('uf',2);
			$table->string('city',100);
			$table->string('neighborhood',100);
			$table->string('street',100);
			$table->string('number',10);
			$table->string('complement',30)->nullable();

			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students');
	}
}