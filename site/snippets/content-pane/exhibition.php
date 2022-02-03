    <meta name="keywords" content="<?php if ($page->template() == 'exhibition') : ?> <?= $page->author() ?>, <?= $page->venue() ?>, <?= $page->artists() ?>,<?php endif ?>">
    <div class="content-pane-text-outer" style="background-color:<?= $page->theme() ?>;color:<?= $page->font() ?>">
        <div class="content-pane-text-inner">
            <article>
                <div class="text-block" data-content-type="<?= $page->template() ?>" data-title="<?= $page->title() ?>" data-author="<?= $page->author() ?>">
                    <!-- title -->
                    <div class="title">
                        <h1><?= $page->title() ?></h2>
                    </div>
                    <div class="info" style="border-bottom: 1px solid <?= $page->font() ?>; border-top: 1px solid <?= $page->font() ?>">
                        <div class="times">
                            <?php if ($page->curator()->isNotEmpty()) : ?>
                                <span>Curated by <span><?= $page->curator() ?></span></span>
                            <?php endif ?>

                            <?php if ($page->location()->isNotEmpty()) : ?>
                                <span><?= $page->location() ?></span>
                            <?php endif ?>
                            <?php if ($page->open()->isNotEmpty()) : ?>
                                <span><?= $page->open()->toDate('d M') ?></span><?php endif ?><?php if ($page->open()->isNotEmpty()) : ?><span>—<?= $page->close()->toDate('d M Y') ?></span><?php endif ?>
                        </div>
                        <div class="artists">
                            <?php if ($page->artists()->isNotEmpty()) : ?><?= $page->artists() ?><?php endif ?>
                        </div>
                    </div>
                    <div class="carousel">
                        <!-- <?php if ($image = $page->image()) : ?>
                     <img src="<?= $image->url() ?>" alt="" srcset="<?= $image->srcset('default') ?>">
                     <?php endif ?> -->

                        <div class="embla">
                            <div class="embla__container">
                                <?php $images = $page->images()->sortBy('sort') ?>
                                <?php foreach ($images as $image) : ?>
                                    <div class="embla__slide">
                                        <figure>
                                            <img src="<?= $image->url() ?>" alt="" srcset="<?= $image->srcset('default') ?>">
                                        </figure>
                                        <figcaption>
                                            <?= $image->caption() ?>
                                        </figcaption>

                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <!-- Dots -->
                        <div class="embla__dots"></div>
                        <script type="text/javascript">
                            var emblaNode = document.querySelector('.embla')
                            var options = {
                                loop: true,
                            }

                            var embla = EmblaCarousel(emblaNode, options)
                        </script>



                    </div>
                    <div class="content">
                        <?= $page->text()->kirbyText() ?>
                    </div>
                    <div class="calendar" style="background-color: <?= $page->font() ?>; color: <?= $page->theme() ?>">
                        Add THE BODY SPEAKS BEFORE IT BEGINS TO TALK as an event reminder to your iCal
                    </div>
                    <?php
                    // using the `toStructure()` method, we create a structure collection
                    $events = $page->events()->toStructure();
                    if ($events != null) :
                    ?>
                        <div class="events">
                            <h1>Related Events:</h1>
                            <?php
                            // using the `toStructure()` method, we create a structure collection
                            // $events = $page->events()->toStructure();

                            // we can then loop through the entries and render the individual fields
                            foreach ($events as $event) : ?>
                                <div class="event">
                                    <div class="left">
                                        <div class="category"><?= $event->category()->html() ?></div>
                                        <div class="headline"><?= $event->headline()->kirbytext() ?></div>
                                    </div>
                                    <div class="right">
                                        <div class="details"><?= $event->details()->kirbytext() ?></div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>


                    <div class="footer"></div>
                </div>
            </article>
        </div>
    </div>