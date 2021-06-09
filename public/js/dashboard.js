document.addEventListener('DOMContentLoaded', function() {
    const linkButton = document.getElementsByClassName("link");
    const linkDetail = document.querySelectorAll(".link-detail");

    function hide_detail(index) {
        for (var j = 0; j < linkDetail.length; j++) {
            if (index == j) {
                linkDetail[j].classList.replace("hidden", "block")
            } else {
                linkDetail[j].classList.replace("block", "hidden")
            }
        }

    }

    for (let i = 0; i < linkButton.length; i++) {
        linkButton[i].addEventListener('click', function() {
            hide_detail(i);
        });
    }

}, false);
