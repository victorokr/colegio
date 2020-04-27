@extends('layouts.app')

@section('content')

<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-interval="4000" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slider.jpg" class="d-block w-100" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/portada.jpg" class="d-block w-100" alt="second slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/estudiantes.jpg" class="d-block w-100" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container ">
 <div class="row justify-content-md-center">
  <div class="col col-lg-8">	
   <div class="card-group ">
	  <div class="card card border-light ">
	    <div class="card-body">
	      <h5 class="card-title">SOFTCODE</h5>
	      <p class="card-text ">Hello, I’m a UI/UX Designer & Front End Developer from Victoria, Australia. I hold a master degree of Web Design from the World University.And scrambled it to make a type specimen book. It has survived not only five centuries
	      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, adipisci voluptatum repudiandae, natus impedit repellat aut officia illum at assumenda iusto reiciendis placeat. Temporibus, vero..</p>
	      
	    </div>
	  </div>
	  <div class="card card border-light ">
	    <img src="images/about.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title"></h5>
	      <p class="card-text"></p>
	    </div>
	  </div>
   </div>
  </div>
 </div>


  <div class="card-deck">
	  <div class="card ">
	    <img src="images/item-1.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Card title</h5>
	      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
	      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	    </div>
	  </div>
	  <div class="card">
	    <img src="images/item-2.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Card title</h5>
	      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
	      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	    </div>
	  </div>
	  <div class="card">
	    <img src="images/item-3.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Card title</h5>
	      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
	      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	    </div>
	  </div>
  </div>

  <div class="card-deck mt-4">
	  <div class="card ">
	    <img src="images/item-4.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Card title</h5>
	      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
	      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	    </div>
	  </div>
	  <div class="card">
	    <img src="images/item-5.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Card title</h5>
	      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
	      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	    </div>
	  </div>
	  <div class="card">
	    <img src="images/item-6.jpg" class="card-img-top" alt="...">
	    <div class="card-body">
	      <h5 class="card-title">Card title</h5>
	      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
	      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	    </div>
	  </div>
  </div>
</div>
@endsection
