<?php echo form_open('rol/add',array("class"=>"form-horizontal")); ?>
<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container">	
			<div class="form-group">
				<label for="descripcion" class="col-md-4 control-label">Descripcion</label>
				<div class="form-control">
					<input type="text" name="descripcion" value="<?php echo $this->input->post('descripcion'); ?>" class="form-control" id="descripcion" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-success">Guardar</button>
        		</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
