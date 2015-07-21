
/**
 *  Postcodify - 도로명주소 우편번호 검색 프로그램 (그누보드 플러그인)
 * 
 *  Copyright (c) 2014-2015, Poesis <root@poesis.kr>
 *  
 *  이 프로그램은 자유 소프트웨어입니다. 이 소프트웨어의 피양도자는 자유
 *  소프트웨어 재단이 공표한 GNU 약소 일반 공중 사용 허가서 (GNU LGPL) 제3판
 *  또는 그 이후의 판을 임의로 선택하여, 그 규정에 따라 이 프로그램을
 *  개작하거나 재배포할 수 있습니다.
 * 
 *  이 프로그램은 유용하게 사용될 수 있으리라는 희망에서 배포되고 있지만,
 *  특정한 목적에 맞는 적합성 여부나 판매용으로 사용할 수 있으리라는 묵시적인
 *  보증을 포함한 어떠한 형태의 보증도 제공하지 않습니다. 보다 자세한 사항에
 *  대해서는 GNU 약소 일반 공중 사용 허가서를 참고하시기 바랍니다.
 * 
 *  GNU 약소 일반 공중 사용 허가서는 이 프로그램과 함께 제공됩니다.
 *  만약 허가서가 누락되어 있다면 자유 소프트웨어 재단으로 문의하시기 바랍니다.
 */

(function($) {
    
    // 우편번호 검색 단추를 찾는다.
    
    var button = $("button[onclick^='win_zip']");
    
    if (!button.size() && typeof g4_url !== "undefined") {
        button = $("a[onclick^='win_zip']");
    }
    
    // 우편번호 검색 단추가 없는 경우 실행을 종료한다.
    
    if (!button.size()) {
        return;
    }
    
    // 일단 검색 단추를 사용하지 못하도록 한다.
    
    button.attr("disabled", "disabled");
    
    // Postcodify 팝업 레이어 플러그인을 로딩한다.
    
    var cdnPrefix = navigator.userAgent.match(/MSIE [56]\./) ? "http:" : "";
    $.ajaxSetup({ cache: true });
    $.getScript(cdnPrefix + "//cdn.poesis.kr/post/popup.min.js");
    $.ajaxSetup({ cache: false });
    
    // 검색 단추에 이벤트를 부착한다.
    
    button.each(function() {
        
        // 검색 단추가 여러 개인 경우, 각 단추를 별도로 처리한다.
        
        var thisbutton = $(this);
        
        // 우편번호 및 주소 입력란에 Postcodify 클래스를 적용한다.
        
        var container = $(this).parent();
        container.find("input[name='mb_zip']").addClass("postcodify_postcode5");
        container.find("input[name='mb_zip1']").addClass("postcodify_postcode6_1");
        container.find("input[name='mb_zip2']").addClass("postcodify_postcode6_2");
        container.find("input[name='mb_addr1']").addClass("postcodify_address");
        container.find("input[name='mb_addr2']").addClass("postcodify_details");
        container.find("input[name='mb_addr3']").addClass("postcodify_extra_info");
        
        // 지번 주소 입력란을 처리한다.
        
        var jibeon_entry = container.find("input[name='mb_addr_jibeon']");
        if (jibeon_entry.size()) {
            jibeon_entry.addClass("postcodify_jibeon_address");
        } else {
            jibeon_entry = $('<input type="hidden" class="postcodify_jibeon_address" value="" />');
            jibeon_entry.appendTo(container);
        }
        
        // 기존의 onclick 이벤트를 삭제한다.
        
        thisbutton.removeAttr("onclick").off("click");
        
        // 팝업 레이어 플러그인 로딩이 끝날 때까지 기다렸다가 셋팅한다.
        
        var waitInterval;
        waitInterval = setInterval(function() {
            if (typeof $.fn.postcodify === "undefined" || typeof $.fn.postcodifyPopUp === "undefined") {
                return;
            } else {
                clearInterval(waitInterval);
                if (thisbutton.data("initialized") !== "Y") {
                    thisbutton.data("initialized", "Y").off("click").removeAttr("disabled");
                    thisbutton.postcodifyPopUp({
                        inputParent : container,
                        onSelect : function(selectedEntry) {
                            var altjibeon = container.find("span#mb_addr_jibeon");
                            if (altjibeon.size()) {
                                altjibeon.text("지번주소 : " + jibeon_entry.val());
                            }
                        }
                    });
                }
            }
        }, 100);
        
        // 우편번호 입력란을 클릭하면 자동으로 팝업 레이어가 나타나도록 한다.
        
        container.find("input[name^='mb_zip']").click(function() {
            if ($(this).val() === "") {
                thisbutton.click();
            }
        });
    });
    
} (jQuery));
