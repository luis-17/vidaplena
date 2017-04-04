<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-page backimage">
  <div class="inner cover" > 
    
      <div class="row">
        <div class="col-sm-12">
          <div class="form register-form" style="padding-bottom: 24px;"> 
            <?php 
              $atribs = array('id' => 'form-login');
              echo form_open('login/',$atribs);
            ?> 
              <h3> INICIAR SESIÓN </h3> 
              <div class="errors">
              <?php if(@$error_login): ?>
                Error en el usuario o contraseña. 
                <br />
              <?php endif; ?>
              </div>
              <div class="form-group col-sm-12" >
                <label for="correo" class="sr-only">Correo Electrónico</label>
                <input type="email" class="form-control input-lg" id="correo" name="correo" placeholder="Correo Electrónico" value="<?php echo set_value('correo'); ?>" />
              </div>
              <div class="form-group col-sm-12" >
                <label for="contrasenia" class="sr-only">Contraseña</label> 
                <input type="password" class="form-control input-lg" id="contrasenia" name="contrasena" placeholder="Contraseña" autocomplete="off" />
              </div> 
              <div class="form-group col-sm-12 ">
                <button type="submit" class="btn btn-success upper" style="width: 240px;"> Acceder </button> 
                <a href="#" class="btn btn-md btn-social btn-facebook" style="width: 240px;">
                  <span class="fa fa-facebook"></span> 
                  <span class="searchword">Iniciar sesión con</span> 
                  <span class="searchword">Facebook</span> 
                </a>
              </div> 
              <div class="form-group col-sm-12 ">
                
              </div> 
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>