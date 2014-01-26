		<div>
			Copyright &copy; 2013. ChicharongFlower. All rights reserved.
		</div>
		<!-- LOAD SCRIPTS -->
		<?php if (isset($script)) { ?>
			<script type="text/javascript">
				BASE_URL = "<?php echo base_url() ?>";
			</script>

			<script type="text/javascript" src="<?php echo base_url('codejs/jquery-1.11.0.js') ?>" ></script>
			<?php foreach($script as $s) { ?>
				<script type="text/javascript" src="<?php echo base_url().$s ?>" ></script>
			<?php } ?>
		<?php } ?>
		<!-- END SCRIPTS -->
	</body>
</html>