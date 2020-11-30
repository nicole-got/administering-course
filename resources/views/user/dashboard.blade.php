<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dash</title>
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
	<link rel="stylesheet" href="{{ asset('assets/css/millenium.css') }}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
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
							<a href="{{route('user.dashboard')}}" onclick="button()">
								<i class="far fa-calendar-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
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
						<h4 class="page-title">Dados</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
						</ul>
					</div>
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Alunos</div>
								</div>
								<div class="card-body">
									@if($students == "[]")
										<div class="text-center">Não há alunos cadastrados</div>
									@else
										{!! Form::open( ['route' => ['student.search'], 'method' => 'post']) !!}
												{!! Form::text('id', null, ['id '=> 'id',  'class' => 'form-control form-control-sm', 'type' => 'search', 'placeholder' => 'ID Aluno']) !!}
													{!! Form::submit('Pesquisar', ['class'=> 'btn btn-primary btn-round ml-auto']) !!}
										{!! Form::close() !!}
										<table class="table table-head-bg-danger">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">Curso</th>
													<th scope="col">Nome</th>
													<th scope="col">Matrícula</th>
													<th scope="col">UF</th>
													<th scope="col">Cidade</th>
													<th scope="col">Bairro</th>
													<th scope="col">Rua</th>
													<th scope="col">Numero</th>
													<th scope="col">Complemento</th>
													<th scope="col">Ação</th>
												</tr>
											</thead>
											<tbody>
												@foreach($students as $student)
													<tr>
														<td>{{$student->id}}</td>
														<td>{{$student->course_id}}</td>
														<td>{{$student->name}}</td>
														<td>{{$student->registration}}</td>
														<td>{{$student->uf}}</td>
														<td>{{$student->city}}</td>
														<td>{{$student->neighborhood}}</td>
														<td>{{$student->street}}</td>
														<td>{{$student->number}}</td>
														<td>{{$student->complement}}</td>
														<td>
															{!! Form::open( ['route' => ['student.destroy', $student->id ], 'method' => 'delete']) !!}
																{!! Form::submit('Remover') !!}
															{!! Form::close() !!}
														<a href="{{ route('student.edit', $student->id) }}">Editar</a>
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
										{!! $students->links() !!}
									@endif
								</div>
							</div>
						</div>
                    </div>
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Cursos</div>
								</div>
								<div class="card-body">
									@if($courses == "[]")
										<div class="text-center">Não há cursos cadastrados</div>
									@else
										<table class="table table-head-bg-success">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">Nome</th>
													<th scope="col">Ação</th>
												</tr>
											</thead>
											<tbody>
												@foreach($courses as $course)
													<tr>
														<td>{{$course->id}}</td>
														<td>{{$course->name}}</td>
														<td>
															{!! Form::open( ['route' => ['course.destroy', $course->id ], 'method' => 'delete']) !!}
																{!! Form::submit('Remover') !!}
															{!! Form::close() !!}
														<a href="{{ route('course.edit', $course->id) }}">Editar</a>
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
										{!! $courses->links() !!}
									@endif
								</div>
							</div>
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
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
		var element = document.getElementsByTagName("svg");
		element[0].removeAttribute("viewBox");
		element[1].removeAttribute("viewBox");
		element[2].removeAttribute("viewBox");
		element[3].removeAttribute("viewBox");
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