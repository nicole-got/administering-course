<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;

class DashboardController extends Controller
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function Index()
    {
        $students = \App\Entities\Student::paginate(3);
        foreach($students as $key => $student){
            $c = \App\Entities\Course::find($student->course_id);
            $students[$key]->course_id = $c->name;
        }
        $courses = \App\Entities\Course::paginate(3);

        return view('user.dashboard', [
            'students' => $students,
            'courses' => $courses,
        ]);
    }

    public function auth(Request $request)
    {

        $data = [
            'email'     => $request->get('username'),
            'password'  => $request->get('password')
        ];

        try
        {
            $user = $this->repository->findWhere($data)->first();
            if(!$user) throw new Exception("Credenciais inválidas");

            Auth::login($user);
            return redirect()->route('user.dashboard');
        }
        catch (Exception $err)
        {
            return $err->getMessage();
        }

    }
}
