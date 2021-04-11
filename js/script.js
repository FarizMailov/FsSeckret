$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});

function show_login() {
    $("#ModalWindowLogin").modal("show");
}
if ($('.error').length == 1) {
    show_login();
}


$('#colorItemsCat').on('input', function(){
    let val = $(this).val();
    switch (val) {
        case '0':
            $(".squareItemCat").css('background-color', "cyan");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', 'cyan');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px cyan');
            $('.my-border').css('borderColor', 'cyan');
            $('footer').css('backgroundColor', 'cyan');
            break;
        case '1':
            $(".squareItemCat").css('background-color', "");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px ');
            $('.my-border').css('borderColor', '');
            $('footer').css('backgroundColor', '');
            break;
        case '2':
            $(".squareItemCat").css('background-color', "#e83e8c");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '#e83e8c');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #e83e8c');
            $('.my-border').css('borderColor', '#e83e8c');
            $('footer').css('backgroundColor', '#e83e8c');
            break;
        case '3':
            $(".squareItemCat").css('background-color', "#6610f2");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '#6610f2');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #6610f2');
            $('.my-border').css('borderColor', '#6610f2');
            $('footer').css('backgroundColor', '#6610f2');
            break;
        case '4':
            $(".squareItemCat").css('background-color', "#dc3545");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '#dc3545');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #dc3545');
            $('.my-border').css('borderColor', '#dc3545');
            $('footer').css('backgroundColor', '#dc3545');
            break;
        case '5':
            $(".squareItemCat").css('background-color', "#fd7e14");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '#fd7e14');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #fd7e14');
            $('.my-border').css('borderColor', '#fd7e14');
            $('footer').css('backgroundColor', '#fd7e14');
            break;
        case '6':
            $(".squareItemCat").css('background-color', "#ffc107");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '#ffc107');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #ffc107');
            $('.my-border').css('borderColor', '#ffc107');
            $('footer').css('backgroundColor', '#ffc107');
            break;
        case '7':
            $(".squareItemCat").css('background-color', "#28a745");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '#28a745');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #28a745');
            $('.my-border').css('borderColor', '#28a745');
            $('footer').css('backgroundColor', '#28a745');
            break;
        case '8':
            $(".squareItemCat").css('background-color', "#343a40");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '#343a40');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #343a40');
            $('.my-border').css('borderColor', '#343a40');
            $('footer').css('backgroundColor', '#343a40');
            break;
        case '9':
            $(".squareItemCat").css('background-color', "#f8f9fa");
            $(".squareItemCat").css('border', "2px solid black");
            $('nav').css('backgroundColor', '#f8f9fa');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #f8f9fa');
            $('.my-border').css('borderColor', '#f8f9fa');
            $('footer').css('backgroundColor', '#f8f9fa');
            break;
        case '10':
            $(".squareItemCat").css('background-color', "#007bff");
            $(".squareItemCat").css('border', "none");
            $('nav').css('backgroundColor', '#007bff');
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px #007bff');
            $('.my-border').css('borderColor', '#007bff');
            $('footer').css('backgroundColor', '#007bff');
            break;

    }
})

