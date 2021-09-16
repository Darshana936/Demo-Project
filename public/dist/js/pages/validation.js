// -----------------------------------Validation for User Management------------------------------
$(document).ready(function () {
  $('#checkFname').hide();
  $('#checkLname').hide();
  $('#checkMail').hide();
  $('#checkPass').hide();
  $('#checkConpass').hide();
  $('#checkRadio').hide();

  $('#firstname').on("keyup change blur", function () {
    firstname_check();
  });
  $('#lastname').on("keyup change blur", function () {
    lastname_check();
  });
  $('#email').on("keyup change blur", function () {
    email_check();
  });
  $('#password').on("keyup change blur", function () {
    password_check();
  });
  $('#conf-password').on("keyup change blur", function () {
    confpassword_check();
  });
  $("[name='status']").change(function () {
    radio_check();
  });



  function firstname_check() {
    var fname_val = $('#firstname').val();


    let regexpress = new RegExp("^[a-zA-Z]+$");
    if (fname_val.length == '') {
      $('#checkFname').show();
      $('#checkFname').html("Please fill the first Name field");
      $('#firstname').css({ border: "1px solid red" });

      return false;
    }
    else if (!regexpress.test(fname_val)) {
      $('#checkFname').show();
      $('#checkFname').html("You can only use alphabets");
      $('#firstname').css({ border: "1px solid red" });
      return false;

    }
    else {
      $('#firstname').css({ border: '1px solid green' });
      $('#checkFname').hide();
      return true;
    }

  }

  function lastname_check() {
    var lname_val = $('#lastname').val();

    let regexpress = new RegExp("^[a-zA-Z]+$");
    if (lname_val.length == '') {
      $('#checkLname').show();
      $('#checkLname').html("Please fill the last name field");

      $('#lastname').css({ border: "1px solid red" });
      return false;
    }
    else if (!regexpress.test(lname_val)) {
      $('#checkLname').show();
      $('#checkLname').html("You can only use alphabets");
      $('#lastname').css({ border: "1px solid red" });

      return false;

    }
    else {
      $('#checkLname').hide();
      $('#lastname').css({ border: '1px solid green' });
      return true;
    }
  }

  function email_check() {
    var email_val = $('#email').val();
    let regexpress = new RegExp("^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$");

    if (email_val.length == '') {
      $('#checkMail').show();
      $('#checkMail').html("Please fill the email field");

      $('#email').css({ border: "1px solid red" });
      return false;
    }
    else if (!regexpress.test(email_val)) {
      $('#checkMail').show();
      $('#checkMail').html("Invalid email address");
      $('#email').css({ border: "1px solid red" });

      return false;

    }
    else {
      $('#checkMail').hide();
      $('#email').css({ border: '1px solid green' });
      return true;
    }
  }

  function password_check() {
    var pass_val = $('#password').val();
    let regexpress = new RegExp("^[a-zA-Z0-9]+$");
    if (pass_val.length == '') {
      $('#checkPass').show();
      $('#checkPass').html("Please fill the password field");

      $('#password').css({ border: "1px solid red" });
      return false;
    }
    else if (!regexpress.test(pass_val)) {
      $('#checkPass').show();
      $('#checkPass').html("Password should be alphanumeric and length must be between 8 and 12");

      $('#password').css({ border: "1px solid red" });
      return false;
    }
    else if (pass_val.length > 12 || pass_val.length < 8) {
      $('#checkPass').show();
      $('#checkPass').html("Password should be alphanumeric and length must be between 8 and 12");

      $('#password').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkPass').hide();
      $('#password').css({ border: '1px solid green' });
      return true;
    }
  }

  function confpassword_check() {
    var conpass_val = $('#conf-password').val();
    var pass_val = $('#password').val();
    if (conpass_val.length == '') {
      $('#conf-password').css({ border: "1px solid red" });
      $('#checkConpass').show();
      $('#checkConpass').html('Please fill confirm password field');
      return false;
    }
    else if (conpass_val != pass_val) {
      $('#conf-password').css({ border: "1px solid red" });
      $('#checkConpass').show();
      $('#checkConpass').html('Password should be matched');
      return false;
    }
    else {
      $('#checkConpass').hide();
      $('#conf-password').css({ border: '1px solid green' });
      return true;
    }
  }
  function radio_check() {

    var x = $("input[type = 'radio']:checked");
    if (!x.length > 0) {
      $('#checkRadio').show();
      $('#checkRadio').html('Status field is required');
      return false;
    }
    else {
      $('#checkRadio').hide();
      return true;
    }
  }

  $('#submitbtn').click(function () {


    let v1 = firstname_check();
    let v2 = lastname_check();
    let v3 = email_check();
    let v4 = password_check();
    let v5 = confpassword_check();
    let v6 = radio_check();
    return (v1 && v2 && v3 && v4 && v5 && v6);
  });
});
// -----------------------------------End Validation for User Management-------------------------

