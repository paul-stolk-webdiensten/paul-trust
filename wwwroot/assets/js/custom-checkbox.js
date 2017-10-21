$(function () {
    $('.unchecked').on("click", function () {
        $(this).hide();
        $(this).next().show();
        $('input[type="hidden"][name="' + this.id + '"]').val("1");
    });
    $('.checked').on("click", function () {
        $(this).hide();
        $(this).prev().show();
        $('input[type="hidden"][name="' + this.id + '"]').val("0");
    });
});