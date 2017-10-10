/**
 * Created by admin on 2017/6/5.
 */
define('MOD_ROOT/homepage-cats/homepage-cats', function (require, exports, module) {

    var $ = require('jquery');

    function init() {
        addEvents();
    }
    function addEvents() {
        $('.left-panel').on('mouseenter','.homepage-cat-has-submenu',function () {
            var $this = $(this);
            console.log('@');
            $this.find('.homepage-cat-name').addClass('hovered');
            $this.find('.homepage-cat-submenu').show();
        })

        $('.left-panel').on('mouseleave','.homepage-cat-has-submenu',function () {
            var $this = $(this);
            $this.find('.homepage-cat-name').removeClass('hovered');
            $this.find('.homepage-cat-submenu').hide();
        })
    }


    module.exports.__id = 'homepage-cats';
    module.exports.init = init;
});
