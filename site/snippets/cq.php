<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<style>
    #mydiv {
        position: fixed;
        z-index: 9000;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.4);
        box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
        /* filter: blur(25px); */
        -webkit-backdrop-filter: blur(25px);
        backdrop-filter: blur(25px);
        display: none;
        flex-direction: column;
        flex-wrap: wrap;
    }

    #close {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 15px;
        line-height: 19px;
        text-align: right;
        font-family: loos-compressed, sans-serif;
        font-weight: 700;
        padding: 7px;
        color: black;
        opacity: 0.8;
    }

    .mydivcontent {
        padding: 10px;
    }

    .unset {
        all: unset;
    }


    figure {
        max-height: 80%;
        max-width: 90%;
        margin: auto;
        display: table;
        filter: none;
    }

    img {
        max-height: 80vh;
        max-width: 100%;
        object-fit: cover;
        margin: auto;
    }

    figcaption {
        display: table-caption;
        caption-side: bottom;
    }
</style>
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
                date.setTime(date.getTime() + 24 * 60 * 60 * 1000 * 180);
                // date.setTime(date.getTime() + 60);
                $.cookie('alert', true, {
                    expires: date
                });
            }
        }, 5000);
    });
</script>