// -----------------------------------Validation for Banner Management---------------------------

$(document).ready(function () {
  $('#checkBname').hide();
  $('#checkImg').hide();
  $('#checkUrl').hide();
  $('#checkBannerImgEdit').hide();

  $('#Bannername').on('blur change keyup', function () {
    Bannername_check();
  });

  function Bannername_check() {
    var bname_val = $('#Bannername').val();
    if (bname_val.length == '') {
      $('#checkBname').show();
      $('#checkBname').html("Please fill the name field");
      $('#Bannername').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkBname').hide();
      $('#Bannername').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#BannerImg').on('change click', function () {
    BannerImg_check();
  });

  function BannerImg_check() {
    var ext = $('#BannerImg').val().split('.').pop().toLowerCase();
    var bimg_val = $('#BannerImg').val();
    if (bimg_val.length == '') {
      $('#checkImg').show();
      $('#checkImg').html("Please upload image");
      $('#BannerImg').css({ border: "1px solid red" });
      return false;
    }
    else if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
      $('#checkImg').show();
      $('#checkImg').html("Invalid image format! Image format must be jpg, jpeg, png or gif.");
      $('#BannerImg').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkImg').hide();
      $('#BannerImg').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#BannerLink').on('blur change keyup', function () {
    BannerLink_check();
  });

  function BannerLink_check() {
    var blink_val = $('#BannerLink').val();
    let regexpress = new RegExp("((http|https)://)(www.)?[a-zA-Z0-9@:%._\\+~#?&//=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%._\\+~#?&//=]*)");
    if (blink_val.length == '') {
      $('#checkUrl').show();
      $('#checkUrl').html("Please fill the above field");
      $('#BannerLink').css({ border: "1px solid red" });
      return false;
    }

    else if (!regexpress.test(blink_val)) {
      $('#checkUrl').show();
      $('#checkUrl').html("Please enter valid URL");
      $('#BannerLink').css({ border: "1px solid red" });
      return false;
    }

    else {
      $('#checkUrl').hide();
      $('#BannerLink').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#submitBanner').click(function () {
    let v1 = Bannername_check();
    let v2 = BannerImg_check();
    let v3 = BannerLink_check();

    return (v1 && v2 && v3);
  });

  $('#BannerImgEdit').on('change', function () {
    BannerImgEdit_check();
  });

  function BannerImgEdit_check() {
    var ext = $('#BannerImgEdit').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
      $('#checkBannerImgEdit').show();
      $('#checkBannerImgEdit').html("Invalid image format! Image format must be jpg, jpeg, png or gif.");
      $('#BannerImgEdit').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkBannerImgEdit').hide();
      $('#BannerImgEdit').css({ border: "1px solid green" });
      return true;
    }
  }
  $('#submitBannerEdit').click(function () {
    let v1 = Bannername_check();
    let v2 = BannerImgEdit_check();
    let v3 = BannerLink_check();


    return (v1 && v2 && v3);
  });

});
// -----------------------------------End Validation for Banner Management---------------------------------

