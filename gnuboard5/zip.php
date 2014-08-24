<?php

include_once('../../common.php');

$g5['title'] = '우편번호 검색';

function sanitize_var_js($str)
{
    return str_replace(array('"', "'", '\\', '<', '>', '&', "\0"), '', $str);
}

include_once(G5_PATH.'/head.sub.php');
?>

<link rel="stylesheet" href="./zip.css">

<h1 id="postcodify_title">우편번호 검색</h1>

<!-- 넘어온 변수들 정리 -->

<script type="text/javascript">
    
    var frm_name = "<?php echo sanitize_var_js($_GET['frm_name']); ?>";
    var frm_zip1 = "<?php echo sanitize_var_js($_GET['frm_zip1']); ?>";
    var frm_zip2 = "<?php echo sanitize_var_js($_GET['frm_zip2']); ?>";
    var frm_addr1 = "<?php echo sanitize_var_js($_GET['frm_addr1']); ?>";
    var frm_addr2 = "<?php echo sanitize_var_js($_GET['frm_addr2']); ?>";
    var frm_addr3 = "<?php echo sanitize_var_js($_GET['frm_addr3']); ?>";
    var frm_jibeon = "<?php echo sanitize_var_js($_GET['frm_jibeon']); ?>";

</script>

<!-- 검색창이 표시되는 곳 -->

<div id="postcodify"></div>

<!-- 검색 스크립트 로딩 경로는 가능하면 변경하지 마세요 -->

<script src="//d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>

<!-- Postcodify 설정 -->

<script type="text/javascript">
    
    $("#postcodify").postcodify({
        insertPostcode6 : "#entry_postcode6",
        insertAddress : "#entry_address",
        insertDetails : "#entry_details",
        insertExtraInfo : "#entry_extra_info",
        insertEnglishAddress : "#entry_english_address",
        insertJibeonAddress : "#entry_jibeon_address",
        useFullJibeon : false,
        focusDetails : false,
        hideSummary : true,
        mapLinkProvider : "daum",
        afterSelect : function(selectedEntry) {
            var of = window.opener.$("form[name="+frm_name+"]");
            var pc = $("#entry_postcode6").val().split("-");
            if (pc.length == 2) {
                of.find("input[name="+frm_zip1+"]").val(pc[0]);
                of.find("input[name="+frm_zip2+"]").val(pc[1]);
            } else {
                of.find("input[name="+frm_zip1+"]").val("");
                of.find("input[name="+frm_zip2+"]").val("");
            }
            of.find("input[name="+frm_addr1+"]").val($("#entry_address").val());
            of.find("input[name="+frm_addr2+"]").val("").focus();
            of.find("input[name="+frm_addr3+"]").val($("#entry_extra_info").val());
            window.opener.$("#"+frm_jibeon).text("지번주소 : " + $("#entry_jibeon_address").val());
            window.open("", "_self", "");
            window.close();
        }
    });
    
</script>

<!-- 주소 선택시 임시로 사용하는 태그들, 화면에는 표시되지 않음 -->

<div id="entry_box" style="display:none">
    <p><label for="entry_postcode6">우편번호</label><input type="text" id="entry_postcode6" /></p>
    <p><label for="entry_address">도로명주소</label><input type="text" id="entry_address" /></p>
    <p><label for="entry_details">상세주소</label><input type="text" id="entry_details" /></p>
    <p><label for="entry_extra_info">참고항목</label><input type="text" id="entry_extra_info" /></p>
    <p><label for="entry_english_address">영문주소</label><input type="text" id="entry_english_address" /></p>
    <p><label for="entry_jibeon_address">지번주소</label><input type="text" id="entry_jibeon_address" /></p>
</div>

<!-- 검색 도움말 -->

<div id="search_guide">
    1. 도로명주소로 검색 : 도로명과 건물번호를 함께 입력하세요. 예) 세종대로 110<br />
    2. 지번 주소로 검색 : "동" 또는 "리" 이름과 번지수를 함께 입력하세요. 예) 연산동 1000<br />
    3. 건물명으로 검색 : 빌딩 또는 아파트 이름을 입력하세요. 예) 국제빌딩, 래미안<br />
    4. 사서함으로 검색 : 사서함명과 번호를 입력하세요. 예) 광화문우체국사서함 123-4<br />
    5. English : Please enter your exact address. ex) 110 Sejong-daero, 1000 Yeonsan-dong<br />
    <hr />
    &nbsp; &nbsp; ※ 시·군·구·읍·면 등은 쓰시지 않아도 되지만, 쓰실 경우 반드시 <u>띄어쓰기</u>를 해주세요.<br />
    <hr />
    &nbsp; &nbsp; ※ 건물명보다는 도로명주소 또는 지번 주소로 검색하시는 것이 빠르고 정확합니다.<br /> 
    &nbsp; &nbsp; &#12288; 도로명에 "○○번길" 등의 숫자가 있는 경우에도 잊지 말고 써 주세요.
</div>

<div class="win_btn">
    <button type="button" onclick="window.close();">창닫기</button>
</div>
    
<?php
include_once(G5_PATH.'/tail.sub.php');
?>
