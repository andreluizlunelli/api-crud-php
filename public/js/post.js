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
        $.ajax({
            type: 'POST',
            url: '/api/person/' + form.find('[name="ufInput"]'),
            data: JSON.stringify({
                'name': form.find('[name="nameInput"]'),
                'birthday': form.find('[name="birthdayInput"]'),
                'cpf': form.find('[name="cpfInput"]'),
                'rg': form.find('[name="rgInput"]')
            }),
            success: function(data) { console.log(data); },
            contentType: "application/json",
            dataType: 'json'
        });
    }
});
