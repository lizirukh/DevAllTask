$( document ).ready(function() {
    console.log( "ready!" );

    function validateFName(fName) {
        let len = fName.length;
        return len >= 2 && len <= 30;
    }
    function validateLName(lName) {
        let len = lName.length;
        return len >= 2 && len <= 50;
    }
    function validateEmail(email) {
        let len = email.length;
        return len >= 7 && len <= 50;
    }

    function validateForm(fName, lName, email) {
        let isfName = validateFName(fName);
        let islName = validateLName(lName);
        let isEmail = validateEmail(email);

        if(!isfName)
            $('#fNameMessages').text('first name must be between [2; 30]');
        else
            $('#fNameMessages').text('');

        if(!islName)
            $('#lNameMessages').text('Last name characters must be between [2; 50]');
        else
            $('#lNameMessages').text('')

        if(!isEmail)
            $('#emailMessages').text('Email characters must be between [2; 50]');
        else
            $('#emailMessages').text('');

        return isfName && islName && isEmail;
    }
    $('#task-form').submit(e => {
        e.preventDefault();
        //console.log('we have clicked submit button');
        const postData = {
            fName: $('#fname').val().trim(),
            lName: $('#lname').val().trim(),
            email: $('#email').val().trim()
        };
        if(validateForm(postData.fName, postData.lName, postData.email)){
            $.post('../Controller/task-addController.php', postData, (response) => {
                console.log(response);
                $('#task-form').trigger('reset');
            });
        }

    });
});