<?php $this->load->view('front/header'); ?>


   <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo base_url('public/images/slide1.jpg') ?>" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo base_url('public/images/slide2.jpg') ?>" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo base_url('public/images/slide3.jpg') ?>" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="container pt-4 pb-4">
    <h3 class="pb-3 text-uppercase">About Company</h3>

    <p class="text-muted">
      Ratione dignissimos aptent, rem fugit ullamcorper aliquip dolores, diam morbi, justo cum porta pariatur? Eos provident, hymenaeos tenetur et! Nostrud! Volutpat penatibus fugit placeat? Natus, purus voluptatem aliqua. Recusandae sapiente, vel? Voluptatem? Sunt ad esse eaque. Ante est suspendisse nisi sollicitudin adipiscing. Wisi veniam feugiat corrupti semper accusamus arcu diam adipisicing corrupti, enim lectus? Justo, incidunt nihil pharetra debitis scelerisque in vero temporibus quisquam, ante 
    </p>

    <p class="text-muted">Sint exercitation quasi odio augue suscipit ornare ducimus excepteur aenean elit nostrud? Placerat ad vulputate elementum, saepe explicabo ut porro doloremque saepe esse quis, ridiculus, potenti nisl, molestiae corporis exercitationem tempus nostra accusamus consequuntur, voluptate ullam fuga hac elementum tortor? Ullamcorper, nonummy, elit ullam hic numquam nihil ratione? Sunt quod, recusandae provident animi urna quam litora eius metus duis. Incidunt. Maecenas dictum. Consequuntur egestas! Odit, iure,</p>
</div>
<div class="bg-light pb-4">
  <div class="container">
  <h3 class="pb-3 text-uppercase">our serviecs</h3>
   <div class="row">
     <div class="col-md-3">
        <div class="card h-100">
       <img class="card-img-top" src="<?php echo('public/images/box1.jpg') ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Website Development</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
       </div>
     </div>
      <div class="col-md-3">
        <div class="card h-100">
       <img class="card-img-top" src="<?php echo('public/images/box2.jpg') ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
       </div>
     </div>
      <div class="col-md-3">
        <div class="card h-100">
       <img class="card-img-top" src="<?php echo('public/images/box3.jpg') ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
        </div>
       </div>
     </div>
     <div class="col-md-3">
        <div class="card">
       <img class="card-img-top" src="<?php echo('public/images/box4.jpg') ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
       </div>
     </div>
   </div>
</div>
</div>



<div class="pb-4 pt-4">
    <div class="container">
      <h3 class="pb-3 pt-4 text-uppercase">latest bogs</h3>

      <div class="row">
        <?php foreach ($articles as $items) {
         ?>
        <div class="col-md-3">
          <div class="card">
            <?php if (file_exists('./public/uploads/articles/thumb_admin/'.$items['image'])) {?>
      <img class="card-img-top" src="<?php echo base_url('public/uploads/articles/thumb_admin/'.$items['image']) ?>" alt="Card image cap">

          
          <?php } ?>
             <div class="card-body">
               <h5 class="card-title"><?php echo $items['title']; ?></h5>
               <p class="card-text"><?php  echo word_limiter($items['description'],30); ?></p>
             </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
</div>

<?php $this->load->view('front/footer'); ?>