// -----------------------------------Validation for Category Management------------------------------
$(document).ready(function () {
  $('#checkCatname').hide();
  $('#catName').on('blur change keyup', function () {
    Catname_check();
  });

  function Catname_check() {
    let regexpress = new RegExp('^[A-Za-z0-9 &]+$');
    var catname_val = $('#catName').val();
    if (catname_val.length == '') {
      $('#checkCatname').show();
      $('#checkCatname').html("Please fill the name field");
      $('#catName').css({ border: "1px solid red" });
      return false;
    }
    else if (!regexpress.test(catname_val)) {
      $('#checkCatname').show();
      $('#checkCatname').html("Name should be alphanumric! You can use:&");
      $('#catName').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkCatname').hide();
      $('#catName').css({ border: "1px solid green" });
      return true;
    }
  }
  $('#CatSubmit').click(function () {

    return (Catname_check());
  });



});


// -----------------------------------End Validation for Category Management------------------------------

// -----------------------------------Validation for Product Management------------------------------

$(document).ready(function () {

  $('#checkProName').hide();
  $('#checkProDescription').hide();
  $('#checkProCategory').hide();
  $('#checkProPrice').hide();
  $('#checkProStock').hide();

  $('#ProName').on('keyup blur change', function () {
    ProName_check();
  });
  function ProName_check() {
    var proname_val = $('#ProName').val();
    if (proname_val == "") {
      $('#checkProName').show();
      $('#checkProName').html("Please fill the product name field.");
      $('#ProName').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkProName').hide();
      $('#ProName').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#ProDescription').on("blur change keyup", function () {
    ProDescription_check();
  });

  function ProDescription_check() {

    var ProDescription_val = $('#ProDescription').val();
    if (ProDescription_val == "") {
      $('#checkProDescription').show();
      $('#checkProDescription').html("Please fill the product description field.");
      $('#ProDescription').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkProDescription').hide();
      $('#ProDescription').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#ProCategory').on("blur change keyup", function () {
    ProCategory_check();
  });

  function ProCategory_check() {
    if ($('#ProCategory').find('option:selected').attr('disabled')) {
      $('#checkProCategory').show();
      $('#checkProCategory').html("Please select the category.");
      $('#ProCategory').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkProCategory').hide();
      $('#ProCategory').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#ProPrice').on("blur change keyup", function () {
    ProPrice_check();
  });

  function ProPrice_check() {
    var proprice_val = $('#ProPrice').val();
    if (proprice_val == "") {
      $('#checkProPrice').show();
      $('#checkProPrice').html("Please fill the price field.");
      $('#ProPrice').css({ border: "1px solid red" });
      return false;
    }

    else if (proprice_val < 0) {
      $('#checkProPrice').show();
      $('#checkProPrice').html("Please enter positive value.");
      $('#ProPrice').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkProPrice').hide();
      $('#ProPrice').css({ border: "1px solid green" });
      return true;
    }
  }


  $('#ProStock').on("blur change keyup", function () {
    ProStock_check();
  });
  function ProStock_check() {
    var prostock_val = $('#ProStock').val();
    if (prostock_val == "") {
      $('#checkProStock').show();
      $('#checkProStock').html("Please fill the stock field.");
      $('#ProStock').css({ border: "1px solid red" });
      return false;
    }

    else if (prostock_val < 0) {
      $('#checkProStock').show();
      $('#checkProStock').html("Please enter positive value.");
      $('#ProStock').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkProStock').hide();
      $('#ProStock').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#ProSubmit').click(function () {
    var v1 = ProName_check();
    var v2 = ProDescription_check();
    var v3 = ProCategory_check();
    var v4 = ProPrice_check();
    var v5 = ProStock_check();
    return (v1 && v2 && v3 && v4 && v5);
  });
});
// -----------------------------------End Validation for Product Management------------------------------

