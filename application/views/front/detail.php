<?php $this->load->view('front/header'); ?>
<div class="container">
	<h3 class="pt-4 pb-4">Blog</h3>
	<div class="col-md-12">
		<h3>
			<?php echo $article['title']; ?>
		</h3>
		<div class="d-flex justify-content-between">
			<p class="text-muted">Posted By <strong><?php echo $article['author']?></strong> On <?php echo date('d M Y',strtotime($article['created_at'])); ?></p></p>
			<a href="" class="text-muted p-2 bg-light text-uppercase ">
				<strong><?php echo $article['category_name']; ?></strong> 
			</a>
		</div>
		<?php 
			if ($article['image']!="" && file_exists('./public/uploads/articles/thumb_front/'.$article['image'])) {?>
			<div class="mb-3 mt-3">
				<img src="<?php echo base_url('./public/uploads/articles/thumb_front/'.$article['image']); ?>" alt="">
			</div>
		<?php		
			}
		 ?>
		<img src="" alt="">
		<p><?php echo $article['description']; ?></p>
	</div>
		
	<div class="col-md-9 pl-0" id="commnet-box">
		<?php 
			if (validation_errors()!="") {
				?>
				<div class="alert alert-danger">
					<h4 class="alert-heading">Xin vui long nhap vao binh luan</h4>
					<?php echo validation_errors(); ?>
				</div>
		<?php		
			}
		 ?>
		 <?php if (!empty($this->session->flashdata('message'))): ?>
		 	 <div class="alert alert-success">
		 	  	<?php echo $this->session->flashdata('message'); ?>
		     </div>
		 <?php endif ?>
		
			
		
		<div class="card">
			
		<div class="card-body">
			<form name="form_comment" id="commentform" action="<?php echo base_url('blog/detail/'.$article['id']) ?>#commnet-box" method="POST">
				<div id="comment-box mb-4">
					<p>Commnet</p>
					<div class="form-group">
						<textarea placeholder="Commnet Here" name="comment"	 id="commnet" class="form-control"><?php echo set_value('commnet'); ?></textarea>
					</div>
					<div class="form-group">
						<div class="row"> 
							<div class="col-md-6">
								<label>Your Name</label>
								<input placeholder="name" type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="form-control">
							</div>
						</div>
						
					</div>
				</div>
			
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>

			<hr>
		<div class="col-md-12">
			<?php 
		    if (!empty($comments)) {
		    	foreach ($comments as $comment) {
		    ?>
		    	<div class="user-comments">
		    		<p class="text-muted mt-4"><strong> <?php echo $comment['name']; ?></strong></p>
		    		<p class="font-italic"><?php echo $comment['comment']; ?></p>
		    		<small><?php echo date('d/m/Y',strtotime($comment['created_at'])); ?></small>
		    	</div>
			<?php
			}
				}
		 ?>

		</div>

		</div>
		

		
	</div>

	</div>
</div>
<?php $this->load->view('front/footer'); ?>