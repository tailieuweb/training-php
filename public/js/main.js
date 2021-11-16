$(window).on("load", function () {
  $(".preload").removeClass("load");
});

$(".top").on("click", function () {
  $("html, body").animate(
    {
      scrollTop: 0,
    },
    500
  );
  $(".nav-link .category").removeClass("active");
});

$(".nav-link .category").on("click", function () {
  let idCategory = $(this).data("id");
  let topCategory = $("#" + idCategory).position().top;

  // Scroll
  $("html, body").animate(
    {
      scrollTop: topCategory - 100,
    },
    500
  );

  // Set active
  $(".nav-link .category").removeClass("active");
  $(this).addClass("active");
});

$(window).bind("scroll", function () {});

function isKeyOk(keyCheck) {
  return (
    keyCheck.search("<") === -1 &&
    keyCheck.search("/>") === -1 &&
    keyCheck.search(">") === -1 &&
    keyCheck.search("<?php") === -1 &&
    keyCheck.search("<script") === -1
  );
}

function postComment() {
  let username = $("#username").val();
  let comment = $("#content").val();
  let idPost = $("#idPost").val();
  let resultAppend = null;

  if (isKeyOk(username) && isKeyOk(comment)) {
    let data =
      "idPost=" + idPost + "&comment=" + comment + "&username=" + username;

    $.ajax({
      type: "get",
      url: "../models/excute/addComment.php",
      data: data,
    });
    resultAppend =
      '<li class="comment-item animated bounceInUp">' +
      '    <p class="body"> ' +
      '   <span class="name">' +
      username +
      "</span>: " +
      comment +
      " </p>" +
      ' <p class="date-up">mới đây</p>' +
      " </li>";
  } else {
    resultAppend =
      '<div class="alert alert-danger alert-dismissible fade show animated bounceInLeft" role="alert">\n' +
      "  Đăng bình luận thất bại\n" +
      '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
      '    <span aria-hidden="true">&times;</span>\n' +
      "  </button>\n" +
      "</div>";
  }

  $("#content").val("");
  $(".list-comment").append(resultAppend);
}

ScrollOut({
  once: true,
  threshold: 0.6,
});
