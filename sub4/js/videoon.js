function window(elem) {
    var a = document.getElementsByTagName('.thumbnail img');
    
    for (i = 0; i < a.length; i++) {
        a[i].classList.remove('.on');
    }
    elem.classList.add('.on');
}