
/* Postcodify GNUBOARD plugin JS */

$(function() {
    setTimeout(function() {
        $(".win_zip_find").off();
        $(".win_zip_find").click(function(event) {
            var url = $(this).attr("href");
            if (url.indexOf(g5_bbs_url + "/zip.php") === 0) {
                url = url.replace(g5_bbs_url, g5_url + "/plugin/postcodify");
            }
            window.open(url, "winZip", "left=50,top=50,width=650,height=550,resizable=yes,scrollbars=yes");
            event.preventDefault();
        });
    }, 100);
});
