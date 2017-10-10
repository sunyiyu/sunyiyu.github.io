define('MOD_ROOT/topbar/topbar', function (require, exports, module) {

    var $ = require('jquery');

    function init() {
        $('.logo').click(function () {
            alert('欢迎光临下厨房');
        })
    }


    module.exports.__id = 'topbar';
    module.exports.init = init;
});