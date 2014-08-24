
/* Postcodify GNUBOARD plugin JS */

$(function() {
    setTimeout(function() {
        $("input[name='mb_zip1']").parent().find("a").each(function() {
            $(this).removeAttr("onclick").unbind("click");
            $(this).click(function(event) {
                var url = g4_url.replace(/^https?:\/\//, '//');
                url = url + "/extend/postcodify/zip.php?frm_zip1=mb_zip1&frm_zip2=mb_zip2&frm_addr1=mb_addr1&frm_addr2=mb_addr2&frm_addr3=mb_addr3&frm_jibeon=mb_addr_jibeon";
                window.open(url, "winZip", "left=50,top=50,width=650,height=550,resizable=yes,scrollbars=yes");
                event.preventDefault();
            });
        });
    }, 100);
});
