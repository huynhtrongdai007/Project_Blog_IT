<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'public/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo('public/css/style.css'); ?>">

    <title>Blog IT</title>
  </head>
  <body>
   
   <header class="bg-light">
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light pt-3 pb-3">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Blog IT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link text-uppercase active" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">about us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">categorys</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">contact us</a>
            </li>
          </ul>
        </div>
    </nav>
      </div>
   </header>


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
        <div class="col-md-3">
          <div class="card">
             <img class="card-img-top" src="<?php echo('public/images/box4.jpg') ?>" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Cart title</h5>
               <p class="card-text">>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             </div>
          </div>
        </div>
         <div class="col-md-3">
          <div class="card">
             <img class="card-img-top" src="<?php echo('public/images/box4.jpg') ?>" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Cart title</h5>
               <p class="card-text">>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             </div>
          </div>
        </div>
         <div class="col-md-3">
          <div class="card">
             <img class="card-img-top" src="<?php echo('public/images/box4.jpg') ?>" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Cart title</h5>
               <p class="card-text">>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             </div>
          </div>
        </div>
         <div class="col-md-3">
          <div class="card">
             <img class="card-img-top" src="<?php echo('public/images/box4.jpg') ?>" alt="Card image cap">
             <div class="card-body">
               <h5 class="card-title">Cart title</h5>
               <p class="card-text">>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             </div>
          </div>
        </div>
      </div>
    </div>
</div>

<footer class="bg-light pt-4 pb-4 mt-4">
  <div class="container">
   <div class="row">
    <div class="col-md-3">
      <h5>LOGO</h5>
      <small class="text-muted">
        <strong>Kimdai Huynh</strong><br/>
        sdt:0389297383<br/>
        huynhtrongdaiz@gmail.com
      </small>
    </div>
     <div class="col-md-3">
      <h5 class="text-capitalize">Important Link</h5>
     <ul class="list-unstyled text-small">
        <li><a href="" class="text-muted text-capitalize">about us</a> </li>
        <li><a href="" class="text-muted text-capitalize">serviecs</a> </li>
        <li><a href="" class="text-muted text-capitalize">blog</a> </li>
        <li><a href="" class="text-muted text-capitalize">categorys</a> </li>
     </ul>
    </div>
     <div class="col-md-3">
       <h5 class="text-capitalize">my account</h5>
     <ul class="list-unstyled text-small">
        <li><a href="" class="text-muted text-capitalize">login</a> </li>
        <li><a href="" class="text-muted text-capitalize">register</a> </li>
     </ul>
    </div>
     <div class="col-md-3">
      <h5 class="text-capitalize">support</h5>
     <ul class="list-unstyled text-small">
        <li><a href="" class="text-muted text-capitalize">contact us</a></li>
     </ul>
    </div>
   </div>
  </div>
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url().'public/js/jquery-3.5.1.slim.min.js' ?>"></script>
  
    <script src="<?php echo('public/js/bootstrap.min.js') ?>"></script>
  </body>
</html>