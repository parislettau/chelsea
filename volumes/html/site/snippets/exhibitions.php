<div class="exhibitions-list" id="exhibitions">
    <?php if ($site->page('exhibitions')->isListed()) : ?>
        <?php foreach ($site->page('exhibitions')->children() as $show) : ?>
            <div class="card">
                <a href="<?= $show->url() ?>" class="content-pane-trigger">
                    <div class="show-title " style="background-color:<?= $show->theme() ?>; color:<?= $show->font() ?>">
                        <?= $show->title() ?>
                    </div>
                </a>
            </div>

        <?php endforeach ?>
    <?php endif ?>

</div>