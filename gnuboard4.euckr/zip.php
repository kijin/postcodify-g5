<?php

include_once('./_common.php');

$g4['title'] = '�����ȣ �˻�';

function sanitize_var_js($str)
{
    return str_replace(array('"', "'", '\\', '<', '>', '&', "\0"), '', $str);
}

include_once($g4['path'].'/head.sub.php');
?>

<link rel="stylesheet" href="./zip.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<h1 id="postcodify_title">�����ȣ �˻�</h1>

<!-- �Ѿ�� ������ ���� -->

<script type="text/javascript">
    
    var frm_name = "<?php echo sanitize_var_js($_GET['frm_name']); ?>";
    var frm_zip1 = "<?php echo sanitize_var_js($_GET['frm_zip1']); ?>";
    var frm_zip2 = "<?php echo sanitize_var_js($_GET['frm_zip2']); ?>";
    var frm_addr1 = "<?php echo sanitize_var_js($_GET['frm_addr1']); ?>";
    var frm_addr2 = "<?php echo sanitize_var_js($_GET['frm_addr2']); ?>";
    var frm_addr3 = "<?php echo sanitize_var_js($_GET['frm_addr3']); ?>";
    var frm_jibeon = "<?php echo sanitize_var_js($_GET['frm_jibeon']); ?>";

</script>

<!-- �˻�â�� ǥ�õǴ� �� -->

<div id="postcodify"></div>

<!-- �˻� ��ũ��Ʈ �ε� ��δ� �����ϸ� �������� ������ -->

<script src="//d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>

<!-- Postcodify ���� -->

<script type="text/javascript">
    
    window.resizeTo(650, 600);
    
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
            window.opener.$("#"+frm_jibeon).text("�����ּ� : " + $("#entry_jibeon_address").val());
            window.open("", "_self", "");
            window.close();
        }
    });
    
</script>

<!-- �ּ� ���ý� �ӽ÷� ����ϴ� �±׵�, ȭ�鿡�� ǥ�õ��� ���� -->

<div id="entry_box" style="display:none">
    <p><label for="entry_postcode6">�����ȣ</label><input type="text" id="entry_postcode6" /></p>
    <p><label for="entry_address">���θ��ּ�</label><input type="text" id="entry_address" /></p>
    <p><label for="entry_details">���ּ�</label><input type="text" id="entry_details" /></p>
    <p><label for="entry_extra_info">�����׸�</label><input type="text" id="entry_extra_info" /></p>
    <p><label for="entry_english_address">�����ּ�</label><input type="text" id="entry_english_address" /></p>
    <p><label for="entry_jibeon_address">�����ּ�</label><input type="text" id="entry_jibeon_address" /></p>
</div>

<!-- �˻� ���� -->

<div id="search_guide">
    1. ���θ��ּҷ� �˻� : ���θ�� �ǹ���ȣ�� �Բ� �Է��ϼ���. ��) ������� 110<br />
    2. ���� �ּҷ� �˻� : "��" �Ǵ� "��" �̸��� �������� �Բ� �Է��ϼ���. ��) ���굿 1000<br />
    3. �ǹ������� �˻� : ���� �Ǵ� ����Ʈ �̸��� �Է��ϼ���. ��) ��������, ���̾�<br />
    4. �缭������ �˻� : �缭�Ը�� ��ȣ�� �Է��ϼ���. ��) ��ȭ����ü���缭�� 123-4<br />
    5. English : Please enter your exact address. ex) 110 Sejong-daero, 1000 Yeonsan-dong<br />
    <hr />
    &nbsp; &nbsp; �� �á��������������� ���� ������ �ʾƵ� ������, ���� ��� �ݵ�� <u>����</u>�� ���ּ���.<br />
    <hr />
    &nbsp; &nbsp; �� �ǹ����ٴ� ���θ��ּ� �Ǵ� ���� �ּҷ� �˻��Ͻô� ���� ������ ��Ȯ�մϴ�.<br /> 
    &nbsp; &nbsp; &#12288; ���θ� "�ۡ۹���" ���� ���ڰ� �ִ� ��쿡�� ���� ���� �� �ּ���.
</div>

<div class="win_btn">
    <button type="button" onclick="window.close();">â�ݱ�</button>
</div>
    
<?php
include_once($g4['path'].'/tail.sub.php');
?>