$('#colorItemsHomka').on('input', function(){
    let val = $(this).val();
    switch (val) {
        case '0':
            $(".squareItemHomka").css('background-color', "cyan");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', 'cyan');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px cyan');
            $('.my-border').css('borderColor', 'cyan')
            $('footer').css('backgroundColor', 'cyan');
            $('')
            break;
        case '1':
            $(".squareItemHomka").css('background-color', "");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px ');
            $('.my-border').css('borderColor', '')
            $('footer').css('backgroundColor', '');
            break;
        case '2':
            $(".squareItemHomka").css('background-color', "#e83e8c");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '#e83e8c');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px #e83e8c');
            $('.my-border').css('borderColor', '#e83e8c')
            $('footer').css('backgroundColor', '#e83e8c');
            break;
        case '3':
            $(".squareItemHomka").css('background-color', "#6610f2");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '#6610f2');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px #6610f2');
            $('.my-border').css('borderColor', '#6610f2')
            $('footer').css('backgroundColor', '#6610f2');
            break;
        case '4':
            $(".squareItemHomka").css('background-color', "#dc3545");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '#dc3545');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px #dc3545');
            $('.my-border').css('borderColor', '#dc3545')
            $('footer').css('backgroundColor', '#dc3545');
            break;
        case '5':
            $(".squareItemHomka").css('background-color', "#fd7e14");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '#fd7e14');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px #fd7e14');
            $('.my-border').css('borderColor', '#fd7e14')
            $('footer').css('backgroundColor', '#fd7e14');
            break;
        case '6':
            $(".squareItemHomka").css('background-color', "#ffc107");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '#ffc107');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px #ffc107');
            $('.my-border').css('borderColor', '#ffc107')
            $('footer').css('backgroundColor', '#ffc107');
            break;
        case '7':
            $(".squareItemHomka").css('background-color', "#28a745");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '#28a745');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px #28a745');
            $('.my-border').css('borderColor', '#28a745')
            $('footer').css('backgroundColor', '#28a745');
            break;
        case '8':
            $(".squareItemHomka").css('background-color', "#343a40");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '#343a40');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px #343a40');
            $('.my-border').css('borderColor', '#343a40')
            $('footer').css('backgroundColor', '#343a40');
            break;
        case '9':
            $(".squareItemHomka").css('background-color', "#f8f9fa");
            $(".squareItemHomka").css('border', "2px solid black");
            $('nav').css('backgroundColor', '#f8f9fa');
            $('.shadow-lg-homkacat').css('boxShadow', '0 0 20px #f8f9fa');
            $('.my-border').css('borderColor', '#f8f9fa')
            $('footer').css('backgroundColor', '#f8f9fa');
            break;
        case '10':
            $(".squareItemHomka").css('background-color', "#007bff");
            $(".squareItemHomka").css('border', "none");
            $('nav').css('backgroundColor', '#007bff');
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px #007bff');
            $('.my-border').css('borderColor', '#007bff')
            $('footer').css('backgroundColor', '#007bff');
            break;

    }
})

$('#colorItemsDragon').on('input', function(){
    let val = $(this).val();
    switch (val) {
        case '0':
            $(".squareItemDragon").css('background-color', "cyan");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', 'cyan');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px cyan');
            $('.my-border').css('borderColor', 'cyan')
            $('footer').css('backgroundColor', 'cyan');
            $('')
            break;
        case '1':
            $(".squareItemDragon").css('background-color', "");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px ');
            $('.my-border').css('borderColor', '')
            $('footer').css('backgroundColor', '');
            break;
        case '2':
            $(".squareItemDragon").css('background-color', "#e83e8c");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '#e83e8c');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #e83e8c');
            $('.my-border').css('borderColor', '#e83e8c')
            $('footer').css('backgroundColor', '#e83e8c');
            break;
        case '3':
            $(".squareItemDragon").css('background-color', "#6610f2");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '#6610f2');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #6610f2');
            $('.my-border').css('borderColor', '#6610f2')
            $('footer').css('backgroundColor', '#6610f2');
            break;
        case '4':
            $(".squareItemDragon").css('background-color', "#dc3545");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '#dc3545');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #dc3545');
            $('.my-border').css('borderColor', '#dc3545')
            $('footer').css('backgroundColor', '#dc3545');
            break;
        case '5':
            $(".squareItemDragon").css('background-color', "#fd7e14");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '#fd7e14');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #fd7e14');
            $('.my-border').css('borderColor', '#fd7e14')
            $('footer').css('backgroundColor', '#fd7e14');
            break;
        case '6':
            $(".squareItemDragon").css('background-color', "#ffc107");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '#ffc107');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #ffc107');
            $('.my-border').css('borderColor', '#ffc107')
            $('footer').css('backgroundColor', '#ffc107');
            break;
        case '7':
            $(".squareItemDragon").css('background-color', "#28a745");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '#28a745');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #28a745');
            $('.my-border').css('borderColor', '#28a745')
            $('footer').css('backgroundColor', '#28a745');
            break;
        case '8':
            $(".squareItemDragon").css('background-color', "#343a40");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '#343a40');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #343a40');
            $('.my-border').css('borderColor', '#343a40')
            $('footer').css('backgroundColor', '#343a40');
            break;
        case '9':
            $(".squareItemDragon").css('background-color', "#f8f9fa");
            $(".squareItemDragon").css('border', "2px solid black");
            $('nav').css('backgroundColor', '#f8f9fa');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #f8f9fa');
            $('.my-border').css('borderColor', '#f8f9fa')
            $('footer').css('backgroundColor', '#f8f9fa');
            break;
        case '10':
            $(".squareItemDragon").css('background-color', "#007bff");
            $(".squareItemDragon").css('border', "none");
            $('nav').css('backgroundColor', '#007bff');
            $('.shadow-lg-dragon').css('boxShadow', '0 0 20px #007bff');
            $('.my-border').css('borderColor', '#007bff')
            $('footer').css('backgroundColor', '#007bff');
            break;

    }
})

