
<?php
include ('menu.php');
 ?>
	<!--/.sidebar-->
  <!--/.----------------------------------------------------------------------------------------->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Inicio</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
      <br>
		</div>
		<!--/.row-->
<!--/ crear metodos para mostrar estadisticas de digitacion en los diferentes examenes de seguimiento-->
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
						<?php
							include ('../entidades/extras.php');
							$extra = Contador::vacio();
							$cantidad = $extra->contadorMamografia();
							if ($fila=mysqli_fetch_array($cantidad)){?>

							<div class="large"><?php echo $fila['cantidad']?></div>
							<?php }?>
							<div class="text-muted">Mamografía Bilateral</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-orange"></em>
							<div class="large">20</div>
							<div class="text-muted">ECM Anormal</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">24</div>
							<div class="text-muted">BAFF</div>
						</div>
					</div>
				</div>
				<?php
					//include ('../entidades/extras.php');
				//	$extra = Contador::vacio();
					$cantidad = $extra->contadorPapIvaa();
					while ($fila=mysqli_fetch_array($cantidad)){

				?>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large"><?php echo $fila['cantidad']?></div>
							<div class="text-muted">IVAA Anormal</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
						 <?php if($fila=mysqli_fetch_array($cantidad)){?>
							<div class="large"><?php echo $fila['cantidad']?></div>
						 <?php }?>
							<div class="text-muted">PAP</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
						<?php if($fila=mysqli_fetch_array($cantidad)){?>
							<div class="large"><?php echo $fila['cantidad']?></div>
						 <?php }?>
							<div class="text-muted">VPH</div>
						</div>
					</div>
				</div>
						<?php }?>

			</div>
<!--/ crear metodos para mostrar estadisticas de digitacion en los diferentes examenes de seguimiento-->
<!--/ .Row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Estadisticas
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
									<em class="fa fa-cogs"></em>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
													<em class="fa fa-cog"></em>
												</a></li>
											<li class="divider"></li>
											<li><a href="#">
													<em class="fa fa-cog"></em>
												</a></li>
											<li class="divider"></li>
											<li><a href="#">
													<em class="fa fa-cog"></em>
												</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->

	</div>

<?php require_once "scriptsjs.php"; ?>

</body>
</html>
