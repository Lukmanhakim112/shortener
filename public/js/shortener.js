document.addEventListener('DOMContentLoaded', function() {
    var custom_link = document.getElementById("custom_link");
    var alias = document.getElementById("alias_block");


    function show() {
        alias.style.display = custom_link.checked ? 'block' : 'none';
    }

    if (old_check_box) {
        custom_link.checked = true;
        show();
    }

    custom_link.addEventListener('click', function() {
        show();
    });

}, false);
