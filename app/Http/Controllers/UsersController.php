<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\UserService;

class UsersController extends Controller
{
    protected $service;
    protected $repository;

    protected $validator;

    public function __construct(UserService $service, UserValidator $validator,UserRepository $repository)
    {
        $this->repository   = $repository;
        $this->service      = $service;
    }

    public function index()
    {
        return view('user.index');
    }

    public function cadastrar()
    {
        return view('user.cadastrar');
    }

    public function store(UserCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $users = $request['success'] ? $request['data'] : null;

        session()->flush('success', [
            'success'   => '',
            'messages'  => $request['messages']
        ]);
        
        return redirect()->route('user.dashboard');
    }

    public function show($id)
    {
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);
        return view('user.edit', [
            "user" => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $request = $this->service->update($request->all(), $id);
        $users = $request['success'] ? $request['data'] : null;

        session()->flush('success', [
            'success'   => '',
            'messages'  => $request['messages']
        ]);

        return redirect()->route('user.dashboard');
    }


    public function destroy($id)
    {
        $request = $this->service->destroy($id);

        session()->flush('success', [
            'success'   => '',
            'messages'  => $request['messages']
        ]);
        return redirect()->route('user.dashboard');
    }
}
