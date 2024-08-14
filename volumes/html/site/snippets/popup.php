<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<style>
    /* iframe {
        border: none;
        max-height: 80vh;
    } */
</style>
<!-- Draggable DIV -->
<div id="cxq">
    <?php foreach ($site->popup()->toBlocks() as $block) : ?>
        <div id="<?= $block->id() ?>" class="cxq-container block block-type-<?= $block->type() ?> ">
            <?= $block ?>
        </div>

    <?php endforeach ?>
    <div id="close"><span style="cursor:pointer;" onclick="closePopup()">(close)</span>
    </div>

</div>

<script>
    function closePopup() {
        $('#cxq').remove();
    }

    function showPopup() {
        $('#cxq').css("display", "flex")
        $('#cxq').hide()
        $('#cxq').fadein(1000);
    }

    $(document).ready(function() {
        setTimeout(function() {
            if (!$.cookie('cxq')) {
                $('#cxq').css("display", "flex").hide().fadeIn(1000);
                $('#cxq').show();
                var date = new Date();
                // date.setTime(date.getTime() + 24 * 60 * 60 * 1000 * 180); // 24 hrs x 60 secs x 60 mins x 1000 ms x 180 days
                date.setTime(date.getTime()); // 24 hrs x 60 secs x 60 mins x 1000 ms x 180 days
                // date.setTime(date.getTime() + 60);
                $.cookie('alert', true, {
                    expires: date
                });
            }
        }, 3000);
    });
</script>