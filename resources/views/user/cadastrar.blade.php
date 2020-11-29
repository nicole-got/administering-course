<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login | Admin Cursos</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body> 
        
        <!------ Include the above in your HEAD tag ---------->

        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                <img src="../assets/images/admin.png" id="icon" alt="User Icon" />
                </div>

                <!-- Login Form -->
                {!! Form::open(['route'=>'user.store', 'method'=> 'post']) !!}
                    {!! Form::text('name', null, ['id '=> 'name',  'class' => 'fadeIn second', 'placeholder' => 'Nome']) !!}
                    {!! Form::text('email', null, ['id '=> 'email',  'class' => 'fadeIn second', 'placeholder' => 'Email']) !!}
                    {!! Form::password('password', ['id '=> 'password', 'class'=> 'fadeIn third', 'placeholder'=>'Senha']) !!}
                    {!! Form::submit('Cadastrar', ['class' => 'fadeIn fourth']) !!}
                {!! Form::close() !!}
                <a href="{{route('viewlogin')}}" >Entrar</a>
            </div>
        </div>
    </body>
</html>