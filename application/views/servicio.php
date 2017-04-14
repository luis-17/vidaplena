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
        <h2 class="text-vp fw-500" style="margin: 40px 0px;" > RECOMENDACIONES <?php // echo $servicios[0]['descripcion_ej']?></h2>
      </div>
      <div class="col-md-12"> 
        <div class="row margin-page servicio">
          <div class="col-md-12"> 
            <div class="consejos" style="height:320px;">
              <strong style="color: #ebf30a;display: block;padding: 70px 20px 50px;text-align: center;font-size: 18px;">SIGUE ESTOS 5 PRÁCTICOS CONSEJOS</strong>
              <ul class="list">
                <li> BEBE 2 LITROS DE AGUA AL DÍA </li> 
                <li> CAMINA UNA HORA AL DÍA </li> 
                <li> COME FRUTA </li> 
                <li> OTRO CONSEJO MAS 1 </li>
                <li> OTRO CONSEJO MAS 2 </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="profesionales">
              <img style="height: 380px;" class="img-responsive" src="<?php echo base_url('assets/images/chica_ensalada.png'); ?>" /> 
              <h4 style="margin-top: 30px;">Nutricionista On-line 
                <p> 
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc efficitur ante et cursus commodo. Morbi id tellus sapien. Nam placerat rutrum tellus, sed tincidunt dui bibendum cursus. Aliquam quis sem mauris. Morbi id pretium augue. Integer imperdiet, urna nec lacinia pellentesque, tellus nulla vestibulum mi, ut dictum turpis est sit amet ex. Nunc ut elit dignissim velit placerat varius. Quisque ullamcorper ullamcorper augue. 
                  
                </p>
                <button class="btn btn-warning" type="button" style="margin-top: 10px;"> SOLICITAR </button>
              </h4>
            </div> 
          </div>
          <div class="col-md-6"> 
            <div class="profesionales">
              <img style="height: 380px;" class="img-responsive" src="<?php echo base_url('assets/images/chica_nutri.jpg'); ?>" /> 
              <h4 style="margin-top: 30px;">Nutricionista Presencial
                <p> 
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc efficitur ante et cursus commodo. Morbi id tellus sapien. Nam placerat rutrum tellus, sed tincidunt dui bibendum cursus. Aliquam quis sem mauris. Morbi id pretium augue. Integer imperdiet, urna nec lacinia pellentesque, tellus nulla vestibulum mi, ut dictum turpis est sit amet ex. Nunc ut elit dignissim velit placerat varius. Quisque ullamcorper ullamcorper augue. 
                </p>
                <button class="btn btn-warning" type="button" style="margin-top: 10px;"> SOLICITAR </button>
              </h4> 
            </div>
          </div>
          <div class="col-md-12">
            <h3 class="text-center" style="padding-bottom: 20px;">Nuestras Soluciones</h3>
          </div>
          <div class="col-md-12">
            <div class="row" style="margin-bottom: 40px;"> 
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
      
    </div>
  </div>
</div> <!-- -->
<script>
  setTimeout(function() {
    $('.comprarServicio').on('click', function(e) { 
      console.log('click me');
      // Abre el formulario con las opciones de Culqi.settings
      Culqi.open();
      e.preventDefault();
    });
  },1000);
  console.log('load meeeeee'); 

</script>