/*!
 * jQuery jqCart Plugin v1.1.0
 * requires jQuery v1.9 or later
 *
 * http://incode.pro/
 *
 * Date: 2016-03-06 12:35 <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
 */
(function(c) {
    var a, g, b = "",
        m = 0,
        p = !1,
        l = c('<div class="jqcart-cart-label"><span class="jqcart-total-cnt">0</span></div>'),
        k = {
            buttons: ".add_item",
            cartLabel: "body",
            handler: "/",
            currency: "$"
        },
        d = {
            init: function(e) {
                k = c.extend(k, e);
                a = d.getStorage();
                if (null !== a && Object.keys(a).length) {
                    for (var f in a) a.hasOwnProperty(f) && (m += a[f].count);
                    p = !0
                }
                l.prependTo(k.cartLabel)[p ? "show" : "hide"]().on("click", d.openCart).find(".jqcart-total-cnt").text(m);
                c(document).on("click", k.buttons, d.addToCart).on("click", ".jqcart-layout", function(e) {
                    e.target === this && d.hideCart()
                }).on("click", ".jqcart-incr", d.changeAmount).on("input keyup", ".jqcart-amount", d.changeAmount).on("click", ".jqcart-del-item", d.delFromCart).on("submit", ".jqcart-orderform", d.sendOrder).on("reset", ".jqcart-orderform", d.hideCart);
                return !1
            },
            addToCart: function(e) {
                e.preventDefault();
                g = c(this).data();
                if ("undefined" === typeof g.id) return console.log("\u041e\u0442\u0441\u0443\u0442\u0441\u0442\u0432\u0443\u0435\u0442 ID \u0442\u043e\u0432\u0430\u0440\u0430"), !1;
                a = d.getStorage() || {};
                a.hasOwnProperty(g.id) ? a[g.id].count++ : (g.count = 1, a[g.id] = g);
                d.setStorage(a);
                d.changeTotalCnt(1);
                l.show();
                return !1
            },
            delFromCart: function() {
                var e = c(this).closest(".jqcart-tr"),
                    f = e.data("id");
                a = d.getStorage();
                d.changeTotalCnt(-a[f].count);
                delete a[f];
                d.setStorage(a);
                e.remove();
                d.recalcSum();
                return !1
            },
            changeAmount: function() {
                var e = c(this),
                    f = e.hasClass("jqcart-amount"),
                    b = +(f ? e.val() : e.data("incr")),
                    h = e.closest(".jqcart-tr").data("id");
                a = d.getStorage();
                a[h].count = f ? isNaN(b) || 1 >
                    b ? 1 : b : a[h].count + b;
                1 > a[h].count && (a[h].count = 1);
                f ? e.val(a[h].count) : e.siblings("input").val(a[h].count);
                d.setStorage(a);
                d.recalcSum();
                return !1
            },
            recalcSum: function() {
                var e = 0,
                    a, b = 0,
                    h = 0;
                c(".jqcart-tr").each(function() {
                    a = +c(".jqcart-amount", this).val();
                    b = a * c(".jqcart-price", this).text();
                    c(".jqcart-sum", this).html(b + " " + k.currency);
                    e += b;
                    h += a
                });
                c(".jqcart-subtotal strong").text(e);
                c(".jqcart-total-cnt").text(h);
                0 >= h && (l.hide(), d.hideCart());
                return !1
            },
            changeTotalCnt: function(e) {
                var a = c(".jqcart-total-cnt");
                a.text(+a.text() + e);
                return !1
            },
            openCart: function() {
                var e = 0;
                a = d.getStorage();
                b = '<p class="jqcart-cart-title">В вашем корзине</p><div class="jqcart-manage-order"><div class="jqcart-thead" style="display:none"><div></div><div>\u041d\u0430\u0438\u043c\u0435\u043d\u043e\u0432\u0430\u043d\u0438\u0435</div><div>\u041a\u043e\u043b-\u0432\u043e</div><div>\u0421\u0443\u043c\u043c\u0430</div><div></div></div>';
                var f, g = 0;
                for (f in a) a.hasOwnProperty(f) && (g =
                    parseFloat(a[f].price) * a[f].count, e += g, b += '<div class="jqcart-tr" data-id="' + a[f].id + '">', b += '<div class="jqcart-small-td jqcart-item-img"><img src="' + a[f].img + '" alt=""></div>', b += "<div>" + a[f].title + "</div>", b += '<div class="jqcart-price" style="display: none">' + a[f].price + "</div>", b += '<div><span class="jqcart-incr" data-incr="-1">&#8211;</span><input type="text" class="jqcart-amount" value="' + a[f].count + '"><span class="jqcart-incr" data-incr="1">+</span></div>', b += '<div class="jqcart-sum">' +
                    g + " " + k.currency + "</div>", b += '<div class="jqcart-small-td"><a class="jqcart-del-item">x</a></div>', b += "</div>");
                b += "</div>";
                b += '<div class="jqcart-subtotal">\u0418\u0442\u043e\u0433\u043e: <strong>' + e + "</strong> " + k.currency + "</div>";
                c('<div class="jqcart-layout"><div class="jqcart-checkout">123</div></div>').appendTo("body").find(".jqcart-checkout").html(b + '<p class="jqcart-cart-title">Контактная информация:</p><form class="jqcart-orderform"><p><span class="wideawake">Ваше имя:</span><input type="text" name="user_name"></p><p><span class="wideawake">Номер телефона:</span><input type="text" name="user_phone"></p><p class="paddingclass"><input type="submit" class="btn btn-success" value="Заказать"><input class="btn btn-warning" type="reset" value="\u0412\u0435\u0440\u043d\u0443\u0442\u044c\u0441\u044f \u043a \u043f\u043e\u043a\u0443\u043f\u043a\u0430\u043c"></p></form>');
                return !1
            },
            hideCart: function() {
                c(".jqcart-layout").fadeOut("fast", function() {
                    c(this).remove()
                });
                return !1
            },
            sendOrder: function(a) {
                a.preventDefault();
                a = c(this);
                if ("" === c.trim(c("[name=user_name]", a).val()) || "" === c.trim(c("[name=user_phone]", a).val())) return c('<p class="jqcart-error">\u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u0443\u043a\u0430\u0436\u0438\u0442\u0435 \u0441\u0432\u043e\u0435 \u0438\u043c\u044f \u0438 \u043a\u043e\u043d\u0442\u0430\u043a\u0442\u043d\u044b\u0439 \u0442\u0435\u043b\u0435\u0444\u043e\u043d!</p>').insertBefore(a).delay(3E3).fadeOut(), !1;
                c.ajax({
                    url: k.handler,
                    type: "POST",
                    dataType: "json",
                    data: {
                        orderlist: c.param(d.getStorage()),
                        userdata: a.serialize()
                    },
                    error: function() {},
                    success: function(a) {
                        c(".jqcart-checkout").html("<p>" + a.message + "</p>");
                        a.errors || setTimeout(n.clearCart, 2E3)
                    }
                })
            },
            setStorage: function(a) {
                localStorage.setItem("jqcart", JSON.stringify(a));
                return !1
            },
            getStorage: function() {
                return JSON.parse(localStorage.getItem("jqcart"))
            }
        },
        n = {
            clearCart: function() {
                localStorage.removeItem("jqcart");
                l.hide().find(".jqcart-total-cnt").text(0)(jQuery);
                d.hideCart()
            },
            openCart: d.openCart,
            test: function() {
                d.getStorage()
            }
        };
    c.jqCart = function(a) {
        if (n[a]) return n[a].apply(this, Array.prototype.slice.call(arguments, 1));
        if ("object" !== typeof a && a) c.error('\u041c\u0435\u0442\u043e\u0434 \u0441 \u0438\u043c\u0435\u043d\u0435\u043c "' + a + '" \u043d\u0435 \u0441\u0443\u0449\u0435\u0441\u0442\u0432\u0443\u0435\u0442!');
        else return d.init.apply(this, arguments)
    }
})(jQuery);