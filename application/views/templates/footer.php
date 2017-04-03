    </div>
  </div>
</div>
<?php if(@$this->session->flashdata('msgFlash')['flag'] === 1 ){ ?> 
	<div class="alert alert-success alert-dismissible notificable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Éxito!</strong> <?php echo $this->session->flashdata('msgFlash')['msg']; ?> 
	</div>
<?php } ?>

<?php if(@$this->session->flashdata('msgFlash')['flag'] === 2 ){ ?> 
	<div class="alert alert-danger alert-dismissible notificable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Error!</strong> <?php echo $this->session->flashdata('msgFlash')['msg']; ?> 
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

<!-- APP ANGULAR --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/controllers/MainController.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/directives.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/app.js'); ?>"></script>
</body>
</html>