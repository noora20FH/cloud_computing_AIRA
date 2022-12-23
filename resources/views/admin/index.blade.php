@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <h1>AIRA PROJECT</h1>
    </div>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
        <div class="carousel-item active">
        
            <img class="d-block  mw-100" style="width: 1500px; height: 600px; filter: brightness(55%)" src="Assets/images/banner-01.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block text-center">
                
                    <h1 class="m-b-20 text-white" ><strong>Welcome To Admin<br> AIRA COSMETICS </strong></h1>
                    <p class="m-b-40 text-white">AIRA Cosmetics contains 95% organic ingredients and there is no compounds of petroleum origin, paraffin, formaldehyde and dyes of synthetic origin. 
                    Suitable for those of you who want to look stunning and full of elegance without giving bad side effects to your skin. 
                    The packaging is made attractive, elegant, and environmentally friendly.</p>
                
                </div>
        
        </div>
        <div class="carousel-item">
        <img class="d-block  mw-100" style="width: 1500px; height: 600px; filter: brightness(55%)" src="Assets/images/banner-02.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block text-center">
                
                    <h1 class="m-b-20 text-white" ><strong>Welcome To Admin<br> AIRA COSMETICS </strong></h1>
                    <p class="m-b-40 text-white">AIRA Cosmetics contains 95% organic ingredients and there is no compounds of petroleum origin, paraffin, formaldehyde and dyes of synthetic origin. 
                    Suitable for those of you who want to look stunning and full of elegance without giving bad side effects to your skin. 
                    The packaging is made attractive, elegant, and environmentally friendly.</p>
                
                </div>
        </div>
        <div class="carousel-item">
        <img class="d-block  mw-100" style="width: 1500px; height: 600px; filter: brightness(55%)" src="Assets/images/banner-03.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block text-center">
                
                    <h1 class="m-b-20 text-white" ><strong>Welcome To Admin<br> AIRA COSMETICS </strong></h1>
                    <p class="m-b-40 text-white">AIRA Cosmetics contains 95% organic ingredients and there is no compounds of petroleum origin, paraffin, formaldehyde and dyes of synthetic origin. 
                    Suitable for those of you who want to look stunning and full of elegance without giving bad side effects to your skin. 
                    The packaging is made attractive, elegant, and environmentally friendly.</p>
                
                </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

@endsection
