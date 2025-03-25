<?php
use App\Models\Slider;

$argc_slider=[
  ['status','=',1],
  ['position','=','slideshow']
];
$list_slider = Slider::where($argc_slider)->get();

?>
<div class="slider">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php $index=1;?>
              <?php foreach($list_slider as $slider):?>
                <?php if ($index ==1):?>
              <div class="carousel-item active">
                <img src="public/images/slider/Slide1.jpg" class="d-block w-100" width="500px" height="500px" alt="">
              </div>
              <div class="carousel-item">
                <img src="public/images/slider/Slide2.jpg" class="d-block w-100" width="500px" height="500px" alt="">
              </div>
              <div class="carousel-item">
                <img src="public/images/slider/Slide3.jpg" class="d-block w-100" width="500px" height="500px" alt="">
              </div>
              <?php endif;?>
              <?php $index++;?>
              <?php endforeach;?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>