$(function() {
  var loginButton = $('#login-button')
  var emailElement = $('#email')
  var passwordElement = $('#password')
  var captchaDiv = $('#captcha-div')
  var captcha = $('#captcha-image')
  var captchaIn = $('#captcha')
  var isCaptchaOn = false

  var isSendingSigninReq = false
  var isSendingCaptchaReq = false

  function loginSuccess(result) {
    window.location = result.redirect_uri
  }

  function getCaptcha(key) {
    performRequest("/captcha", "GET", {
      "key": key
    }, captchaGetSuccess, null, function(e) {
      isSendingCaptchaReq = false
    })
  }

  function captchaGetSuccess(result) {
    isCaptchaOn = result.enabled
    captchaIn.val("")
    if (result.enabled === true) {
      captchaDiv.removeClass('hide')
      captcha.attr('src', result.data)
    } else {
      captchaDiv.addClass('hide')
    }
  }

  function loginError(err) {
    var err = err.responseJSON
    var key = emailElement.val()
    switch (err.code) {
      case errCaptchaRequired:
      case errCaptchaValidFailed:
        showError(err)
        getCaptcha(key)
        return
      case errRequireAuthenticatorTotp:
        window.location = "/two-factor?totp_type=0"
        return
      case errRequireMobileTotp:
        window.location = "/two-factor?totp_type=1"
        return
      default:
        if (isCaptchaOn) {
          getCaptcha(key)
        }
        showError(err)
        return
    }
  }

  function loginValidEmpty() {
    if (!emailPattern.test($.trim(emailElement.val()))) {
      $('.field-email').addClass('has-error')
      return false
    } else {
      $('.field-email').removeClass('has-error')
    }

    if ($.trim(passwordElement.val()) === "") {
      $('.field-password').addClass('has-error')
      return false
    } else {
      $('.field-password').removeClass('has-error')
    }

    if (isCaptchaOn && $.trim(captchaIn.val()) === "") {
      $('.field-captcha').addClass('has-error')
      return false
    } else {
      $('.field-captcha').removeClass('has-error')
    }
    return true
  }

  loginButton.on('click', function(e) {
    if (isSendingSigninReq) {
      return
    }
    var email = emailElement.val()
    var password = passwordElement.val()
    var captchaVal = captchaIn.val()

    if (!loginValidEmpty()) {
      return
    }

    var clientId = getURLParameter("client_id") || ""
    var redirectUrl = getURLParameter("redirect_url") || ""
    var url = "/signin?client_id=" + clientId + "&redirect_url=" + redirectUrl

    isSendingSigninReq = true
    loginButton.addClass('disabled')
    performRequest(url, "POST", {
      "username": email,
      "password": password,
      "captcha": captchaVal
    }, loginSuccess, loginError, function(e) {
      isSendingSigninReq = false
      loginButton.removeClass('disabled')
    })
  })

  captcha.on('click', function(e) {
    if (isSendingCaptchaReq) {
      return
    }
    getCaptcha(emailElement.val())
  })

  $('#close_alert').on('click', function(e){
    $('#notice .alert').hide()
  })

  $(document).bind('keydown', function(e) {
    var theEvent = e || window.event;
    var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
    if (code == 13) {
        loginButton.click();
    }
  })
})
