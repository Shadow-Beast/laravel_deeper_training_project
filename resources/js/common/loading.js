function onReady(callback) {
    var intervalId = window.setInterval(function () {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalId);
            callback.call(this);
        }
    }, 1000);
}

function setVisible(selector, visible) {
    visible ? $('#loading').fadeIn() : $('#loading').fadeOut();
}

onReady(function () {
    setVisible('#loading', false);
});
