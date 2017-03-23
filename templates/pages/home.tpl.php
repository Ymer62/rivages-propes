<div class="container full">
    <div class="row">
        <div class="carousel carousel-slider center" data-indicators="false">
            <div class="carousel-fixed-item center">
                <!-- Fixed content, visible sur toutes les slides -->
            </div>
            <div class="carousel-item" href="#one!">
                <img src="img/logo.png" alt="logo">
            </div>
            <div class="carousel-item" href="#two!" style="background-image: url('img/placeholder.jpg');">
            </div>
            <div class="carousel-item" href="#three!" style="background-image: url('img/placeholder.jpg');">
            </div>
            <div class="carousel-item" href="#four!" style="background-image: url('img/placeholder.jpg');">
            </div>
        </div>
    </div>
</div>

<div class="container" id="home">
    <div class="row">
        <div class="col s12">
            <h1><?php echo $pageData['title'] ?></h1>
            <p class="flow-text"><?php echo $pageData['text'] ?></p>
        </div>
        <div class="col s5 offset-s1 m2 offset-m4">
            <a href="<?= $path->link('presentation-historique') ?>"><button type="button" class="btn waves-effect center-block">Historique</button></a>
        </div>
        <div class="col s5 m2">
            <a href="<?= $path->link('presentation-equipe') ?>"><button type="button" class="btn waves-effect center-block">Equipe</button></a>
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

<?php

// $debug->arr(array('$pageData' => $pageData));

?>
