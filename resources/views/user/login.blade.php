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
            {!! Form::open(['route'=>'user.login', 'method'=> 'post']) !!}
                {!! Form::text('username', null, ['id '=> 'login',  'class' => 'fadeIn second', 'placeholder' => 'Usuário']) !!}
                {!! Form::password('password', ['id '=> 'password', 'class'=> 'fadeIn third', 'placeholder'=>'Senha']) !!}
                {!! Form::submit('Entrar', ['class' => 'fadeIn fourth']) !!}
                {{-- <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
                <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In"> --}}
            {!! Form::close() !!}

        </div>
        </div>
    </body>
</html>