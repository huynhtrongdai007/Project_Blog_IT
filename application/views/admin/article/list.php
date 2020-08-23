<?php $this->load->view('admin/header'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Article</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Article</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-lg-12">
    				<?php if ($this->session->flashdata('success') != "") { ?>
    				<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    				<?php } ?>

    				<?php if ($this->session->flashdata('error') != "") { ?>
    				<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    				<?php } ?>
    				 <!-- Default box -->
			      <div class="card">
			    	<div class="card-header">
			    		<div class="card-title">
			    			<form id="searchFrm" action="" name="searchFrm" method="GET">
			    				<div class="input-group mb-0">
			    					<input type="text" value="<?php echo $q; ?>" class="form-control" placeholder="Search" mame="q">
			    					<div class="input-group-append">
			    						<button class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></button>
			    					</div>
			    				</div>
			    			</form>
			    		</div>
			    		<div class="card-tools">
			    			<a href="<?php echo base_url().'admin/article/create'?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
			    		</div>
			    	</div>
			    	<div class="card-body">
			    		<table class="table">
			    				<thead>
			    					<tr>
			    						<th width="50">#</th>
			    						<th width="100">Image</th>
			    						<th>Title</th>
			    						<th width="180">Author</th>
			    						<th width="70">status</th>
			    						<th width="100">Created</th>
			    						<th width="140" class="text-center">Action</th>
			    					</tr>
			    				</thead>
			    				<tbody>
			    					<?php if (!empty($articles)) {?>
										<?php foreach ($articles as $items): ?>
											<tr>
												<td><?php echo $items['id']; ?></td>
												<td>
													<?php 	
														$path = './public/uploads/articles/thumb_admin/'.$items['image'];
														if ($items['image'] != "" && file_exists($path)) {?>
															<img class="w-100" src="<?php echo base_url('public/uploads/articles/thumb_admin/'.$items['image']) ?>" alt="">
														<?php } else {?>
															<img class="w-100" src="<?php echo base_url('public/uploads/articles/thumb_admin/no-image.png') ?>" alt="">	
														<?php } ?>	
												</td>
												<td><?php echo $items['title']; ?></td>
												<td><?php echo $items['author']; ?></td>
												<td>
													<?php if ($items['status']==1) { ?>
														<p class="badge badge-success">On</p>	
													<?php }else { ?>
														<p class="badge badge-danger">Off</p>
													<?php } ?>	
												</td>
												<td><?php echo date('Y-m-d',strtotime($items['created_at']));?></td>
												<td class="text-center">
													<a href="<?php echo base_url().'admin/article/edit/'.$items['id'] ?>" class="btn btn-primary btn-sm">
			    							<i class="far fa-edit"></i></a>
			    							<a href="javascript:void(0);" onclick="deleteArticle(<?php echo $items['id']; ?>);" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
												</td>
											</tr>
										<?php endforeach ?>
			    				<?php }else { ?>
									<tr>
										<td colspan="7">Records not found</td>
									</tr>
			    				<?php } ?>
			    				</tbody>
			    		</table>
			    		<div>
			    			<?php echo $pagination_links; ?>
			    		</div>
			    	</div>

			        <!-- /.card-body -->
			      </div>
			      <!-- /.card -->
    			</div>
    		</div>
    	</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/footer'); ?>
<script type="text/javascript">
	function deleteArticle(id) {
	
		if (confirm("Are you sure you want to delete article")) {
			window.location.href='<?php echo base_url().'admin/article/delete/'; ?>'+id;
		}
	}
</script>