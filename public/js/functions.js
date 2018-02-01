function showMessage(message) {
    $('#mensagem-alert').text(message);
    $('#mensagem-alert').show();
}

function showMessageTimeout(message) {
    showMessage(message)
    setTimeout(function () { location.reload();}, 2000);
}