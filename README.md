
Postcodify 그누보드 플러그인
============================

[Postcodify](http://postcodify.poesis.kr/) 새주소 우편번호 검색 API를
그누보드와 쉽게 연동할 수 있도록 만든 플러그인입니다.
이 플러그인을 사용하면 그누보드에서 공식 지원하는 DAUM 우편번호 검색 API를
Postcodify 무료 API로 변경할 수 있습니다.

아래의 설명은 DAUM 우편번호 검색 API로 전환한 버전 (5.0.16 이상, 4.37.21 이상) 기준입니다.

전환 과도기 버전 (5.0.14~15, 4.37.19~20) 사용시 정상 작동하지 않을 수도 있습니다.

DAUM 우편번호 검색 API로 전환하지 않은 버전 (5.0.13 이하, 4.37.18 이하) 사용하시는 분은
이 플러그인을 설치하지 말고, Postcodify의 [에뮬레이션](http://postcodify.poesis.kr/guide/emulation) 기능을 활용하시기 바랍니다.


설치 방법 (그누보드5)
---------------------

(1) 그누보드의 `plugin` 폴더 내에 `postcodify`라는 이름의 폴더를 생성합니다.

(2) 플러그인의 `zip.css`, `zip.html`, `zip.js` 파일을 위에서 생성한 폴더로 복사합니다.

(3) 그누보드에서 다음의 파일들을 찾아

  - `adm/member_form.php`
  - `skin/member/스킨명/register_form.skin.php`
  - 그 밖에 주소입력 기능이 필요한 모든 페이지

아래의 내용을 맨 아래에 추가합니다.

    <script src="<?php echo G5_PLUGIN_URL ?>/postcodify/zip.js"></script>

(4) 회원가입, 회원정보 변경, 관리자 페이지 등에서 우편번호 검색을 해봅니다.


설치 방법 (그누보드4)
---------------------

(1) 그누보드의 `extend` 폴더 내에 `postcodify`라는 이름의 폴더를 생성합니다.

(2) 플러그인의 `zip.css`, `zip.html`, `zip.js` 파일을 위에서 생성한 폴더로 복사합니다.

(3) 그누보드에서 다음의 파일들을 찾아

  - `adm/member_form.php`
  - `skin/member/스킨명/register_form.skin.php`
  - 그 밖에 주소입력 기능이 필요한 모든 페이지

아래의 내용을 맨 아래에 추가합니다.

    <script src="<?php echo $g4['path']; ?>/extend/postcodify/zip.js"></script>

(4) 회원가입, 회원정보 변경, 관리자 페이지 등에서 우편번호 검색을 해봅니다.


커스터마이징
------------

지도 링크는 기본값으로 [다음 지도](http://map.daum.net/)를 사용하도록 셋팅됩니다.
네이버 지도, 구글 지도 등으로 바꾸기를 원하실 경우
`zip.html`에서 `mapLinkProvider` 설정을 `"naver"` 또는 `"google"`로 변경하시면 됩니다.

참고 항목에는 법정동·리 및 공동주택명만 입력됩니다.
참고 항목에 지번까지 입력하기를 원하실 경우
`zip.html`에서 `useFullJibeon` 설정을 `true`로 변경하시면 됩니다.

Postcodify 검색 스크립트인 `search.min.js` 파일을 로딩하는 경로는
반드시 원본 그대로 사용하시기 바랍니다.
이 파일을 다른 경로에 복사하여 사용하실 경우 무료 API 서버와의 호환성이 떨어질 수 있습니다.

그 밖의 설정 변경은 Postcodify 공식 사이트의
[매뉴얼](http://postcodify.poesis.kr/guide/jquery_plugin)을 참조하십시오.


라이센스
--------

이 플러그인은 LGPL v2.1 또는 그 이후 버전에 따라 자유롭게 사용할 수 있습니다.
