<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/style.css'); ?>">

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
              <a class="nav-link text-uppercase" href="<?php echo base_url('page/about'); ?>">about us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="<?php echo base_url('page/services'); ?>">service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="<?php echo base_url('blog'); ?>">blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="<?php echo base_url('blog/categorys'); ?>">categorys</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">contact us</a>
            </li>
          </ul>
        </div>
    </nav>
      </div>
   </header>