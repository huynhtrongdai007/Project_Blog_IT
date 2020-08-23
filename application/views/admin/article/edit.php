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
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/category/index' ?>">Article</a></li>
              <li class="breadcrumb-item active">Edit Article</li>
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
             <!-- Default box -->
            <div class="card card-primary">
            <div class="card-header">
              <div class="card-title">
                Edit Article: <?php echo $article['title']; ?>
              </div>
            </div>
              <form action="<?php  echo base_url().'admin/article/edit/'.$article['id']; ?>" name="categoryForm" id="categoryForm" method="POST"  enctype="multipart/form-data">
            <div class="card-body">
                  <div class="form-group">
                     <label>Category</label>
                     <select name="category_id" id="category_id" class="form-control <?php echo(form_error('category_id')!= "") ? 'is-invalid' : '';?>">
                       <option value="">Select a Category</option>
                       <?php if (!empty($categorys)) {?>
                          <?php foreach ($categorys as $itemcategory): ?>
                            <?php $selected = ($article['category'] == $itemcategory['id']) ? true : false; ?>
                            <option <?php echo set_select('category_id',$itemcategory['id'], $selected); ?> value="<?php echo $itemcategory['id'] ?>"><?php echo $itemcategory['name']; ?></option>
                          <?php endforeach ?>
                       <?php } ?>
                     </select>
                     <?php echo form_error('category_id'); ?>
                  </div>
                  <div class="form-group">
                     <label>Title</label>
                     <input type="text" name="title" id="name" value="<?php echo set_value('title',$article['title']); ?>" class="form-control <?php echo (form_error('title')!= "") ? 'is-invalid' : '';?>">
                     <?php echo form_error('title'); ?>
                  </div>
                   <div class="form-group">
                     <label>Description</label><br>
                     <textarea  class="textarea" name="description" id="description"><?php echo $article['description']; ?></textarea>
                  </div>
                  <div class="form-group">
                     <label>Author</label>
                     <input type="text" name="author" id="author" value="<?php echo set_value('author',$article['author']); ?>" class="form-control <?php echo (form_error('author')!= "") ? 'is-invalid' : '';?>">
                     <?php echo form_error('author'); ?>
                  </div>
                   <div class="form-group">
                     <label>Image</label><br>
                     <input type="file" name="image" class="<?php echo(!empty($imageError)) ? 'is-invalid' : '';?>" id="image">
                      <br/>
                    <?php 
                        $path = './public/uploads/articles/thumb_admin/'.$article['image'];
                        if ($article['image'] != "" && file_exists($path)) {
                         ?>
                            <img class="mt-3" name="image" src="<?php echo base_url('public/uploads/articles/thumb_admin/'.$article['image']); ?>" alt="">
                    <?php 
                        }
                     ?>

                     <?php if (!empty($imageError)) {
                       echo  $imageError;
                     } ?>
                  </div>
                  <div class="custom-control custom-radio float-left">
                    <input class="custom-control-input" value="1" type="radio" id="statusActive" <?php echo($article['status']==1) ? 'checked' : ''; ?> name="status">
                    <label for="statusActive" class="custom-control-label">Active</label>
                  </div>
                   <div class="custom-control custom-radio float-left ml-3">
                    <input class="custom-control-input" value="0" type="radio"  <?php echo($article['status']==0) ? 'checked' : ''; ?>  id="statusBlock" name="status">
                    <label for="statusBlock" class="custom-control-label">Block</label>
                  </div>
                
            </div>
            <div class="card-footer">
              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url().'admin/article/index' ?>" class="btn btn-secondary">Back</a>
            </div>
            </form>
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