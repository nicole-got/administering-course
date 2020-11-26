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
        return view('user.dashboard');
    }

    public function auth(Request $request)
    {

        $data = [
            'email'     => $request->get('username'),
            'password'  => $request->get('password')
        ];

        try
        {
            if(env('PASSWORD_HASH'))
            {
                Auth::attempt($data, false);
            }
            else
            {
                $user = $this->repository->findWhere($data)->first();
                if(!$user) throw new Exception("Credenciais inválidas");
                // $user = $this->repository->findWhere(['email' => $request->get('username')])->first();
                // var_dump($user);
                // dd($user->password);
                // if(!$user) throw new Exception("Email inválido");
                // dd($user->password);
                // if($user->attributes->password != $request->get('password')) throw new Exception("Senha inválida");

                Auth::login($user);
            }
            return redirect()->route('user.dashboard');
        }
        catch (Exception $err)
        {
            return $err->getMessage();
        }

        // dd($request->all());
    }
}
