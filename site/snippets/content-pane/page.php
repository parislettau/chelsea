<?= css(['assets/css/page.css']) ?>

<div class="content-pane-text-outer page-pane-wrapper" style="background-color:white">
    <article>
        <div class="text-block" data-content-type="<?= $page->template() ?>" data-title="<?= $page->title() ?>" data-author="<?= $page->author() ?>">
            <!-- title -->
            <div class="title">
                <h1><?= $page->title() ?></h2>
            </div>
        </div>
        <div class="content">
            <?= $page->text()->kirbyText() ?>
        </div>
    </article>