<?php $this->load->view('front/header'); ?>

<div class="container">
	<h3 class="pt-4 pb-4">Categorys</h3>
	<div class="row">
		<?php 
			if (!empty($categorys)) {
				foreach ($categorys as $items) {
		 ?>
		<div class="col-md-4 mb-4">
			<div class="card">
				<a href="<?php echo base_url('blog/category/'.$items['id']); ?>">
					<?php if (!empty($items['image'] )) {?>
		      			<img class="w-100 rounded"  src="<?php echo base_url('public/uploads/category/thumb/'.$items['image']) ?>" alt="Card image cap">     
		          <?php }else {?>
		          	<img class="w-100 rounded"  src="<?php echo base_url('public/uploads/category/no-image.png') ?>" alt="Card image cap">  
		          <?php } ?>
				</a>
				<div class="card-body pb-0 pt-2">
					<a href="<?php echo base_url('blog/category/'.$items['id']); ?>">
						<h5 class="card-title"><?php echo $items['name']; ?></h5>
					</a>
				</div>
			</div>
		</div>
		<?php 
		}
			} else {
				echo "Not Found Data";
			}
		 ?>
	</div>
</div>



<?php $this->load->view('front/footer'); ?>