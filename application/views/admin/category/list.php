<?php $this->load->view('admin/header'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categorys</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categorys</li>
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
			    			<form action="" name="searchFrm" method="get">
			    				<div class="input-group mb-0">
			    					<input type="text" value="<?php echo $queryString; ?>" class="form-control" placeholder="Search" mame="q">
			    					<div class="input-group-append">
			    						<button class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></button>
			    					</div>
			    				</div>
			    			</form>
			    		</div>
			    		<div class="card-tools">
			    			<a href="<?php echo base_url().'admin/category/create'?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
			    		</div>
			    	</div>
			    	<div class="card-body">
			    		<table class="table">
			    				<thead>
			    					<tr>
			    						<th>#</th>
			    						<th>Name</th>
			    						
			    						<th>status</th>
			    						<th width="160" class="text-center">Action</th>
			    					</tr>
			    				</thead>
			    				<tbody>
			    					<?php if (!empty($categorys)) {?>
			    						<?php foreach ($categorys as $items):?>
			    					<tr>
			    						<td><?php echo $items['id']; ?></td>
			    						<td><?php echo $items['name']; ?></td>

			    						<td>
			    							<?php if ($items['status']==1) { ?>
			    								<span class="badge badge-success">On</span>
			    							<?php }else{ ?>	
			    								<span class="badge badge-danger">Off</span>
			    							<?php } ?>
			    						</td>
			    						<td>
			    							<a href="<?php echo base_url().'admin/category/edit/'.$items['id'] ?>" class="btn btn-primary btn-sm">
			    							<i class="far fa-edit"></i> Edit</a>
			    							<a href="javascript:void(0);" onclick="deleteCat(<?php echo $items['id']; ?>);" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</a>
			    						</td>
			    					</tr>
			    				<?php endforeach; ?>
			    				<?php }else{ ?>
			    					<tr>
			    						<td colspan="4">Khong co du lieu</td>
			    					</tr>
			    				<?php } ?>
			    				</tbody>
			    		</table>
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
	function deleteCat(id) {
		if (confirm("Are you sure you want to delete category")) {
			window.location.href='<?php echo base_url().'admin/category/delete/'; ?>'+id;
		}
	}
</script>