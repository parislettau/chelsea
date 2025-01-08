<meta name=”robots” content=”noindex”>

<?php if ($kirby->user()) : ?>
    <?php if ($page->status() == 'draft') : ?>
        <p>Please change page status from <strong style="color: red;">“Draft”</strong> to <strong style="color: green">“Public”</strong> before previewing.</p>

    <?php else : ?>

        <head>
            <meta http-equiv="refresh" content="0; url='https://99percent.gallery/<?= $page->id() ?>'" />
        </head>

        <body>
            <p>Please follow <a href="https://99percent.gallery/<?= $page->id() ?>">this link</a> to preview the page.</p>
        </body>
    <?php endif ?>
<?php else : ?>

    <head>
        <meta http-equiv="refresh" content="0; url='https://99percent.gallery/<?= $page->id() ?>'" />

    </head>
<?php endif ?>