$('#colorText').on('input', function(){
    let val = $(this).val();
    switch (val) {
        case '0':
            $(".squareText").css('text-color', "cyan");
            $(".squareText").css('border', "none");
            break;
        case '1':
            $(".squareText").css('background-color', "transparent");
            $(".squareText").css('border', "none");
            break;
        case '2':
            $(".squareText").css('background-color', "#e83e8c");
            $(".squareText").css('border', "none");
            break;
        case '3':
            $(".squareText").css('background-color', "#6610f2");
            $(".squareText").css('border', "none");
            break;
        case '4':
            $(".squareText").css('background-color', "#dc3545");
            $(".squareText").css('border', "none");
            break;
        case '5':
            $(".squareText").css('background-color', "#fd7e14");
            $(".squareText").css('border', "none");
            break;
        case '6':
            $(".squareText").css('background-color', "#ffc107");
            $(".squareText").css('border', "none");
            break;
        case '7':
            $(".squareText").css('background-color', "#28a745");
            $(".squareText").css('border', "none");
            break;
        case '8':
            $(".squareText").css('background-color', "#343a40");
            $(".squareText").css('border', "none");
            break;
        case '9':
            $(".squareText").css('background-color', "#f8f9fa");
            $(".squareText").css('border', "2px solid black");
            break;
        case '10':
            $(".squareText").css('background-color', "#007bff");
            $(".squareText").css('border', "none");
            break;

    }
})

let theme;

$(function () {

    if ($('#cat').length == 1) {
        theme = localStorage.getItem('themes-cat');
    }
    if ($('#homka').length == 1) {
        theme = localStorage.getItem('themes-homka');
    }
    if ($('#dragon').length == 1) {
        theme = localStorage.getItem('themes-dragon');
    }
    if (theme != null) {
        if (theme == 'dark') {
            $('body').removeClass('bg-light');
            $('body').addClass('bg-dark')
            $('#check-theme-cat').prop('checked', true);
        } else {
            $('body').removeClass('bg-dark');
            $('body').addClass('bg-light')
            $('#check-theme-cat').prop('checked', false);
        }
    }
    if (theme != null) {
        if (theme == 'dark') {
            $('body').removeClass('bg-light');
            $('body').addClass('bg-dark')
            $('#check-theme-homka').prop('checked', true);
        } else {
            $('body').removeClass('bg-dark');
            $('body').addClass('bg-light')
            $('#check-theme-homka').prop('checked', false);
        }
    }
    if (theme != null) {
        if (theme == 'dark') {
            $('body').removeClass('bg-light');
            $('body').addClass('bg-dark')
            $('#check-theme-dragon').prop('checked', true);
        } else {
            $('body').removeClass('bg-dark');
            $('body').addClass('bg-light')
            $('#check-theme-dragon').prop('checked', false);
        }
    }

$('#colorItemsCat').change(function () {
    let val = $(this).val();
    switch (val) {
        case '0':
            localStorage.setItem('colors', 'cyan');
            break;
        case '1':
            localStorage.setItem('colors', 'transparent');
            break;
        case '2':
            localStorage.setItem('colors', '#e83e8c');
            break;
        case '3':
            localStorage.setItem('colors', '#6610f2');
            break;
        case '4':
            localStorage.setItem('colors', '#dc3545');
            break;
        case '5':
            localStorage.setItem('colors', '#fd7e14');
            break;
        case '6':
            localStorage.setItem('colors', '#ffc107');
            break;
        case '7':
            localStorage.setItem('colors', '#28a745');
            break;
        case '8':
            localStorage.setItem('colors', '#343a40');
            break;
        case '9':
            localStorage.setItem('colors', '#f8f9fa');
            break;
        case '10':
            localStorage.setItem('colors', '#007bff');
            break;

    }
})

$('#colorItemsHomka').change(function () {
    let val = $(this).val();
    switch (val) {
        case '0':
            localStorage.setItem('colors', 'cyan');
            break;
        case '1':
            localStorage.setItem('colors', 'greenyellow');
            break;
        case '2':
            localStorage.setItem('colors', '#e83e8c');
            break;
        case '3':
            localStorage.setItem('colors', '#6610f2');
            break;
        case '4':
            localStorage.setItem('colors', '#dc3545');
            break;
        case '5':
            localStorage.setItem('colors', '#fd7e14');
            break;
        case '6':
            localStorage.setItem('colors', '#ffc107');
            break;
        case '7':
            localStorage.setItem('colors', '#28a745');
            break;
        case '8':
            localStorage.setItem('colors', '#343a40');
            break;
        case '9':
            localStorage.setItem('colors', '#f8f9fa');
            break;
        case '10':
            localStorage.setItem('colors', '#007bff');
            break;

    }
})

$('#colorItemsDragon').change(function () {
    let val = $(this).val();
    switch (val) {
        case '0':
            localStorage.setItem('colors', 'cyan');
            break;
        case '1':
            localStorage.setItem('colors', 'greenyellow');
            break;
        case '2':
            localStorage.setItem('colors', '#e83e8c');
            break;
        case '3':
            localStorage.setItem('colors', '#6610f2');
            break;
        case '4':
            localStorage.setItem('colors', '#dc3545');
            break;
        case '5':
            localStorage.setItem('colors', '#fd7e14');
            break;
        case '6':
            localStorage.setItem('colors', '#ffc107');
            break;
        case '7':
            localStorage.setItem('colors', '#28a745');
            break;
        case '8':
            localStorage.setItem('colors', '#343a40');
            break;
        case '9':
            localStorage.setItem('colors', '#f8f9fa');
            break;
        case '10':
            localStorage.setItem('colors', '#007bff');
            break;

    }
})




    let colors;

    if ($('#cat').length == 1) {
        /*theme = localStorage.getItem();
        colors = localStorage.getItem();*/
    }


$('#check-theme-cat').on('change', function () {
    if ($('#check-theme-cat').prop('checked')) {
        $('body').removeClass('bg-light');
        $('body').addClass('bg-dark');
        if ($('#cat').length == 1) {
            localStorage.setItem('themes-cat', 'dark');
        }
        localStorage.setItem('themes-cat', 'dark');
    } else {
        $('body').removeClass('bg-dark');
        $('body').addClass('bg-light');
        if ($('#cat').length == 1) {
            localStorage.setItem('themes-cat', 'light');
        }
        localStorage.setItem('themes-cat', 'light');

    }
     })

$('#check-theme-homka').on('change', function () {
    if ($('#check-theme-homka').prop('checked')) {
        $('body').removeClass('bg-light');
        $('body').addClass('bg-dark');
        if ($('#homka').length == 1) {
            localStorage.setItem('themes-homka', 'dark');
        }
        localStorage.setItem('themes-homka', 'dark');
    } else {
        $('body').removeClass('bg-dark');
        $('body').addClass('bg-light');
        if ($('#homka').length == 1) {
            localStorage.setItem('themes-homka', 'light');
        }
        localStorage.setItem('themes-homka', 'light');

    }
})

$('#check-theme-dragon').on('change', function () {
    if ($('#check-theme-dragon').prop('checked')) {
        $('body').removeClass('bg-light');
        $('body').addClass('bg-dark');
        if ($('#dragon').length == 1) {
            localStorage.setItem('themes-dragon', 'dark');
        }
        localStorage.setItem('themes-dragon', 'dark');
    } else {
        $('body').removeClass('bg-dark');
        $('body').addClass('bg-light');
        if ($('#dragon').length == 1) {
            localStorage.setItem('themes-dragon', 'light');
        }
        localStorage.setItem('themes-dragon', 'light');

    }
});
    $('[type="checkbox"]').click(function () {
        $.post('index.php', {
            id_photo: Number($(this).prop("id").replace(/[^\d]/g, '')),
            status: $(this).prop('checked')
        });
    });
});

