/*
 Template Name: Annex - Bootstrap 4 Admin Dashboard
 Author: Mannatthemes
 Website: www.mannatthemes.com
 File: Main js
 */
!function(e) {
    "use strict";

    var t=function() {
        this.$body=e("body"),
        this.$wrapper=e("#wrapper"),
        this.$btnFullScreen=e("#btn-fullscreen"),
        this.$leftMenuButton=e(".button-menu-mobile"),
        this.$menuItem=e(".has_sub > a")
    }

    ;

    t.prototype.initSlimscroll=function() {
        e(".slimscrollleft").slimscroll( {
                height:"auto", position:"right", size:"10px", color:"#9ea5ab"
            }

        )
    }

    ,
    t.prototype.initLeftMenuCollapse=function() {
        var e=this;

        this.$leftMenuButton.on("click", function(t) {
                t.preventDefault(), e.$body.toggleClass("fixed-left-void"), e.$wrapper.toggleClass("enlarged")
            }

        )
    }

    ,
    t.prototype.initComponents=function() {
        e('[data-toggle="tooltip"]').tooltip(),
        e('[data-toggle="popover"]').popover()
    }

    ,
    t.prototype.initFullScreen=function() {
        this.$btnFullScreen.on("click", function(e) {
                e.preventDefault(), document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement?document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen():document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
            }

        )
    }

    ,
    t.prototype.initMenu=function() {
        var t=this;

        function n() {
            var t=e(document).height();
            t>e(".body-content").height()&&e(".body-content").height(t)
        }

        t.$menuItem.on("click", function() {
                var o=e(this).parent(), i=o.find("> ul"); return t.$body.hasClass("sidebar-collapsed")||(i.is(":visible")?i.slideUp(300, function() {
                            o.removeClass("nav-active"), e(".body-content").css( {
                                    height:""
                                }

                            ), n()
                        }

                    ):(e(".has_sub").each(function() {
                                var t=e(this); t.hasClass("nav-active")&&t.find("> ul").slideUp(300, function() {
                                        t.removeClass("nav-active")
                                    }

                                )
                            }

                        ), o.addClass("nav-active"), i.slideDown(300, function() {
                                n()
                            }

                        ))),  !1
            }

        )
    }

    ,
    t.prototype.activateMenuItem=function() {
        e("#sidebar-menu a").each(function() {
                this.href==window.location.href&&(e(this).addClass("active"), e(this).parent().addClass("active"), e(this).parent().parent().prev().addClass("active"), e(this).parent().parent().parent().addClass("active"), e(this).parent().parent().prev().click())
            }

        )
    }

    ,
    t.prototype.Preloader=function() {
        e(window).load(function() {
                e("#status").fadeOut(), e("#preloader").delay(350).fadeOut("slow"), e("body").delay(350).css( {
                        overflow:"visible"
                    }

                )
            }

        )
    }

    ,
    t.prototype.init=function() {
        this.initSlimscroll(),
        this.initLeftMenuCollapse(),
        this.initComponents(),
        this.initFullScreen(),
        this.initMenu(),
        this.activateMenuItem(),
        this.Preloader()
    }

    ,
    e.MainApp=new t,
    e.MainApp.Constructor=t
}

(window.jQuery),
function(e) {
    "use strict";
    window.jQuery.MainApp.init()
}

(),
$("body").bind("cut copy paste", function(e) {
        e.preventDefault()
    }

),
$("body").on("contextmenu", function(e) {
        return !1
    }

);