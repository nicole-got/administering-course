<?php

namespace App\Services;

use Illuminate\Database\QueryExceprion;
use Exceprion;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class UserService
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    {
        
        try
        {
            // var_dump("Service",$data);
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $usuario = $this->repository->create($data);
            return 
            [
                'success'   => true,
                'messages'   => 'Usuário criado',
                'data'      => $usuario
            ];
        }
        catch(Exception $err)
        {
            switch(get_class($err))
            {
                case QueryExceprion::class      : return ['success'   => false, 'messages' => $err->getMessage()];
                case ValidatorException::class  : return ['success'   => false, 'messages' => $err->getMessageBag()];
                case Exception::class           : return ['success'   => false, 'messages' => $err->getMessage()];
                default                         : return ['success'   => false, 'messages' => $err->getMessage()];
            }
        }
    }

    public function update()
    {
        
    }

    public function destroy($id)
    {
        
        try
        {
            $this->repository->delete($id);
            return  [
                'success'   => true,
                'messages'   => 'Usuário removido'
            ];
        }
        catch(Exception $err)
        {
            switch(get_class($err))
            {
                case QueryExceprion::class      : return ['success'   => false, 'messages' => $err->getMessage()];
                case ValidatorException::class  : return ['success'   => false, 'messages' => $err->getMessageBag()];
                case Exception::class           : return ['success'   => false, 'messages' => $err->getMessage()];
                default                         : return ['success'   => false, 'messages' => $err->getMessage()];
            }
        }
    }
}