// -----------------------------------Validation for Product Image Management------------------------------
$(document).ready(function () {
  $('#checkselectImgProduct').hide();
  $('#checkProImage').hide();
  $('#checkProImageAlt').hide();
  $('#checkProImageEdit').hide();

  $('#selectImgProduct').on('blur change', function () {
    selectImgProduct_check();
  });

  function selectImgProduct_check() {
    if ($('#selectImgProduct').find('option:selected').attr('disabled')) {
      $('#checkselectImgProduct').show();
      $('#checkselectImgProduct').html("Please select the product.");
      $('#selectImgProduct').css({ border: "1px solid red" });
      return false;
    }

    else {
      $('#checkselectImgProduct').hide();
      $('#selectImgProduct').css({ border: "1px solid green" });
      return true;
    }
  }
  $('#ProImage').on('blur change', function () {
    ProImage_check();
  });

  function ProImage_check() {
    var ext = $('#ProImage').val().split('.').pop().toLowerCase();
    var pimg_val = $('#ProImage').val();
    if (pimg_val.length == '') {
      $('#checkProImage').show();
      $('#checkProImage').html("Please upload image");
      $('#ProImage').css({ border: "1px solid red" });
      return false;
    }
    else if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
      $('#checkProImage').show();
      $('#checkProImage').html("Invalid image format! Image format must be jpg, jpeg, png or gif.");
      $('#ProImage').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkProImage').hide();
      $('#ProImage').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#ProImageAlt').on('blur change keyup', function () {
    ProImageAlt_check();
  });

  function ProImageAlt_check() {
    var ProImageAlt_val = $('#ProImageAlt').val();
    if (ProImageAlt_val == "") {
      $('#checkProImageAlt').show();
      $('#checkProImageAlt').html("Please fill the alt field.");
      $('#ProImageAlt').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkProImageAlt').hide();
      $('#ProImageAlt').css({ border: "1px solid green" });
      return true;
    }
  }

  $('#ProImageSubmit').click(function () {
    var v1 = selectImgProduct_check();
    var v2 = ProImage_check();
    var v3 = ProImageAlt_check();

    return (v1 && v2 && v3);
  });

  $('#ProImageEdit').on('change', function () {
    ProImageEdit_check();
  });

  function ProImageEdit_check() {
    var ext = $('#ProImageEdit').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
      $('#checkProImageEdit').show();
      $('#checkProImageEdit').html("Invalid image format! Image format must be jpg, jpeg, png or gif.");
      $('#ProImageEdit').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkProImageEdit').hide();
      $('#ProImageEdit').css({ border: "1px solid green" });
      return true;
    }
  }
  $('#ProImageEditSubmit').click(function () {
    var s1 = selectImgProduct_check();
    var s2 = ProImageEdit_check();
    var s3 = ProImageAlt_check();

    return (s1 && s2 && s3);
  });

});
// -----------------------------------End Validation for Product Image Management------------------------------
















/*$(document).ready(function(){
    $("#userForm").Validate({
      rules: {
          firstname: {
              required: true
          },
          lastname: {
            required: true
        },
         email: {
             required: true,
             email: true
         },
         password:{
             required:true,
             alphanumeric: true,
             range: [8, 12]

         },
         password_confirmation:{
            required:true,
            equalTo:password
        },
        status:{
            required:true,

        }

      },
      messages:{
        firstname: {
            required: 'Firstname is required'
        },
        lastname: {
          required:  'lastname is required'
      },
       email: {
           required:  'Email is required',
           email: 'Please enter valid email address',

       },
       password:{
           required: 'Password is required',
           alphanumeric: 'Please enter password as an alphanumeric value',
           range:'Please enter a value between 8 and 12 characters long',

       },
       password_confirmation:{
          required:'Confirm password is required',
          equalTo:'Please enter the same value again'
      },

      status:{
          required:'Please choose status',

      }
      }
    });

});*/