$("#upload_file").submit(function (e) {
    e.preventDefault();
    $.post(
    'index.php',
        new FormData(this),
    );
});



'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Balls = function () {
    function Balls(context, buffer) {
        _classCallCheck(this, Balls);

        this.context = context;
        this.buffer = buffer;
    }

    _createClass(Balls, [{
        key: 'setup',
        value: function setup() {
            this.gainNode = this.context.createGain();
            this.source = this.context.createBufferSource();
            this.source.buffer = this.buffer;
            this.source.connect(this.gainNode);
            this.gainNode.connect(this.context.destination);
            this.gainNode.gain.setValueAtTime(1, this.context.currentTime);
        }
    }, {
        key: 'play',
        value: function play() {
            this.setup();
            this.source.start(this.context.currentTime);
        }
    }, {
        key: 'stop',
        value: function stop() {
            var ct = this.context.currentTime + 1;
            this.gainNode.gain.exponentialRampToValueAtTime(.1, ct);
            this.source.stop(ct);
        }
    }]);

    return Balls;
}();

var Buffer = function () {
    function Buffer(context, urls) {
        _classCallCheck(this, Buffer);

        this.context = context;
        this.urls = urls;
        this.buffer = [];
    }

    _createClass(Buffer, [{
        key: 'loadSound',
        value: function loadSound(url, index) {
            var request = new XMLHttpRequest();
            request.open('get', url, true);
            request.responseType = 'arraybuffer';
            var thisBuffer = this;
            request.onload = function () {
                thisBuffer.context.decodeAudioData(request.response, function (buffer) {
                    thisBuffer.buffer[index] = buffer;
                    if (index == thisBuffer.urls.length - 1) {
                        thisBuffer.loaded();
                    }
                });
            };
            request.send();
        }
    }, {
        key: 'getBuffer',
        value: function getBuffer() {
            var _this = this;

            this.urls.forEach(function (url, index) {
                _this.loadSound(url, index);
            });
        }
    }, {
        key: 'loaded',
        value: function loaded() {
            _loaded = true;
        }
    }, {
        key: 'getSound',
        value: function getSound(index) {
            return this.buffer[index];
        }
    }]);

    return Buffer;
}();

