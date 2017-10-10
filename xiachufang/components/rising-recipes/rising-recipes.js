/**
 * Created by admin on 2017/6/5.
 */
define('MOD_ROOT/rising-recipes/rising-recipes', function (require, exports, module) {

    var $ = require('jquery');
    var Slider = require('MOD_ROOT/slider/slider');

    require('MOD_ROOT/rising-recipes/rising-recipes.css');

    function init() {
        var slider = new Slider({
            $target:$('.J-rising-recipes'),
            autoPlay: false
        });
    }

    module.exports.__id = 'rising-recipes';
    module.exports.init = init;
});