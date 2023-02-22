function change_from(menu) {
    if(menu == 0) {
        document.getElementById("sign_up_form").style.visibility = "false";
        document.getElementById("sign_in_from").style.visibility = "true";
    }
    if (menu == 1) {
        document.getElementById("sign_in_from").style.visibility = "false";
        document.getElementById("sign_up_form").style.visibility = "true";
    }
}