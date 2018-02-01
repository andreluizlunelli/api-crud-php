$( document ).ready(function() {
    $('#userRegisterForm').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);

        if (form.find('[name="ufInput"]').val() === 'SC') {
            if (form.find('[name="rgInput"]').val().length === 0)
                alert('Necessário informar o RG');
            else
                sendUser(form);

        } else {
            var ageDifMs = Date.now() - new Date(form.find('[name="birthdayInput"]').val());
            var ageDate = new Date(ageDifMs); // miliseconds from epoch
            var age = Math.abs(ageDate.getUTCFullYear() - 1970);

            if (age < 18)
                alert('Usuário menor de idade');

        }

    });

    function sendUser(form) {

        var date = new Date(form.find('[name="birthdayInput"]').val());
        var formatedDate = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
        var listPhone = form.find('[name="phoneInput"]').val().split(';');

        $.ajax({
            type: 'POST',
            url: '/api/person/' + form.find('[name="ufInput"]').val(),
            contentType: "application/json",
            dataType: 'json',
            data: JSON.stringify({
                'name': form.find('[name="nameInput"]').val(),
                'birthday': formatedDate,
                'cpf': form.find('[name="cpfInput"]').val(),
                'rg': form.find('[name="rgInput"]').val(),
                'phone': listPhone
            }),
            success: function(data) {
                if (data.message === 'ok') {
                    showMessageTimeout('Usuário cadastrado com sucesso');
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

});
