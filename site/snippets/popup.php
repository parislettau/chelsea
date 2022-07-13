<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<style>
    /* iframe {
        border: none;
        max-height: 80vh;
    } */
</style>
<!-- Draggable DIV -->
<div id="cxq">
    <div class="cxq-container">
        <?= $site->popup()->toBlocks() ?>
    </div>

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