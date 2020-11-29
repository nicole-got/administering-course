<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Student;
use App\Entities\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>  "nicole",
            'email'     =>  "nicole2@nicole.com",
            'password'  =>  "123456",
        ]);
        Student::create([
            'course_id'     =>  1,
            'name'          =>  "aluno1",
            'registration'  =>  "123555",
            'uf'            =>  "mg",
            'city'          =>  "belo horizonte",
            'cep'           =>  "36554214",
            'neighborhood'  =>  "jardim certo",
            'street'        =>  "rua B",
            'number'        =>  "251",
            'complement'    =>  "casa",
        ]);
        Course::create([
            'name'          =>  "administracao",
        ]);
    }
}
