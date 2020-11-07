$(document).ready(function() {
    strengthResult = $("#pass-strength-result");
    strengthResult.show();

    $("#pass1").keyup(function(e) {
        user = $("#user").val();
        pass1 = $("#pass1").val();
        pass2 = $("#pass2").val();

        if (pass1 != "") {
            AddStyle(passwordStrength(pass1, user, pass2));
        } else {
            strengthResult.removeClass().text("Strength indicator");
        }
    });

    $("#pass2").keyup(function(e) {
        user = $("#user").val();
        pass1 = $("#pass1").val();
        pass2 = $("#pass2").val();

        if (pass1 != "") {
            AddStyle(passwordStrength(pass1, user, pass2));
        } else {
            strengthResult.removeClass().text("Strength indicator");
        }
    });

    $('#reg_btn').click(function(e) {
        user = $('#user').val();
        pass1 = $('#pass1').val();
        pass2 = $('#pass2').val();

        if (user != '' && pass1 != '' && pass2 != '' && strengthResult.attr('class') != 'short' && strengthResult.attr('class') != 'bad') {
            strengthResult.removeClass().text('Strength indicator');
        } else if (strengthResult.attr('class') == 'short' || strengthResult.attr('class') == 'bad') {
            alert('Register is failed. Password is not safety!!!');
            e.preventDefault();
        }
    });

    function AddStyle(result) {
        if (result == 1) {
            strengthResult.removeClass().addClass('short').text('Very Weak')
        };
        if (result == 2) {
            strengthResult.removeClass().addClass('bad').text('Weak')
        };
        if (result == 3) {
            strengthResult.removeClass().addClass('good').text('Medium')
        };
        if (result == 4) {
            strengthResult.removeClass().addClass('strong').text('Strong')
        };
        if (result == 5) {
            strengthResult.removeClass().addClass('short').text('Mismatch')
        };
    }

    // Password strength meter
    function passwordStrength(password1, username, password2) {
        var shortPass = 1,
            badPass = 2,
            goodPass = 3,
            strongPass = 4,
            mismatch = 5,
            symbolSize = 0,
            natLog, score;
        // password 1 != password 2
        if ((password1 != password2) && password2.length > 0)
            return mismatch

        //password < 4
        if (password1.length < 4)
            return shortPass

        //password1 == username
        if (password1.toLowerCase() == username.toLowerCase())
            return badPass;

        if (password1.match(/[0-9]/))
            symbolSize += 10;
        if (password1.match(/[a-z]/))
            symbolSize += 26;
        if (password1.match(/[A-Z]/))
            symbolSize += 26;
        if (password1.match(/.,[,!,@,#,$,%,^,&,*,?,_,~,-,(,),]/))
            symbolSize += 26;
        if (password1.match(/[^a-zA-Z0-9]/))
            symbolSize += 31;

        natLog = Math.log(Math.pow(symbolSize, password1.length));
        score = natLog / Math.LN2;

        if (score < 40)
            return badPass

        if (score < 56)
            return goodPass

        return strongPass;
    }
});