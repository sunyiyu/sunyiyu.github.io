/**
 * Created by admin on 2017/6/5.
 */
define('MOD_ROOT/pop-keywords/pop-keywords', function (require, exports, module) {

    var $ = require('jquery');

    require('../template/template');
    // {if item_index == 0 || item_index == 5}

    var template ='\
    {for item in items}\
    {if item_index % 5 == 0}\
    <div class="pure-u-1-2 {if item_index == 0} first-group  {elseif item_index == 5} second-group {/if}">\
        <ol class="plain">\
    {/if}\
            <li>\
                <span class="num">${parseInt(item_index)+1}</span>\
                <a href="/search/?via=home&amp;keyword=%E7%B2%BD%E5%AD%90&amp;cat=1001">\
                    <span class="ellipsis">${item.words}</span>\
                </a>\
                <i class="icon icon-keyword-${item.direction}"></i>\
            </li>\
    {if item_index % 5 == 4} \
        </ol>\
    </div>\
    {/if}\
    {/for}\
    ';

    var PopKeywords = function ($target) {
        this.init($target);
    };

    PopKeywords.prototype = {
        init:function ($target) {
            var _this = this;
            _this.$target = $target;
            _this.get();
        },
        get: function () {
            var _this = this;
            $.ajax({
                url: 'https://www.easy-mock.com/mock/59350bc491470c0ac1011ba2/xiachufang/hotsearch?jsonp_param_name=callback',
                dataType: 'jsonp',
                jsonpCallback: 'xxx',
                success: function (data) {
                    _this.set(data);
                }
            });
        },
        set: function (data) {
            var _this = this;
            var htmlStr = template.process({items: data.hotsearch});
            _this.$target.find('.pure-g').html(htmlStr);
        }
    }
    function init($target) {

        new PopKeywords($target);
    }

    module.exports.__id = 'pop-keywords';
    module.exports.init = init;
});
