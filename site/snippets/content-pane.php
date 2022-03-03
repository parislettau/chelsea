 <div class="content-pane-wrapper <?php if ($page->template() == 'exhibition' || $page->template() == 'page') : ?>show<?php endif ?>" id="content-pane-wrapper">
    <section id="content-pane" class="content-pane <?php if ($page->template() == 'exhibition' || $page->template() == 'page') : ?>show<?php endif ?>" style="<?php if ($page->template() == 'exhibition' || $page->template() == 'page') : ?><?php else : ?> display:none<?php endif ?>">




       <div class="content-pane-text" id="content-pane-text">


          <?php if ($page->template() == 'exhibition') : ?>
             <?php snippet('content-pane/exhibition') ?>
          <?php endif ?>

          <?php if ($page->template() == 'page') : ?>
             <?php snippet('content-pane/page') ?>

          <?php endif ?>
       </div>
    </section>

 </div>

 <script>
    $(document).ready(function() {
       // Click outside pane to close all menus
       $(document).mouseup(function(e) {
          let container = $("#content-pane");
          let cq = $("#mydiv");

          // if the target of the click isn't the container and isn't menu-b nor a descendant of the container
          if (
             !container.is(e.target) &&
             container.has(e.target).length === 0 &&
             container.has(e.target).length === 0 &&
             $('body').hasClass("content-pane-open")
          ) {
             closePane(true)
          }
       });
    })
 </script>