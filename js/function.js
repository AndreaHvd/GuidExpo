function starting() {
    let logo = document.querySelector('.logo__debut');
    let style = window.getComputedStyle(logo, null);
    let opacity = style.getPropertyValue('opacity');
    let interval = setInterval(function() {
        opacity = opacity - 0.01;
        // logo.style.opacity = '"' + opacity + '"';
        logo.setAttribute('style', 'opacity: ' + opacity);
        if (opacity <= 0) {
            // logo.style.opacity = "0";
            logo.setAttribute('style', 'opacity: 0');
            window.location.href = "langue.php";
            clearInterval(interval);
        }
    }, 10);

}

function clear_avatar(list) {
    list.forEach(function(element) {
        element.checked = false;
    });
}

function check_list(list) {
    let temp = Array.from(list).find(function(element) {
        return element.checked == true;
    });
    if (temp != undefined) {

        return temp.value;
    }
    return temp;
}

function timeString(secs) {
    // HOURS, MINUTES, SECONDS
    let ss = Math.floor(secs),
        hh = Math.floor(ss / 3600),
        mm = Math.floor((ss - (hh * 3600)) / 60);
    ss = ss - (hh * 3600) - (mm * 60);

    // RETURN FORMATTED TIME
    if (hh > 0) { mm = mm < 10 ? "0" + mm : mm; }
    ss = ss < 10 ? "0" + ss : ss;
    return hh > 0 ? `${hh}:${mm}:${ss}` : `${mm}:${ss}`;
};