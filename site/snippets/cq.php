<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<!-- Draggable DIV -->
<?php
$artwork = $site->cq()->toFile()
?>
<div id="mydiv">
    <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->
    <div id="close"><span style="cursor:pointer;" onclick="closePopup()">(close)</span></div>
    <figure><img src="<?= $artwork->url() ?>" alt="" class="artwork">
        <figcaption><?= $artwork->caption()->kirbytextinline() ?></figcaption>
    </figure>




    <!-- <div class="artwork" style="background-image: url('<?= $site->cq()->toFile()->url() ?>')"></div> -->
</div>

<script>
    function closePopup() {
        $('#mydiv').remove();
    }

    function showPopup() {
        $('#mydiv').css("display", "flex")
        $('#mydiv').hide()
        $('#mydiv').fadein(2000);
    }

    $(document).ready(function() {
        setTimeout(function() {
            if (!$.cookie('alert')) {
                $('#mydiv').css("display", "flex").hide().fadeIn(1000);
                $('#mydiv').show();
                var date = new Date();
                // date.setTime(date.getTime() + 24 * 60 * 60 * 1000 * 180); // 24 hrs x 60 secs x 60 mins x 1000 ms x 180 days
                date.setTime(date.getTime()); // 24 hrs x 60 secs x 60 mins x 1000 ms x 180 days
                // date.setTime(date.getTime() + 60);
                $.cookie('alert', true, {
                    expires: date
                });
            }
        }, 5000);
    });
</script>