<div class="container" id="events">
    <div class="row">
        <div class="col s12">
          <?php
          if(ADMIN):
          ?>
            <h1 data-page="<?= PAGE ?>">
              <span contenteditable="true">
                <?php echo $pageData['title'] ?>
              </span>
              <i class="small material-icons editTitle" style="display:none">mode_edit</i>
            </h1>
          <?php
          else:
          ?>
            <h1><?= $pageData['title'] ?></h1>
          <?php
          endif;
          ?>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6">
            <h4>A venir</h4>
            <div class="row">
                <div class="col s4">
                    <!-- data-id a remplacer par l'id de l'event attaché à l'image récupérée en BDD -->
                    <a href="#result">
                        <img src="img/placeholderV.png" alt="" data-id="1">
                    </a>
                    <p>13/06/2017</p>
                </div>
                <div class="col s4">
                    <a href="#result">
                        <img src="img/placeholderV.png" alt="" data-id="1">
                    </a>
                    <p>13/06/2017</p>
                </div>
                <div class="col s4">
                    <a href="#result">
                        <img src="img/placeholderV.png" alt="" data-id="1">
                    </a>
                    <p>13/06/2017</p>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <h4>Passés</h4>
            <div class="row">
                <div class="col s4">
                    <a href="#result">
                        <img src="img/placeholderV.png" alt="" data-id="1">
                    </a>
                    <p>13/06/2017</p>
                </div>
                <div class="col s4">
                    <a href="#result">
                        <img src="img/placeholderV.png" alt="" data-id="1">
                    </a>
                    <p>13/06/2017</p>
                </div>
                <div class="col s4">
                    <a href="#result">
                        <img src="img/placeholderV.png" alt="" data-id="1">
                    </a>
                    <p>13/06/2017</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="result">

    </div>
</div>

<script type="text/javascript">
    var images = $('#events .row:nth-child(2) img')
    var result = $('#result');
    // Lorsqu'on clique sur une image on appelle la fonction getEvent
    images.each(function() {
        $(this).on('click touchstart', getEvent);
    });

    function getEvent() {
        result.slideUp();
        // On récupère l'id de l'image sur laquelle on a cliqué
        var id = this.getAttribute('data-id');
        // Et sa source
        var src = this.getAttribute('src');
        $.ajax({
          type: "POST",
          url: 'ajax.php?ajax=showEvent',
          data: {
              id:id,
              src:src,
          },
          success: function(data){
              result.html(data);
          },
          complete : function(){
              result.slideDown();
              $('.materialboxed').materialbox();
          }
        });
    }
</script>

<?php

$debug->arr(array('$pageData' => $pageData));

?>
