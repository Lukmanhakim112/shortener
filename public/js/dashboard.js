document.addEventListener('DOMContentLoaded', function() {
    const linkButton = document.getElementsByClassName("link");
    const linkDetail = document.querySelectorAll(".link-detail");

    const addLink = document.querySelectorAll(".addLink");
    const addLinkForm = document.getElementById("addLinkForm");

    function show_hide_link_form() {
        let timeOut = 250;
        if (addLinkForm.classList.contains("hidden")) {
            addLinkForm.classList.toggle("hidden")
            setTimeout(function(){
                addLinkForm.classList.toggle("opacity-0");
            }, timeOut)
        } else {
            addLinkForm.classList.toggle("opacity-0")
            setTimeout(function(){
                addLinkForm.classList.toggle("hidden");
            }, timeOut)
        }
    }

    for (let j = 0; j < addLink.length; j++) {
        addLink[j].addEventListener('click', function() {
            show_hide_link_form();
        });
    }

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
