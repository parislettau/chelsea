history.scrollRestoration = "manual";
// ========================================================================================
// OPEN CONTENT PANE
// ========================================================================================
function openPane(url, push) {
  $(".content-pane").toggle();
  $("body").addClass("content-pane-open");
  $(".content-pane-wrapper").addClass("show");
  $(".content-pane").addClass("show");

  $.get(url, function (html) {
    var $html = $("<div />").append(html);
    var title = $html.find("title").text();
    if (push)
      history.pushState(
        {
          pane: true,
        },
        title,
        url
      );
    document.title = title;
    $(".content-pane-text").html($html.find(".content-pane-text").html());
    afterLoadPane();
  });
}

// ========================================================================================
// CLOSE CONTENT PANE
// ========================================================================================

function closePane(push) {
  $(".content-pane-wrapper").removeClass("show");
  setTimeout(function () {
    $("body").removeClass("content-pane-open");
  }, 500);
  setTimeout(function () {
    $(".content-pane").removeClass("show");
  }, 500);

  document.title = "99%";
  $(window).trigger("pane-closed");
  setTimeout(function () {
    $(".content-pane-text").html("");
  }, 750);
  // if (push) history.pushState(null, document.title, window.home);
  history.pushState(null, document.title, "/");

  // history.pushState(null, document.title, '/')
  setTimeout(function () {
    $(".content-pane").toggle();
  }, 750);
}

// ========================================================================================
// DOCUMENT READY FUNCTIONS
// ========================================================================================
$(document).ready(function () {
  $(".video").fitVids();

  window.addEventListener("popstate", function (event) {
    if (event.state && event.state.pane) {
      openPane(document.location.href, false);
    } else {
      closePane();
    }
  });

  window.scroll({
    behavior: "smooth",
  });

  setTimeout(function () {
    $("body").addClass("ready");
  }, 500);

  // ========================================================================================
  // OPEN/CLOSE CONTENT PANE TRIGGER
  // ========================================================================================

  // OPEN
  $("body").on("click", "a.content-pane-trigger", function (event) {
    event.preventDefault();
    var url = this.href;
    openPane(url, true);
  });

  //CLOSE
  $(".content-pane-close").on("click", function () {
    closePane(true);
  });

  // ========================================================================================
  // OPEN/CLOSE SUPPORT PANE TRIGGER
  // ========================================================================================
  $("body").on("click", ".support-trigger", function () {
    //      event.preventDefault()//      var url = this.href
    openSupport();
  });

  $("body").on("click", ".content-pane-support-trigger", function () {
    //      event.preventDefault()//      var url = this.href
    openSupport();
  });

  $(".support-close").on("click", function () {
    closeSupport();
  });
  // ========================================================================================
  // OPEN/CLOSE FILTER PANE TRIGGER
  // ========================================================================================
  $("body").on("click", ".filter-trigger", function () {
    //      event.preventDefault()//      var url = this.href
    openFilter();
  });

  $(".filter-close").on("click", function () {
    closeFilter();
  });

  // ========================================================================================
  // OPEN/CLOSE MENU PANE TRIGGER
  // ========================================================================================
  $("body").on("click", ".menu-pane-trigger", function () {
    //      event.preventDefault()//      var url = this.href
    openMenu();
  });

  $(".menu-pane-close").on("click", function () {
    closeMenu();
  });

  // ========================================================================================
  // AFTER PANE LOAD TRIGGER
  // ========================================================================================
  window.afterLoadPane = function () {
    icPrevent();
  };

  icPrevent();

  $("body").on("complete.ic", function (event, el, data, status, xhr, reqId) {
    var title = $(".content-pane").html(xhr.responseText).find("title").text();
    document.title = title;
  });
});

function icPrevent() {
  $("a[ic-get-from]").on("click", function (event) {
    event.preventDefault();
  });
}
