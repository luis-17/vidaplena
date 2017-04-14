<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-page">
  <div class="margin-page regular">
  	<?php if( !($eje) ){ ?>
		<div class="row">
		    <div class="col-md-12">
		      <h2 class="text-vp" style="padding: 30px 0px 40px;"> 
		        <span style="text-transform: uppercase;"> Escoge una de nuestras pruebas </span> 
		        <small style="padding-top: 15px;" class="full-block"> Queremos brindarte la mejor opción para que logres tus objetivos y mejorar tu calidad de vida. </small>
		      </h2> 
		    </div>
		    <div class="col-md-3 col-sm-6 col-xs-12">
		    	<div class="panel-blue">
		    		<h3 style="padding-bottom: 16px;"> NUTRICIÓN </h3> 
		    		<p> - Conoce tu índice de masa muscular. </p>
		    		<p> - Descubre tu % de grasa en el cuerpo. </p>
		    		<p> - Recibe una dieta personalizada en tu casa u oficina. </p> 
		    		<a href="<?php echo site_url('extranet/pruebas/nutricion'); ?>" class="btn btn-pink" type="button"> 
		    			EMPEZAR 
		    		</a>
		    	</div>
		    </div>
		    <div class="col-md-3 col-sm-6 col-xs-12">
		    	<div class="panel-blue">
		    		<h3 style="padding-bottom: 16px;"> HÁBITOS </h3>
		    		<p> - Conoce tu índice de masa muscular. </p>
		    		<p> - Descubre tu % de grasa en el cuerpo. </p>
		    		<p> - Recibe una dieta personalizada en tu casa u oficina. </p> 
		    		<button class="btn btn-pink" type="button">
		    			EMPEZAR 
		    		</button>
		    	</div>
		    </div>
		    <div class="col-md-3 col-sm-6 col-xs-12">
		    	<div class="panel-blue">
		    		<h3 style="padding-bottom: 16px;"> PSICOLOGÍA </h3>
		    		<p> - Conoce tu índice de masa muscular. </p>
		    		<p> - Descubre tu % de grasa en el cuerpo. </p>
		    		<p> - Recibe una dieta personalizada en tu casa u oficina. </p>
		    		<button class="btn btn-default" type="button" disabled> 
		    			MUY PRONTO  
		    		</button>
		    	</div>
		    </div>
		    <div class="col-md-3 col-sm-6 col-xs-12">
		    	<div class="panel-blue">
		    		<h3 style="padding-bottom: 16px;"> ACTIVIDAD FÍSICA </h3>
		    		<p> - Conoce tu índice de masa muscular. </p>
		    		<p> - Descubre tu % de grasa en el cuerpo. </p>
		    		<p> - Recibe una dieta personalizada en tu casa u oficina. </p>
		    		<button class="btn btn-default" type="button" disabled>
		    			MUY PRONTO  
		    		</button>
		    	</div>
		    </div>
		</div>
		<?php }else{ ?>
		<div class="row">
	    <div class="col-md-12">
	      <h2 class="text-vp fw-500" style="padding: 20px 0px;" > 
	      	<span style="text-transform: uppercase;"> <?php echo $fEje['descripcion_ej']?> </span> 
	        <small style="padding-top: 15px;" class="full-block"> 
	        	INGRESA LOS SIGUIENTES DATOS: 
	        </small>
	      </h2>
	    </div>
	    <div class="col-md-12">

	    	<?php 
	        $atribs = array('class' => 'form','style'=> 'margin: auto; max-width: 500px; font-weight: 500;'); 
	        echo form_open('Extranet/pruebas/'.$fEje['segmento_amigable'],$atribs);
	      ?>
	    	<div class="errors col-sm-12">
	          <?php echo validation_errors(); ?> 
	        </div>
	        <div class="form-group col-sm-12" >
	          <label for="fechanac" class="">Fecha de Nacimiento</label>
	          <input type="date" class="form-control" id="fechanac" name="fechanac" placeholder="Fecha de Nacimiento" disabled
	          	value="<?php echo $this->sessionVP->fecha_nacimiento; ?>"  />
	        </div>
	        <div class="form-group col-sm-6" >
	        	<label for="peso" class="">Peso <small class="help-inline"> (En kg.) </small> </label>
	        	<input type="text" class="form-control" id="peso" name="peso" placeholder="Peso(Kg.)" value="<?php echo set_value('peso'); ?>" />
	        </div>
	        <div class="form-group col-sm-6" >
	          <label for="talla" class="">Talla <small class="help-inline"> (En cm.) </small> </label>
	          <input type="text" class="form-control" id="talla" name="talla" placeholder="Talla(Cm.)" value="<?php echo set_value('talla'); ?>" />
	        </div>
	        <div class="form-group col-sm-12" >
	          <label for="cintura" class="">Cintura <small class="help-inline"> (En cm.) </small></label>
	          <input type="text" class="form-control" id="cintura" name="cintura" placeholder="Cintura(Cm.)" value="<?php echo set_value('cintura'); ?>" />
	        </div>
	        <div class="form-group col-sm-12" >
	          <label for="sexo" class="">Sexo</label> 
	          <select class="form-control" name="sexo">
	          	<option value="">SELECCIONE SEXO</option>
	          	<option value="M">M</option>
	          	<option value="F">F</option>
	          </select>
	        </div>
	        <div class="form-group col-sm-12 ">
	            <button type="submit" class="btn btn-pink btn-lg btn-block "> EVALUAR </button>
	        </div>
	      </form>
	    </div>
	  </div>
	  <?php } ?>
	</div>
</div>