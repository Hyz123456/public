function check_message() {
                if (window.document.adminlogin.username.value == "") {
                    alert("请输入用户名称");
                    document.adminlogin.username.focus();
                    return false;
                }
                if (document.adminlogin.password.value == "") {
                    alert("请输入密码");
                    document.adminlogin.password.focus();
                    return false;
                }
                return true;
            }