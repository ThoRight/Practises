$(document).ready(function () {
    $(".fadeDiv").click(function () {
        let clickedId = $(this).attr('id');
        $("#" + clickedId).addClass('hidden');
        $(".fadeDiv").not("#" + clickedId).removeClass('hidden');
    });
});
