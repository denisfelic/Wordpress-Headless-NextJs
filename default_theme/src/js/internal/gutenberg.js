window.addEventListener('load', (event) => {
    let anchors = document.querySelectorAll('.acf-block-preview');
    if(anchors == null) {
        return;
    }
    anchors.forEach(element => {
        element.onclick = function () {
            return false;
        };
    });
});

