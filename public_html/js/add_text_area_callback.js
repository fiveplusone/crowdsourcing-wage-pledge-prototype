// from http://stackoverflow.com/a/1621309
function add_text_area_callback(textArea, callback, delay) {
    var timer = null;
    textArea.onchange = function() {  // changed to onchange from onkeypress
        if (timer) {
            window.clearTimeout(timer);
        }
        timer = window.setTimeout( function() {
            timer = null;
            callback();
        }, delay );
    };

    textArea = null;
}

