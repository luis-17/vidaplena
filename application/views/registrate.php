<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-page backimage">
  <div class="inner cover" > 
    
      <div class="row">
        <div class="col-sm-12">
          <div class="form register-form" style="padding-bottom: 24px;"> 
            <?php 
              $atribs = array('id' => 'form-agregarEstadoTrab');
              echo form_open('registrate/',$atribs);
            ?> 
              <h3> REGÍSTRATE </h3> 
              <div class="errors">
                <?php echo validation_errors(); ?> 
              </div>
              <div class="form-group col-sm-6" >
                <label for="nombres" class="sr-only">Nombres</label>
                <input type="text" class="form-control input-lg" id="nombres" name="nombres" placeholder="Nombres" value="<?php echo set_value('nombres'); ?>" />
              </div>
              <div class="form-group col-sm-6" >
                <label for="apellidos" class="sr-only">Apellidos</label>
                <input type="text" class="form-control input-lg" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo set_value('apellidos'); ?>" />
              </div>
              <div class="form-group col-sm-12" >
                <label for="fechanac" class="sr-only">Fecha de Nacimiento</label>
                <input type="date" class="form-control input-lg" id="fechanac" name="fechanac" placeholder="Fecha de Nacimiento" value="<?php echo set_value('fechanac'); ?>" />
              </div>
              <div class="form-group col-sm-12" >
                <label for="correo" class="sr-only">Correo Electrónico</label>
                <input type="email" class="form-control input-lg" id="correo" name="correo" placeholder="Correo Electrónico" value="<?php echo set_value('correo'); ?>" />
              </div>
              <div class="form-group col-sm-12" >
                <label for="contraseña" class="sr-only">Contraseña</label>
                <input type="password" class="form-control input-lg" id="contraseña" name="contrasena" placeholder="Contraseña" autocomplete="off" />
              </div> 
              <div class="checkbox form-group col-sm-12 upper">
                <label style="font-size: 18px;">
                  <input required type="checkbox" name="check_terminos"> Acepto los <strong style="text-decoration:underline;"> Términos y Condiciones </strong>
                </label>
              </div>
              
              <div class="form-group col-sm-12 ">
                <button type="submit" class="btn btn-success btn-lg btn-block upper"> Registrar </button>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
    </div>
    <script type="text/javascript">
      
    </script>
  </div>
</div>