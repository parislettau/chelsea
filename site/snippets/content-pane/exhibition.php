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

                        <?php if ($page->curator()->isNotEmpty()) : ?>
                            <div class="curator">
                                Curated by
                                <span class="name"><?= $page->curator() ?>
                                </span>
                            </div>
                        <?php endif ?>

                        <?php if ($page->location()->isNotEmpty()) : ?>
                            <span class=" location">
                                <?= $page->location() ?>
                            </span>
                        <?php endif ?>
                        <?php if ($page->open()->isNotEmpty()) : ?>
                            <span><?= $page->open()->toDate('d M') ?></span><?php endif ?><?php if ($page->open()->isNotEmpty()) : ?><span>—<?= $page->close()->toDate('d M Y') ?></span><?php endif ?>

                        <div class="artists">
                            <?php if ($page->artists()->isNotEmpty()) : ?><?= $page->artists() ?><?php endif ?>
                        </div>
                    </div>
                    <div class="carousel">
                        <!-- <?php if ($image = $page->image()) : ?>
                     <img src="<?= $image->url() ?>" alt="" srcset="<?= $image->srcset('default') ?>">
                     <?php endif ?> -->


                        <div class="embla">
                            <div class="embla__viewport">
                                <div class="embla__container">
                                    <?php $images = $page->images()->sortBy('sort') ?>
                                    <?php foreach ($images as $image) : ?>
                                        <div class="embla__slide">
                                            <div class="embla__slide__inner">
                                                <figure>
                                                    <img class="embla__slide__img" src="<?= $image->url() ?>" alt="" srcset="<?= $image->srcset('default') ?>">
                                                </figure>
                                                <figcaption>
                                                    <?= $image->caption() ?>
                                                </figcaption>
                                            </div>
                                        </div>
                                    <?php endforeach ?>

                                </div>
                            </div>
                            <!-- Dots -->
                            <!-- Buttons -->
                            <button class="embla__button embla__button--prev" type="button">
                                <svg class="embla__button__svg" viewBox="137.718 -1.001 366.563 643.999">
                                    <path d="M428.36 12.5c16.67-16.67 43.76-16.67 60.42 0 16.67 16.67 16.67 43.76 0 60.42L241.7 320c148.25 148.24 230.61 230.6 247.08 247.08 16.67 16.66 16.67 43.75 0 60.42-16.67 16.66-43.76 16.67-60.42 0-27.72-27.71-249.45-249.37-277.16-277.08a42.308 42.308 0 0 1-12.48-30.34c0-11.1 4.1-22.05 12.48-30.42C206.63 234.23 400.64 40.21 428.36 12.5z"></path>
                                </svg>
                            </button>
                            <button class="embla__button embla__button--next" type="button">
                                <svg class="embla__button__svg" viewBox="0 0 238.003 238.003">
                                    <path d="M181.776 107.719L78.705 4.648c-6.198-6.198-16.273-6.198-22.47 0s-6.198 16.273 0 22.47l91.883 91.883-91.883 91.883c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.071-103.039a15.741 15.741 0 0 0 4.64-11.283c0-4.13-1.526-8.199-4.64-11.313z"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Dots -->
                        <div class="embla__dots"></div>

                        <?= js([
                            // 'assets/js/jquery-3.4.1.min.js',
                            'assets/embla/index.js',
                            // 'assets/embla/dotButtons.js',
                            // 'assets/embla/prevAndNextButtons.js',

                        ]) ?>
                    </div>
                    <div class="content">
                        <?= $page->text()->kirbyText() ?>
                    </div>
                    <div class="calendar" style="background-color: <?= $page->font() ?>; color: <?= $page->theme() ?>">
                        <!-- Add THE BODY SPEAKS BEFORE IT BEGINS TO TALK as an event reminder to your iCal -->
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