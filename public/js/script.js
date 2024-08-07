
$('.menu_btn').click(function () {
  $(this).toggleClass('is_open');
  $(this).siblings('.menu').toggleClass('is_open');
});


$(function () {
  // 編集ボタン(class="js-modal_open")が押されたら発火
  $('.js_modal_open').on('click', function () {
    // モーダルの中身(class="js_modal")の表示
    $('.js_modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js_modal_close)が押されたら発火
  $('.js_modal_close').on('click', function () {
    // モーダルの中身(class="js_modal")を非表示
    $('.js_modal').fadeOut();
    return false;
  });

});

const fileSelect = document.getElementById("fileSelect");
const fileElem = document.getElementById("fileElem");

fileSelect.addEventListener("click", (e) => {
  if (fileElem) {
    fileElem.click();
  }
}, false);
