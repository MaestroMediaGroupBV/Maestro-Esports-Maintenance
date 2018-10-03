var timer = setInterval(nextImage, 4000);
var curImage = 0;
var numImages = 2;

function nextImage() {
    var e;
    // remove showMe class from current image
    e = document.getElementById("slideimg" + curImage);
    removeClass(e, "showMe");

    // compute next image
    curImage++;
    if (curImage > numImages - 1) {
        curImage = 0;
    }

    // add showMe class to next image
    e = document.getElementById("slideimg" + curImage);
    addClass(e, "showMe");
}

function addClass(elem, name) {
    var c = elem.className;
    if (c) c += " ";  // if not blank, add a space separator
    c += name;
    elem.className = c;
}

function removeClass(elem, name) {
    var c = elem.className;
    elem.className = c.replace(name, "").replace(/   /g, " ").replace(/^ | $/g, "");  // remove name and extra blanks
}