// step
$(document).ready(function () {
    var currentGfgStep, nextGfgStep, previousGfgStep;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);
    
    $(".next-step").click(function () {
    
    currentGfgStep = $(this).parent();
    nextGfgStep = $(this).parent().next();
    
    $("#progressbar li").eq($("fieldset")
        .index(nextGfgStep)).addClass("active");
    
    nextGfgStep.show();
    currentGfgStep.animate({ opacity: 0 }, {
        step: function (now) {
            opacity = 1 - now;
    
            currentGfgStep.css({
                'display': 'none',
                'position': 'relative'
            });
            nextGfgStep.css({ 'opacity': opacity });
        },
        duration: 500
    });
    setProgressBar(++current);
    });
    
    $(".previous-step").click(function () {
    
    currentGfgStep = $(this).parent();
    previousGfgStep = $(this).parent().prev();
    
    $("#progressbar li").eq($("fieldset")
        .index(currentGfgStep)).removeClass("active");
    
    previousGfgStep.show();
    
    currentGfgStep.animate({ opacity: 0 }, {
        step: function (now) {
            opacity = 1 - now;
    
            currentGfgStep.css({
                'display': 'none',
                'position': 'relative'
            });
            previousGfgStep.css({ 'opacity': opacity });
        },
        duration: 500
    });
    setProgressBar(--current);
    });
    
    function setProgressBar(currentStep) {
    var percent = parseFloat(100 / steps) * current;
    percent = percent.toFixed();
    $(".progress-bar")
        .css("width", percent + "%")
    }
    
    $(".submit").click(function () {
    return false;
    })
    });

// load quận huyện
    var localpicker = new LocalPicker({
    province: "ls_province",
    district: "ls_district",
    ward: "ls_ward"
    });
    var options = {
        
            province: 'ls_province',	
            district: 'ls_district',	
            ward: 'ls_ward',			
            getValueBy: 'id',           
            provinceText: 'Chọn tỉnh / thành phố',
            districtText: 'Chọn quận / huyện',
            districtNoText: 'Địa phương này không có quận / huyện',
            wardText: 'Chọn phường / xã',
            wardNoText: 'Địa phương này không có phường / xã',
            emptyValue: " ",
            hideEmptyValueOption: true,
            hidePlaceHolderOption: true,
            provincePrefix: false,
            districtPrefix: true,
            wardPrefix: true,
            levelAsAttribute: true,
            levelAttributeName: "data-level",
    };
        function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
    var c = jQuery(b);
    c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
    }
    String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
    b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
    }), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
    }), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
    }), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity__butons").find(".qty"),
    b = parseFloat(a.val()),
    c = parseFloat(a.attr("max")),
    d = parseFloat(a.attr("min")),
    e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
    });