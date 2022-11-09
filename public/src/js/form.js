

function verify_kupon(url) {
    const nominal = document.querySelector('#nominal');
    const value = nominal.innerHTML.replace('.', '');
    const kupon = document.querySelector('#kupon').value;
    const warning = document.querySelector('#kupon_status_0');
    const success = document.querySelector('#kupon_status_1');
    // alert(kupon + parseInt(value) + url)
    $.ajax({
        url: url + '/' + kupon,
        type: "GET",
        success: function (data) {
            const res = JSON.parse(data);
            if (res[0]) {
                nominal.innerHTML = res[1]
                success.classList.remove('hidden');
                warning.classList.add('hidden');
            } else {
                warning.classList.remove('hidden');
                success.classList.add('hidden');
            }
        },
        error: function (xhr, status, error) {
            alert("Server Error");
        }
    });
}