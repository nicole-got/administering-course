<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Aluno</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../https://via.placeholder.com/32x32" type="image/x-icon"/>
	
    <!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('assets/css/fonts.min.css') }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/millenium.min.css') }}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="purple">
				
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="purple2">
				
				<div class="container-fluid">
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-secondary">
                        <li class="nav-item">
							<a href="{{route('user.dashboard')}}">
								<i class="far fa-calendar-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
						{{-- <li class="nav-item">
							<a href="{{route('user.index')}}">
								<i class="far fa-calendar-alt"></i>
								<p>Usuario</p>
							</a>
						</li> --}}
						<li class="nav-item">
							<a href="{{route('student.index')}}">
								<i class="fas fa-desktop"></i>
								<p>Aluno</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="{{route('course.index')}}">
								<i class="fas fa-desktop"></i>
								<p>Curso</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Aluno</h4>
						<ul class="breadcrumbs">
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Editar aluno</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-12">
                                            {!! Form::model($student,['route'=>['student.update', $student->id], 'method'=> 'put']) !!}
                                            <div class="form-group">
                                                <label for="registration">Matrícula</label>
                                                {!! Form::text('registration', null, ['id '=> 'registration',  'class' => 'form-control', 'placeholder' => 'mátricula', 'type' => 'matricula']) !!}
                                            </div>
											<div class="form-group">
                                                <label for="name">Name</label>
                                                {!! Form::text('name', null, ['id '=> 'name',  'class' => 'form-control', 'placeholder' => 'Nome', 'required' => true]) !!}
											</div>
                                            <div class="form-group">
                                                <label for="course_id">Curso</label>
                                                {!! Form::select('course_id', $courses ?? [], null, ['id '=> 'course',  'class' => 'form-control', 'required' => true]) !!}
											</div>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-10">
                                                    <div class="form-group form-floating-label">
                                                        <label for="cep">CEP</label>
                                                        {!! Form::text('cep', null, ['wire:model' => 'cep','id '=> 'cep',  'class' => 'form-control', 'placeholder' => 'CEP', 'type' => 'cep', 'required' => true]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-lg-2">
                                                    <div class="form-group" style="margin-top: 28px !important;">
                                                        <button id="buscaCep" class="btn btn-warning">Pesquisar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="uf">UF</label>
                                                        {!! Form::text('uf', null, ['id '=> 'uf',  'class' => 'form-control', 'placeholder' => 'UF', 'type' => 'uf', 'required' => true]) !!}
                                                    </div>
                                                </div>  
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="city">Cidade</label>
                                                        {!! Form::text('city', null, ['id '=> 'city',  'class' => 'form-control', 'placeholder' => 'Cidade', 'type' => 'city', 'required' => true]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="neighborhood">Bairro</label>
                                                        {!! Form::text('neighborhood', null, ['id '=> 'neighborhood',  'class' => 'form-control', 'placeholder' => 'Bairro', 'type' => 'neighborhood', 'required' => true]) !!}
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="street">Rua</label>
                                                        {!! Form::text('street', null, ['id '=> 'street',  'class' => 'form-control', 'placeholder' => 'Rua', 'type' => 'street', 'required' => true]) !!}
                                                    </div>
                                                </div> 
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="number">Número</label>
                                                        {!! Form::text('number', null, ['id '=> 'number',  'class' => 'form-control', 'placeholder' => 'Número', 'type' => 'number', 'required' => true]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="complement">Complamento</label>
                                                        {!! Form::text('complement', null, ['id '=> 'complement',  'class' => 'form-control', 'placeholder' => 'Complemento']) !!}
                                                    </div>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<div class="card-action">
                                    {!! Form::submit('Atualizar', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
									{{-- <button class="btn btn-success">Submit</button> --}}
									<button class="btn btn-danger">Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <!-- jQuery UI -->
        <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src={{ asset('"assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
        <!-- Bootstrap Toggle -->
        <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
        <!-- jQuery Scrollbar -->
        <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <!-- Millenium JS -->
        <script src="{{ asset('assets/js/millenium.min.js') }}"></script>
        <!-- Millenium DEMO methods, don't include it in your project! -->
        <script src="{{ asset('assets/js/setting-demo2.js') }}"></script>
        <script>
            $("#buscaCep").on('click', function(){
                var numCep = $('#cep').val();
                var url = "http://serviceweb.aix.com.br/aixapi/api/cep/"+numCep;

                $.ajax({
                    url: url,
                    type: "get",
                    dataType: 'jsonp',
                    success:function(dados){
                        $("#uf").val(dados.estado);
                        $("#city").val(dados.cidade);
                        $("#neighborhood").val(dados.bairro);
                        $("#street").val(dados.logradouro);
                    }
                });
            })
            $('#displayNotif').on('click', function(){
                var placementFrom = $('#notify_placement_from option:selected').val();
                var placementAlign = $('#notify_placement_align option:selected').val();
                var state = $('#notify_state option:selected').val();
                var style = $('#notify_style option:selected').val();
                var content = {};
    
                content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
                content.title = 'Bootstrap notify';
                if (style == "withicon") {
                    content.icon = 'fa fa-bell';
                } else {
                    content.icon = 'none';
                }
                content.url = 'index.html';
                content.target = '_blank';
    
                $.notify(content,{
                    type: state,
                    placement: {
                        from: placementFrom,
                        align: placementAlign
                    },
                    time: 1000,
                });
            });
        </script>
    </body>
    </html>