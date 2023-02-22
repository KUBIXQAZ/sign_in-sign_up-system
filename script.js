function change_from(menu) {
    if (menu == 0) {
        var sign_in_from = document.getElementById("sign_in_form");
        var sign_up_form = document.getElementById("sign_up_form");

        sign_in_from.style.visibility = "visible";
        sign_up_form.style.visibility = "hidden";
    }
    if (menu == 1) {
        var sign_in_from = document.getElementById("sign_in_form");
        var sign_up_form = document.getElementById("sign_up_form");

        sign_in_from.style.visibility = "hidden";
        sign_up_form.style.visibility = "visible";
    }
}