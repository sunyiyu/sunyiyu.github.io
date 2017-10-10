/**
 * Created by admin on 2017/6/5.
 */
define('MOD_ROOT/headline/headline', function (require, exports, module) {

    var $ =require('jquery');
    require('./headline.css');
    var Slider = require('MOD_ROOT/slider/slider');


    function init() {
        var slider = new Slider({
            $target:$('.headline-slider')
        });
    }

    module.exports.__id = 'headline';
    module.exports.init = init;

});