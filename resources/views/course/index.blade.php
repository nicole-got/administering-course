<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Curso</title>
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
						<h4 class="page-title">Curso</h4>
						<ul class="breadcrumbs">
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Novo Curso - Manual</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-12">
                                            {!! Form::open(['route'=>'course.store', 'method'=> 'post']) !!}
											<div class="form-group">
                                                <label for="name">Nome</label>
                                                {!! Form::text('name', null, ['id '=> 'name',  'class' => 'form-control', 'placeholder' => 'Curso','required' => true]) !!}
                                            </div>
										</div>
									</div>
								</div>
								<div class="card-action">
                                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
									<button class="btn btn-danger">Cancel</button>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Novo Curso - Arquivo XML</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-12">
                                            {!! Form::open(['route'=>'course.store', 'method'=> 'post', 'enctype'=>"multipart/form-data"]) !!}
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Arquivo</label>
                                                {!! Form::file('curso_xml', ['name' => 'curso_xml','id '=> 'exampleFormControlFile1',  'class' => 'form-control-file', 'required' => true]) !!}
											</div>
										</div>
									</div>
								</div>
								<div class="card-action">
                                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
									<button class="btn btn-danger">Cancel</button>
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