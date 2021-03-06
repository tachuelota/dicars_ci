<noscript>
	<div class="alert alert-block span10">
		<h4 class="alert-heading">Warning!</h4>
		<p>
			Necesitas tener
			<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
			habilitado para usar este sitio.
		</p>
	</div>
</noscript>

<div id="content" class="span10">
	<!-- content starts -->

	<div>
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>
			administracion/">Administración</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<?php if($this->ion_auth->in_group("admin_const")): ?>
			<a data-rel="tooltip" title="Ver, agregar y editar Constantes." class="well span3 top-block" href="<?php echo base_url();?>
				administracion/views/constantes">
				<span class="icon32 icon-color icon-bookmark"></span>
				<div>
					Administrar
					<br>Constantes</div>
			</a>
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_trab")): ?>
		<a data-rel="tooltip" title="Ver, agregar y editar Trabajadores." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/trabajadores">
			<span class="icon32 icon-color icon-users"></span>
			<div>
				Administrar
				<br>Trabajadores</div>
		</a>		
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_us")): ?>
		<a data-rel="tooltip" title="Ver, agregar y editar Usuarios." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/usuarios">
			<span class="icon32 icon-color icon-users"></span>
			<div>
				Administrar
				<br>Usuarios</div>
		</a>
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_local")): ?>
		<a data-rel="tooltip" title="Ver, agregar y editar Locales." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/locales">
			<span class="icon32 icon-color icon-home"></span>
			<div>
				Administrar
				<br>Locales</div>
		</a>		
		<?php endif ?>
	</div>
	<div class="row-fluid">
		<?php if($this->ion_auth->in_group("admin_cargo")): ?>
		<a data-rel="tooltip" title="Ver, Agregar y editar Cargos." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/cargos">
			<span class="icon32 icon-color icon-bookmark"></span>
			<div>
				Administrar
				<br>Cargos</div>
		</a>
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_categ")): ?>
		<a data-rel="tooltip" title="Ver, Agregar y editar Categorías." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/categorias">
			<span class="icon32 icon-color icon-bookmark"></span>
			<div>
				Administrar
				<br>Categorías</div>
		</a>
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_marca")): ?>
		<a data-rel="tooltip" title="Ver, Agregar y editar Marcas." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/marcas">
			<span class="icon32 icon-color icon-bookmark"></span>
			<div>
				Administrar
				<br>Marcas</div>
		</a>
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_zona")): ?>
		<a data-rel="tooltip" title="Ver, Agregar y editar Zonas." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/cons_zonas">
			<span class="icon32 icon-color icon-flag"></span>
			<div>
				Administrar
				<br>Zonas</div>
		</a>
		<?php endif ?>
	</div>
	<div class="row-fluid">
		<?php if($this->ion_auth->in_group("admin_zonpers")): ?>
		<a data-rel="tooltip" title="Ver, Agregar y editar Zona/Editar." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/zona_personal">
			<span class="icon32 icon-color icon-user"></span>
			<div>
				Zona
				<br>Personal</div>
		</a>
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_igv")): ?>
		<a data-rel="tooltip" title="Ver, Agregar y editar Tipo IGV." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/tipoIGV">
			<span class="icon32 icon-color icon-tag"></span>
			<div>
				Tipo de
				<br>IGV</div>
		</a>
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_mon")): ?>
		<a data-rel="tooltip" title="Ver, Agregar y editar Tipo Moneda." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/tipoMonedas">
			<span class="icon32 icon-color icon-tag"></span>
			<div>
				Tipo de
				<br>Moneda</div>
		</a>
		<?php endif ?>
		<?php if($this->ion_auth->in_group("admin_ofert")): ?>
		<a data-rel="tooltip" title="Ver, Agregar y editar las Ofertas." class="well span3 top-block" href="<?php echo base_url();?>
			administracion/views/ofertas">
			<span class="icon32 icon-color icon-tag"></span>
			<div>
				<br>Ofertas</div>
		</a>
		<?php endif ?>
	</div>
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->