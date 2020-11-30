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
			$table->increments('id');
			$table->integer('course_id')->unsined();
			$table->string('name', 50);
			$table->string('photo')->nullable();
			$table->integer('registration');
			$table->char('uf',2);
			$table->string('city',100);
			$table->string('cep',8);
			$table->string('neighborhood',100);
			$table->string('street',100);
			$table->string('number',10);
			$table->string('complement',30)->nullable();
			$table->set('status', ['ativo','inativo'])->default('ativo')->nullable();

			$table->timestamps();
			$table->softDeletes();
			
			$table->foreign('course_id')->references('id')->on('courses');
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
