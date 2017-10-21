$(function () {
    $('.expand').on("click", function () {
        var num = this.id.match(/\d+/)[0];
        $("#side-sub-" + num).show(500);
        $('#expand-' + num).css('display', 'none');
        $('#collapse-' + num).css('display', 'block');
    });
    $('.collapse').on("click", function () {
        var num = this.id.match(/\d+/)[0];
        $("#side-sub-" + num).hide(500);
        $('#expand-' + num).css('display', 'block');
        $('#collapse-' + num).css('display', 'none');
    });
});