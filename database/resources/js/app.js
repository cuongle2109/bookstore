// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
// Or using the CommonJS version:
const ClassicEditor = require('@ckeditor/ckeditor5-build-classic');

ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        window.editor = editor;
    })
    .catch(error => {
        console.error('There was a problem initializing the editor.', error);
    });

dateTime = function () {
    var now = new Date();
    var hours = now.getHours();
    var greet;

    if (hours < 12) {
        greet = "Good Morning,";
    } else if (hours < 16) {
        greet = "Good Afternoon,";
    } else {
        greet = "Good Evening,";
    }

    $('#time').html(greet);
};

menuDropdowns = function () {
    $('.dropdown').each(function () {
        const links = $(this).find('.links');
        const h = links.height();

        links.css('height', '0');

        $(this).click(function () {
            if ($(this).toggleClass('js-opened').hasClass('js-opened')) {
                links.css('height', h);
            } else {
                links.css('height', 0);
            }
            ;

        });
    });
};

$(document).ready(function () {

    menuDropdowns();
    dateTime();

    $('.js-toggle-menu').click(function () {
        $('.menu').toggleClass('active');
    });
});

require('./bootstrap');
require('./dashboard');
require('./product');
