<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-page">
  <div class="margin-page regular">
  	<div class="row">
	    <div class="col-md-12">
	      <h2 class="text-vp fw-500" style="padding: 20px 0px;" > 
	      	<span style="text-transform: uppercase;"> <?php echo $fEje['descripcion_ej']?> </span> 
	      </h2>
	    </div>
	    <div class="col-md-12" style="margin-bottom: 30px;"> 
		    <div class="panel-resultado row">
		    	<div class="subpanel-1 col-sm-4 col-xs-12" style="border-radius: 10px;">
		    		<div class="image text-center" style="">
		    			<img class="image-responsive" alt="" src="<?php echo base_url('assets/images/').$result['imagen_corazon']; ?>"> 
		    			<p style="color:red;margin-top: 20px;"><?php echo $result['imagen_text']; ?></p>
		    		</div>
		    	</div>
		    	<div class="subpanel-2 col-sm-8 col-xs-12" style="border-radius: 10px;">
		    		<h3 class="text-center" style="padding-bottom: 20px;"> RESULTADOS </h3>
		    		<?php if($result['estado_general']){  ?>
		    		<p class=""> Tu estado de salud es muy bueno... Mira los detalles: </p> 
		    		<?php
		    			}else{
		    		?>
		    		<p class=""> Tu estado de salud puede mejorar... Mira los detalles: </p> 
		    		<?php 
		    			}
		    		?>
		    		<ul style="line-height: 2.5; padding-left: 25px;">
		    			<li>
		    				Índice de masa muscular (IMC): 
		    				<span style="font-weight: bold;color:<?php echo $result['imc_result_ok'] == TRUE ? 'green' : 'red'; ?>;"> 
		    					<?php echo $result['imc'].' Kg/m2 - '.$result['imc_result']; ?> 
		    				</span>
		    			</li>
		    			<li>
		    				% de grasa en el cuerpo: 
		    				<span style="font-weight: bold;color:<?php echo $result['gc_result_ok'] == TRUE ? 'green' : 'red'; ?>;"> 
		    					<?php echo $result['grasa_corporal'].'% - '.$result['gc_result']; ?> 
		    				</span>
		    			</li>
		    			<li>
		    				Requerimiento energético: <span> <?php echo $result['metabolismoBasal'].' kcal / día'; ?> </span>
		    			</li>
		    		</ul> 
		    		<strong style="font-weight: bold;color:<?php echo $result['cintura_result_ok'] == TRUE ? 'green' : 'red'; ?>;"> 
		    			<?php echo $result['cintura_result'] ?> 
		    		</strong>
		    		<p style="font-weight: bold;color:#fd7210;">Tu peso ideal es <?php echo $result['peso_ideal'].'kg.'; ?> </p>

		    		<a href="<?php echo site_url('Extranet/servicio/').$fEje['segmento_amigable']; ?>" class="btn btn-pink" style="margin: 20px auto; display: block;"> RECOMENDACIONES </a>
		    	</div>
		    </div>
	    </div>
	  </div>
  </div>
</div>