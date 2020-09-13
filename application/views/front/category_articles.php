<?php $this->load->view('front/header'); ?>
<div class="container">
	<h3 class="pt-4 pb-4">Blog/<?php echo $category['name']; ?></h3>
	<?php 
		if (!empty($article)) {
			foreach ($article as $items) {
	 ?>

	<div class="row mb-4">
		<div class="col-md-4">
			  <?php if (!empty($items['image'] )) {?>
      			<img class="w-100 rounded"  src="<?php echo base_url('public/uploads/articles/thumb_front/'.$items['image']) ?>" alt="Card image cap">     
          <?php }else {?>
          	<img class="w-100 rounded"  src="<?php echo base_url('public/uploads/articles/thumb_admin/no-image.png') ?>" alt="Card image cap">  
          <?php } ?>
		</div>
		<div class="col-md-8">
				<p class="bg-light">
				<a href="<?php echo base_url('blog/category/'.$items['category']) ?>" class="text-muted text-uppercase"><?php echo $items['category_name']; ?></a>
				</p>
				<h3><a href="<?php echo base_url('blog/detail/'.$items['id']); ?>"><?php echo $items['title']; ?></a></h3>
				<p>
				<?php echo word_limiter($items['description'],50); ?>
				<a class="text-muted" href="<?php echo base_url('blog/detail/'.$items['id']); ?>">Read More</a>
				</p>
				<p class="text-muted">Posted By <strong><?php echo $items['author']; ?></strong> on <?php echo date('d M Y',strtotime($items['created_at'])); ?></p>
		</div>
	</div>
	<?php 
		}
	}
	 ?>

	 <div class="row">
	 	<div class="col-md-12">
	 		<?php 
	 			echo $pagination_links;
	 		 ?>
	 	</div>
	 </div>

</div>
<?php $this->load->view('front/footer'); ?>