<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
  .articulo{
    border: 1px solid #ddd;
    display: inline-block;
    height: 300px;
    margin-bottom: 20px;
    vertical-align: top;
    width: 240px;
  }
  .super{vertical-align: super}
  .tachado{ text-decoration: line-through; font-size: 11px;}
 /* .btn-default{ background-color: #f7f7f7;
    border: 1px solid #ddd;}*/
</style>
<div class="content-page "> 
  <div class="margin-page regular">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-vp fw-500" style="padding: 20px 0px 0px;" ><?php echo $servicios[0]['descripcion_ej']?></h2>
      </div>
      <div class="col-md-12">
        <h3 class="text-center" style="padding-bottom: 20px;">Nuestras Soluciones</h3>
      </div>
      <div class="col-md-12">
        <div class="row margin-page servicio">
          <?php foreach($servicios as $row):?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center">
              <div class="articulo">
                <img alt="<?php echo $row['descripcion_serv']?>"
                  src="<?php echo ($row['imagen'] == '' || !file_exists("./assets/images/" . $row['imagen']))?
                    base_url()."assets/images/no_image.jpg" : base_url() . "assets/images/" . $row['imagen'];?>" />
                <div class="taco" style="text-align: left; padding: 5px 12px;">
                  <span class="full-block" style="font-weight: 600"><?php echo $row['descripcion_serv'];?></span>
                  <span style="font-weight: 600">S/.<?php echo $row['precio_actual'];?></span>
                  <span class="super tachado"><?php echo empty($row['precio_regular'])? '' :'S/.'.$row['precio_regular']?></span>
                  <input type="checkbox" id="cb_<?php echo  $row['idservicio']; ?>" onchange="" style="opacity: 0" />
                  <button class="btn btn-default pull-right btn-xs comprarServicio" for="cb_<?php echo  $row['idservicio']; ?>" > COMPRAR </button>
                  <!-- <input type="checkbox" />
                  <input type="button" id="boton" value="Agregar"/> -->
                </div>
              </div>
            </div>
          <?php endforeach; ?> 
          <button type="button" class="btn btn-pink pull-right" style="margin-right: 20px;">FINALIZAR COMPRA</button>
        </div>
        
        <div class="clear-fix"></div>
      </div>
    </div>
  </div>
</div> <!-- -->
<script>
//jQuery(document).ready(function($){
  setTimeout(function() {
    $('.comprarServicio').on('click', function(e) { 
      console.log('click me');
      // Abre el formulario con las opciones de Culqi.settings
      Culqi.open();
      e.preventDefault();
    });
  },1000);
  console.log('load meeeeee'); 
  
//});
</script>