
function registrationFormValidation()
{
    var username = document.accounts.username;
    var password = document.accounts.password;
    var email = document.accounts.email;
    var fullName = document.accounts.fullName;
    var idNum = document.accounts.idNum;
    var parentName1 = document.accounts.parentName1;
    var phone1 = document.accounts.phone1;
    var parentName2 = document.accounts.parentName2;
    var phone2 = document.accounts.phone2;
    var letters = /^[0-9a-zA-Z]+$/;


    if (username.value == "")
    {
        window.alert("אנא מלא את שם המשתמש");
        username.focus();
        return false;
    }

   
    if (password.value == "")
    {
        window.alert("אנא הקלד סיסמה");
        password.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("אנא הקלד כתובת אימייל חוקית");
        email.focus();
        return false;
    }
    if (email.value.indexOf("@", 0) < 0)
    {
        window.alert("אנא הקלד כתובת מייל חוקית");
        email.focus();
        return false;
    }
    if (email.value.indexOf(".", 0) < 0)
    {
        window.alert("אנא הקלד כתובת מייל חוקית");
        email.focus();
        return false;
    }

    if (fullName.value == "")
    {
        window.alert("אנא מלא את שמו המלא של ילדך");
        fullName.focus();
        return false;
    }
    
   
    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    if (idNum.value == "")
    {
        window.alert("אנא מלא את תעודת הזהות של ילדך");
        idNum.focus();
        return false;
    }

    if (parentName1.value == "" )
    {
        window.alert("אנא מלא את שם האב");
        parentName1.focus();
        return false;
    }

    if (!(phone1.value.match(/^0(5[^7]|[2-4]|[8-9]|7[0-9])[0-9]{7}$/)))
    {
       window.alert("אנא הקלד מספר פלאפון חוקי");
        phone1.focus();
        return false;
    }

    if (parentName2.value == "" )
    {
        window.alert("אנא מלא את שם האם");
        parentName2.focus();
        return false;
    }

    if (!(phone2.value.match(/^0(5[^7]|[2-4]|[8-9]|7[0-9])[0-9]{7}$/)))
    {
       window.alert("אנא הקלד מספר פלאפון חוקי");
        phone2.focus();
        return false;
    }

    
	
	

}


