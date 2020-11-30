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
									<div class="card-title">Novo aluno</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-12">
                                            {!! Form::open(['route'=>'student.store', 'method'=> 'post','enctype'=>"multipart/form-data"]) !!}
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="form-group form-show-validation row">
                                                        <label class="text-right">Upload Image <span class="required-label">*</span></label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                            <div class="input-file input-file-image">
                                                                <img class="img-upload-preview img-circle" width="100" height="100" src="https://placehold.it/100x100" alt="preview">
                                                                {!! Form::file('photo', ['name' => 'photo','id '=> 'uploadImg',  'class' => 'form-control form-control-file','accept'=>"image/*", 'required' => true]) !!}
                                                                <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Upload a Image</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="registration">Matrícula<span class="required-label">*</span></label></label>
                                                        {!! Form::text('registration', null, ['id '=> 'registration',  'class' => 'form-control', 'placeholder' => 'mátricula', 'type' => 'matricula']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name">Name<span class="required-label">*</span></label></label>
                                                        {!! Form::text('name', null, ['id '=> 'name',  'class' => 'form-control', 'placeholder' => 'Nome', 'required' => true]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="course_id">Curso<span class="required-label">*</span></label></label>
                                                {!! Form::select('course_id', $courses ?? [], null, ['id '=> 'course',  'class' => 'form-control', 'required' => true]) !!}
											</div>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-10">
                                                    <div class="form-group form-floating-label">
                                                        <label for="cep">CEP<span class="required-label">*</span></label></label>
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
                                                        <label for="uf">UF<span class="required-label">*</span></label></label>
                                                        {!! Form::text('uf', null, ['id '=> 'uf',  'class' => 'form-control', 'placeholder' => 'UF', 'type' => 'uf', 'required' => true]) !!}
                                                    </div>
                                                </div>  
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="city">Cidade<span class="required-label">*</span></label></label>
                                                        {!! Form::text('city', null, ['id '=> 'city',  'class' => 'form-control', 'placeholder' => 'Cidade', 'type' => 'city', 'required' => true]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="neighborhood">Bairro<span class="required-label">*</span></label></label>
                                                        {!! Form::text('neighborhood', null, ['id '=> 'neighborhood',  'class' => 'form-control', 'placeholder' => 'Bairro', 'type' => 'neighborhood', 'required' => true]) !!}
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="street">Rua<span class="required-label">*</span></label></label>
                                                        {!! Form::text('street', null, ['id '=> 'street',  'class' => 'form-control', 'placeholder' => 'Rua', 'type' => 'street', 'required' => true]) !!}
                                                    </div>
                                                </div> 
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group form-floating-label">
                                                        <label for="number">Número<span class="required-label">*</span></label></label>
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
                                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
								</div>
							</div>
                        </div>
                        <div class="col-md-12">
                            
							<div class="card">
								<div class="card-header">
									<div class="card-title">Alunos</div>
								</div>
								<div class="card-body">
									@if($students == "[]" || '')
										<div class="text-center">Não há alunos cadastrados</div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                {!! Form::open( ['route' => ['student.search'], 'method' => 'post']) !!}
                                                    {!! Form::text('id', null, ['id '=> 'id',  'class' => ' form-control-sm', 'type' => 'search', 'placeholder' => 'ID Aluno']) !!}
                                                    {!! Form::submit('Pesquisar', ['class'=> 'btn btn-primary btn-round ml-auto']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <br>
										<table class="table table-head-bg-danger">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">Foto</th>
													<th scope="col">Curso</th>
													<th scope="col">Nome</th>
													<th scope="col">Matrícula</th>
													<th scope="col">UF</th>
													<th scope="col">Cidade</th>
													<th scope="col">Bairro</th>
													<th scope="col">Rua</th>
													<th scope="col">Numero</th>
													<th scope="col">Complemento</th>
													<th scope="col">Status</th>
													<th scope="col">Ação</th>
												</tr>
											</thead>
											<tbody>
												@foreach($students as $student)
													<tr>
                                                        <td>{{$student->id}}</td>
                                                        <td>
                                                            <div class="notif-img"> 
                                                                <img  src="{{ asset('/storage/img/'.$student->photo.'') }}" alt="Img Profile" style="max-width: 80px;max-height: 100px;">
                                                                {{-- <img src="https://via.placeholder.com/50x50" alt="Img Profile"> --}}
                                                            </div>
                                                        </td>
														<td>{{$student->course_id}}</td>
														<td>{{$student->name}}</td>
														<td>{{$student->registration}}</td>
														<td>{{$student->uf}}</td>
														<td>{{$student->city}}</td>
														<td>{{$student->neighborhood}}</td>
														<td>{{$student->street}}</td>
														<td>{{$student->number}}</td>
														<td>{{$student->complement}}</td>
														<td>{{$student->status}}</td>
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
				</div>
			</div>
		</div>
            <!-- Custom template | don't include it in your project! -->
            <div class="custom-template">
                <div class="title">Settings</div>
                <div class="custom-content">
                    <div class="switcher">
                        <div class="switch-block">
                            <h4>Logo Header</h4>
                            <div class="btnSwitch">
                                <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                                <button type="button" class="selected changeLogoHeaderColor" data-color="purple"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                                <br/>
                                <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                            </div>
                        </div>
                        <div class="switch-block">
                            <h4>Navbar Header</h4>
                            <div class="btnSwitch">
                                <button type="button" class="changeTopBarColor" data-color="dark"></button>
                                <button type="button" class="changeTopBarColor" data-color="blue"></button>
                                <button type="button" class="changeTopBarColor" data-color="purple"></button>
                                <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                                <button type="button" class="changeTopBarColor" data-color="green"></button>
                                <button type="button" class="changeTopBarColor" data-color="orange"></button>
                                <button type="button" class="changeTopBarColor" data-color="red"></button>
                                <button type="button" class="changeTopBarColor" data-color="white"></button>
                                <br/>
                                <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                                <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                                <button type="button" class="selected changeTopBarColor" data-color="purple2"></button>
                                <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                                <button type="button" class="changeTopBarColor" data-color="green2"></button>
                                <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                                <button type="button" class="changeTopBarColor" data-color="red2"></button>
                            </div>
                        </div>
                        <div class="switch-block">
                            <h4>Sidebar</h4>
                            <div class="btnSwitch">
                                <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                                <button type="button" class="changeSideBarColor" data-color="dark"></button>
                                <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                            </div>
                        </div>
                        <div class="switch-block">
                            <h4>Background</h4>
                            <div class="btnSwitch">
                                <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                                <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                                <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                                <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Custom template -->
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
            var element = document.getElementsByTagName("svg");
            element[0].removeAttribute("viewBox");
            element[1].removeAttribute("viewBox");
        </script>
        <script>
            $("#buscaCep").on('click', function(){
                console.log("entrou")
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