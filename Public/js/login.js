function check_login() {

    const inn = document.getElementById("email").value;
    const out = document.getElementById("ajax_result");
    const apiUrl = "http://localhost/DormitoryNotebooks";
    $.ajax(
        {
            type: "POST",
            url: apiUrl + '/?page=check_login',
            data: {
                email: inn
            },
        })
        .done((res) => {

            if (res === '"1"')
            {
                out.innerHTML = "";
            }
            else
            {
                out.innerHTML = "no user in database";
            }

        })
}