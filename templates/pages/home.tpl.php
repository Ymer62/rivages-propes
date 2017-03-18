<div class="container full">
    <div class="row">
        <div class="carousel carousel-slider center" data-indicators="true">
          <div class="carousel-fixed-item center">
            <a class="btn waves-effect white grey-text darken-text-2">button</a>
          </div>
          <div class="carousel-item white-text" href="#one!" style="background-image: url('img/placeholder.jpg');">
            <h2>First Panel</h2>
            <p class="white-text">This is your first panel</p>
          </div>
          <div class="carousel-item white-text" href="#two!" style="background-image: url('img/placeholder.jpg');">
            <h2>Second Panel</h2>
            <p class="white-text">This is your second panel</p>
          </div>
          <div class="carousel-item white-text" href="#three!" style="background-image: url('img/placeholder.jpg');">
            <h2>Third Panel</h2>
            <p class="white-text">This is your third panel</p>
          </div>
          <div class="carousel-item white-text" href="#four!" style="background-image: url('img/placeholder.jpg');">
            <h2>Fourth Panel</h2>
            <p class="white-text">This is your fourth panel</p>
          </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('.carousel.carousel-slider').carousel({fullWidth: true});
    // Autoplay
    setInterval(function() {
        $('.carousel').carousel('next');
    }, 3500)
</script>


<pre>
<?php

var_dump($pageData);

?>
</pre>
