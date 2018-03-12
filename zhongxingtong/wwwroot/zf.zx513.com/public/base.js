var errMap = {
  7011: "验证失败，请重新输入",
  7012: "请输入验证码",
  7013: "尝试次数过多，请稍后再试",
  7014: "用户名或者密码错误",
  7015: "需要两步验证",
  7016: "需要手机两步验证",
  7017: "登录失败，请提交工单",
  7019: "非法请求",
  7021: "登录过期，请重新登录",
  7022: "两步验证码输入有误",
  7023: "验证信息发送失败",
  7024: "生成验证码超过数量限制",
  7025: "发送短信超过数量限制",
  7026: "生成验证码失败，请重试",
}

var
  errCaptchaValidFailed = 7011,
  errCaptchaRequired = 7012,
  errUserBlocked = 7013,
  errSigninWrongInfo = 7014,
  errRequireAuthenticatorTotp = 7015,
  errRequireMobileTotp = 7016,
  errSigninFailed = 7017,
  errInvalidTotpCode = 7022,
  errLoginRequired = 7021,
  errSendSMSFailed = 7023;

// RegExp
var emailPattern = /^[a-z0-9_]+(\.?[a-z0-9-_])*?@([a-zA-Z0-9]([a-zA-Z0-9\-]*?[a-zA-Z0-9])?\.)+[a-zA-Z]{2,20}$/i;

function performRequest(url, method, data, successCallback, errorCallback, completeCallback) {
  var method = method || "POST"
  var url = url || "/"
  var data = data || {}
  var success = successCallback || function(result) {
    console.log("call '" + url + "' successfully")
  }
  var error = errorCallback || function(err) {
    console.log("call '" + url + "' failed, because " + err.responseText)
  }
  var complete = completeCallback || function(e){
    console.log("call '" + url + "' completed")
  }

  if (method == "POST") {
    data = JSON.stringify(data)
  }

  $.ajax({
    method: method,
    url: url,
    data: data,
    dataType: "json",
    contentType: "application/json",
    success: success,
    error: error,
    complete: complete
  })
}

function getURLParameter(sParam) {
  var sPageURL = window.location.search.substring(1)
  var sURLVariables = sPageURL.split('&')
  for (var i = 0; i < sURLVariables.length; i++) {
    var sParameterName = sURLVariables[i].split('=')
    if (sParameterName[0] == sParam) {
      return sParameterName[1]
    }
  }

  return undefined
}

function showError(err) {
  $('#notice .alert .message').text('[' + err.code + '] ' + errMap[err.code] || err.message)
  $('#notice .alert').removeClass('alert-success').addClass('alert-danger').show()
}
