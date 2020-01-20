function check_login() {

    var email = document.getElementById("email").value;
    const out = document.getElementById("ajax_result");
    const apiUrl = "http://localhost/DormitoryNotebooks";
    $.ajax(
        {
        url: apiUrl + '/?page=check_login',
        dataType: 'json'
        })
        .done((res) => {
            out.innerHTML = res.valueOf();
    })
        .error(
alert("error"))
}