    </div>
  </div>
</div>
<?php 
	$fSession = $this->session->flashdata('msgFlash');
	if(@$fSession['flag'] === 1 ){ ?> 
	<div class="alert alert-success alert-dismissible notificable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Éxito!</strong> <?php echo @$fSession['msg']; ?> 
	</div>
<?php } ?>

<?php if(@$fSession['flag'] === 2 ){ ?> 
	<div class="alert alert-danger alert-dismissible notificable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Error!</strong> <?php echo @$fSession['msg']; ?> 
	</div>
<?php } ?>
<!--  -->
<!-- <footer>
	Page rendered in <strong>{elapsed_time}</strong> seconds. 
</footer> -->

<script type="text/javascript" src="<?php echo base_url('libs/angular.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('libs/jquery-3.2.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('libs/bootstrap-3.3.7/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('libs/ui-bootstrap-tpls-2.5.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('libs/jquery-mask-plugin/jquery.mask.min.js'); ?>"></script>

<!-- APP ANGULAR --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/controllers/MainController.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/directives.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/app.js'); ?>"></script>

<!-- Incluyendo .js de Culqi Checkout-->
<script src="https://checkout.culqi.com/v2"></script>
<script>
	Culqi.publicKey = 'pk_test_Im4XoJ4SwSqCSyoX';
    Culqi.settings({
        title: 'Culqi Store',
        currency: 'PEN',
        description: 'Dieta por una semana',
        amount: 5500
    });
</script>
</body>
</html>