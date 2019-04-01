"use strict";

function _instanceof(left, right) { if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) { return right[Symbol.hasInstance](left); } else { return left instanceof right; } }

function _classCallCheck(instance, Constructor) { if (!_instanceof(instance, Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

$(document).ready(function () {
  var ButtonUp =
  /*#__PURE__*/
  function () {
    function ButtonUp(selectorParent, id, classButton) {
      var name = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 'вниз';
      var scrollHide = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 20000;
      var time = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 500;

      _classCallCheck(this, ButtonUp);

      this.selectorParent = selectorParent;
      this.id = id;
      this.classButton = classButton;
      this.name = name;
      this.time = time;
      this.scrollHide = scrollHide;
    } //добавить кнопку и событие на нее


    _createClass(ButtonUp, [{
      key: "appendButton",
      value: function appendButton() {
        var $btn = $("<button id = \"".concat(this.id, "\">").concat(this.name, "</button>"));
        $btn.addClass("".concat(this.classButton)); //var $btn = $(`<button class = "${this.classButton}">${this.name}</button>`);

        $btn.appendTo(this.selectorParent);
        $btn.hide(0);
        var time = this.time; // делаем для того, чтобы получить по замыканию

        $btn.on('click', function () {
          $('html, body').animate({
            scrollTop: $('body').height()
          }, time);
        });
        this.scrollFunc($btn);
      } //событие на кнопку

    }, {
      key: "scrollFunc",
      value: function scrollFunc($btn) {
        var scrollHide = this.scrollHide; // делаем для того, чтобы получить по замыканию

        $(document).on('scroll', function () {
          var heightBottom = $('body').height() - 1000;
          var $windowTop = $(window).scrollTop();

          if ($windowTop > scrollHide && $btn.css('display') === 'none' && $windowTop < heightBottom) {
            $btn.fadeIn(1000);
          } else if ($windowTop <= scrollHide) {
            $btn.fadeOut(1000);
          } else if ($windowTop >= heightBottom) {
            $btn.fadeOut(1000);
          }
        });
      }
    }]);

    return ButtonUp;
  }();

  var btn = new ButtonUp('body', 'fix-bottom', 'btn btn-primary btn-lg btn-block', '<i class="fa fa-arrow-circle-down fa-2x" aria-hidden="true"></i>', 100, 2000);
  btn.appendButton();
});