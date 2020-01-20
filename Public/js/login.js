function check_login() {

    var email = document.getElementById("email").value;
    const o = document.getElementById("tu");
    const apiUrl = "http://localhost/DormitoryNotebooks";
    $.ajax(
        {
        url: apiUrl + '/?page=check_login',
        dataType: 'json'
        })
        .done((res) => {
            o.append(res.valueOf());
    });

}