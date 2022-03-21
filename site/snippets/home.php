<?php if ($site->toggle_cq()->toBool() === true) : ?>
    <?php snippet('cq') ?>
<?php endif ?>

<section class="home">
    <!-- <div class="background-image" ></div> -->
    <div class="left">
        <div class="logo" onclick="openMenu()"><?php snippet('components/logo') ?></div>
    </div>
    <div class="right">
        <div class="subscribe">
            <span>Subscribe to the <span class="link"><a href="/subscribe">mailing list</a></span></span>
        </div>
        <br />
        <div class="hours">
            <ul>
                <?php foreach ($site->hours()->toStructure() as $hours) : ?>
                    <li><?= $hours->day(); ?><span>: </span><?= $hours->open()->toDate('g:i a') ?>–<?= $hours->close()->toDate('g:i a') ?></li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="status">
            <span><br /><?php if ($site->status()->isnotEmpty()) : ?><?= $site->status() ?><?php endif ?></span>
        </div>
    </div>
    <div class="bottom">
        <div class="details"><?= $site->address()->html() ?><a href="mailto:<?= $site->email() ?>" target="_blank" rel="noopener noreferrer"><span class="email"><?= $site->email()->kirbyText() ?></span></a></div>
        <div class="datetime">
            <div id="time">
                <?php
                date_default_timezone_set('Australia/Melbourne');
                echo date('h:i A'); ?>



            </div>
            <div class="date">
                <div class="content"><?php echo date('j\/m\/Y'); ?></div>
            </div>

        </div>
    </div>
</section>



<script>
    var clockElement = document.getElementById("time");

    function updateClock(clock) {
        clock.innerHTML = new Date().toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit'
        });
    }
    setInterval(function() {
        updateClock(clockElement);
    }, 1000);
</script>