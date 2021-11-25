function showContent() {
    element = document.getElementById("infoDesc");
    check = document.getElementById("deseaDesc");
    if (check.checked) {
        element.style.display='block';
    }
    else {
        element.style.display='none';
    }
}

function showContent2() {
    element = document.getElementById("infoFoto");
    check = document.getElementById("deseaFoto");
    if (check.checked) {
        element.style.display='block';
    }
    else {
        element.style.display='none';
    }
}
