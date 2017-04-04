<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
  .articulo{
    display: inline-block;
    border: 1px solid #ddd;
    min-height: 300px;
    vertical-align: top;
  }
  .super{vertical-align: super}
  .tachado{ text-decoration: line-through; font-size: 11px;}
  .btn-default{ background-color: #f7f7f7;
    border: 1px solid #ddd;}
</style>
<!-- <div class="content-page backimage"> -->
  <h3 style="text-align: left; padding: 0 5%;"><?=$servicios[0]['descripcion_ej']?></h3>
  <div >
    <h4>Nuestras Soluciones</h4>
    <?foreach($servicios as $row):?>
      <div class="articulo">
        <img alt="<?=$row['descripcion_serv']?>"
          src="<?=($row['imagen'] == '' || !file_exists("./assets/images/" . $row['imagen']))?
            base_url()."assets/images/no_image.jpg" : base_url() . "assets/images/" . $row['imagen'];?>"
        />
        <div class="taco margin-page regular">
          <span class="full-block" style="font-weight: 600"><?=$row['descripcion_serv'];?></span>
          <span style="font-weight: 600">S/.<?=$row['precio_actual'];?></span>
          <span class="super tachado"><?=empty($row['precio_regular'])? '' :'S/.'.$row['precio_regular']?></span>
          <input type="checkbox" id="cb_<?= $row['idservicio']; ?>" onchange="" style="opacity: 0" />
          <label class="btn btn-default pull-right f-12" for="cb_<?= $row['idservicio']; ?>" style=""> AGREGAR</label>
          <!-- <input type="checkbox" />
          <input type="button" id="boton" value="Agregar"/> -->
        </div>
      </div>
    <?endforeach;?>
    <div class="clear" style="margin-top: 10px"></div>
    <button class="label-pink pull-right">FINALIZAR COMPRA</button>
  </div>
<!-- </div> -->
<script>

</script>