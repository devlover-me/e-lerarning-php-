<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title mt-0">Add Question</h4>
							</div>
							<div class="col-md-6">
								<a class="btn btn-warning" href="<?php echo base_url('admin/viewQuestion'); ?>"
									style="float: right;">View Question</a>
							</div>
						</div>
					</div>

				</div>
				<?php echo form_open_multipart('admin/save_question'); ?>
				<div class="form-group">
					<label for="exampleInputPassword1">Select Category *</label>
					<select name="category" class="form-control" id="" required>
						<option value="" >Select</option>
						<?php if(!empty($category)){ foreach($category as $m){ ?>
						<option value="<?php echo $m->title; ?>"><?php  echo $m->title; ?></option>
						<?php } } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Question</label>
					<input type="text" name="question" class="form-control " id="" placeholder="Enter Question"
						required>
						<?php echo form_error('question','<div class="error" style="color:red;">', '</div>'); ?>
				</div>

		
				<div class="">
					<label for="exampleInputPassword1">Option 1</label>
					<input name="opt1" type="text" class="form-control " id="">
					
                </div>
                
                <div class="">
					<label for="exampleInputPassword1">Option 2</label>
					<input name="opt2" type="text" class="form-control " id="">
					
                </div>
                <div class="">
					<label for="exampleInputPassword1">Option 3</label>
					<input name="opt3" type="text" class="form-control " id="">
					
                </div>
                <div class="">
					<label for="exampleInputPassword1">Option 4</label>
					<input name="opt4" type="text" class="form-control " id="">
					
                </div>
                
                <div class="">
					<label for="exampleInputPassword1">Answer</label>
					<input name="ans" type="text" class="form-control " id="">
					
                </div>
                <div class="">
					<label for="exampleInputPassword1">Coin</label>
					<input name="coin" type="text" class="form-control" id="">
					
				</div>
				<div class="form-group">
					<button type="submit" class="btn  btn-primary" name="submit">Save</button>
				</div>

				<?php echo form_close();  ?>

			</div>
		</div>
	</div>
</div>
</div>
