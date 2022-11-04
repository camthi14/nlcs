let check = false;
let btnLogin = document.querySelector('.js-res_login');
//message-register
let message_register = document.querySelector('.message-register');

function Validator(options) {

    let selectorRules = {};

    //Ham thuc hien validate
    function validate(inputElement, rule) {
        let errorElement = inputElement.parentElement.querySelector(options.errorSelector);
        let errorMessage;

        //Lấy ra các rule của selector
        let rules = selectorRules[rule.selector];
        //Lặp qua từng rule & kiểm tra
        for (let i = 0; i < rules.length; ++i) {
            errorMessage = rules[i](inputElement.value);
            if (errorMessage) break;
        }

        if (errorMessage) {
            check = false;
            errorElement.innerText = errorMessage;
            inputElement.parentElement.classList.add('invalid');
        } else {
            check = true;
            errorElement.innerText = '';
            inputElement.parentElement.classList.remove('invalid');

        }
    }
    //lay element cua form can validate
    let formElement = document.querySelector(options.form);
    if (formElement) {
        formElement.onsubmit = function (e) {
            e.preventDefault();
            if (check) {
                let email = this.querySelector('#email').value;
                let password = this.querySelector('#password').value;
                let cf_password = this.querySelector('#cf_password').value;

                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    dataType: 'text',
                    data: { email, password, cf_password },
                    success: function (data) {
                        console.log(JSON.parse(data));
                        if (JSON.parse(data).check == 1) {
                            btnLogin.click();
                        } else {
                            message_register.classList.remove('invisible');
                            message_register.textContent = JSON.parse(data).msg;
                        }
                    },
                    error: function (e) {
                        console.log('loi')
                        console.log(e)
                    }
                })

            }
            //Lặp qua từng rule và validate
            options.rules.forEach(function (rule) {
                let inputElement = formElement.querySelector(rule.selector);
                validate(inputElement, rule);
            });
        }

        //Lặp qua mỗi rule và xử lý(lắng nghe blur, input)
        options.rules.forEach(function (rule) {

            //Lưu  lại các rules cho mỗi input
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);

            } else {
                selectorRules[rule.selector] = [rule.test];

            }
            let inputElement = formElement.querySelector(rule.selector);

            if (inputElement) {
                //Xử lý trường hợp blur khỏi input
                inputElement.onblur = function () {
                    // console.log('blur' + rule.selector)
                    validate(inputElement, rule);

                }

                //Xử lý trường hợp khi người dùng nhập vào input
                inputElement.oninput = function () {
                    let errorElement = inputElement.parentElement.querySelector(options.errorSelector);
                    errorElement.innerText = '';
                    inputElement.parentElement.classList.remove('invalid');
                }
            }
        });
    }
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'This field must be email !';
        }
    };
}
Validator.isRequired = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined : 'Please enter this field !';
        }
    };

}
Validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : message || `Please enter at least ${min} characters !`;
        }
    };

}