var balls = null,
    preset = 0,
    _loaded = false;
var path = '../audio/';
var sounds = [path + 'sound1.mp3', path + 'sound2.mp3', path + 'sound3.mp3', path + 'sound4.mp3', path + 'sound5.mp3', path + 'sound6.mp3', path + 'sound7.mp3', path + 'sound8.mp3', path + 'sound9.mp3', path + 'sound10.mp3', path + 'sound11.mp3', path + 'sound12.mp3', path + 'sound13.mp3', path + 'sound14.mp3', path + 'sound15.mp3', path + 'sound16.mp3', path + 'sound17.mp3', path + 'sound18.mp3', path + 'sound19.mp3', path + 'sound20.mp3', path + 'sound21.mp3', path + 'sound22.mp3', path + 'sound23.mp3', path + 'sound24.mp3', path + 'sound25.mp3', path + 'sound26.mp3', path + 'sound27.mp3', path + 'sound28.mp3', path + 'sound29.mp3', path + 'sound30.mp3', path + 'sound31.mp3', path + 'sound32.mp3', path + 'sound33.mp3', path + 'sound34.mp3', path + 'sound35.mp3', path + 'sound36.mp3'];
var context = new (window.AudioContext || window.webkitAudioContext)();

function playBalls() {
    var index = parseInt(this.dataset.note) + preset;
    balls = new Balls(context, buffer.getSound(index));
    balls.play();
}

function stopBalls() {
    balls.stop();
}

var buffer = new Buffer(context, sounds);
var ballsSound = buffer.getBuffer();
var buttons = document.querySelectorAll('.b-ball_bounce');
buttons.forEach(function (button) {
    button.addEventListener('mouseenter', playBalls.bind(button));
    button.addEventListener('mouseleave', stopBalls);
});

function ballBounce(e) {
    var i = e;
    if (e.className.indexOf(" bounce") > -1) {
        return;
    }
    toggleBounce(i);
}

function toggleBounce(i) {
    i.classList.add("bounce");
    function n() {
        i.classList.remove("bounce");
        i.classList.add("bounce1");
        function o() {
            i.classList.remove("bounce1");
            i.classList.add("bounce2");
            function p() {
                i.classList.remove("bounce2");
                i.classList.add("bounce3");
                function q() {
                    i.classList.remove("bounce3");
                }
                setTimeout(q, 300);
            }
            setTimeout(p, 300);
        }
        setTimeout(o, 300);
    }
    setTimeout(n, 300);
}

var array1 = document.querySelectorAll('.b-ball_bounce');
var array2 = document.querySelectorAll('.b-ball_bounce .b-ball__right');

for (var i = 0; i < array1.length; i++) {
    array1[i].addEventListener('mouseenter', function () {
        ballBounce(this);
    });
}

for (var i = 0; i < array2.length; i++) {
    array2[i].addEventListener('mouseenter', function () {
        ballBounce(this);
    });
}

var l = ["49", "50", "51", "52", "53", "54", "55", "56", "57", "48", "189", "187", "81", "87", "69", "82", "84", "89", "85", "73", "79", "80", "219", "221", "65", "83", "68", "70", "71", "72", "74", "75", "76", "186", "222", "220"];
var k = ["90", "88", "67", "86", "66", "78", "77", "188", "190", "191"];
var a = {};
for (var e = 0, c = l.length; e < c; e++) {
    a[l[e]] = e;
}
for (var _e = 0, _c = k.length; _e < _c; _e++) {
    a[k[_e]] = _e;
}

/*
document.addEventListener('keydown', function (j) {
    var i = j.target;
    if (j.which in a) {
        var index = parseInt(a[j.which]);
        balls = new Balls(context, buffer.getSound(index));
        balls.play();
        var ball = document.querySelector('[data-note="' + index + '"]');
        toggleBounce(ball);
    }
});
*/


