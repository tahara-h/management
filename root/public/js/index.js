//モーダルウィンドウの表示・非表示
$(function() {
    $('.modalOpen').on('click', function(){
        $('.modalContent, .modalBackground').show();
    });
    $('.modalClose, .modalBackground').on('click', function(){
        $('.modalContent, .modalBackground').hide();
    })
});