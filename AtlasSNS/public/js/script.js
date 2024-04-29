
$('.menu-btn').click(function () {
  $(this).toggleClass('is-open');
  $(this).siblings('.menu').toggleClass('is-open');
});


function delete_alert(e) {
  if (!window.alert('この投稿を削除します。よろしいでしょうか？')) {
    window.alert('キャンセルされました');
    return false;
  }
  document.deleteform.submit();
};
