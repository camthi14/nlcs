<div id="modal" class="modal js_modal">
    <div class="modal_content js_modal-content">
        <div class="modal_close js_modal-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="modal_header">
            <div class="modal_logo">
                <a href="" class="logo">
                    <img src=" <?= _PUBLIC_CLIENT . '/image/footer/logo_04.png' ?>" alt="">
                </a>
            </div>
        </div>
        <div class="modal_body">
            <h2 class="modal_title">Great to have back!</h2>
            <form action="<?php echo _WEB_ROOT . '/user/handleLogin' ?>" method="post" class="modal_form"
                id="modal_form1">
                <div class="alert alert-danger fs-3 invisible messageLogin"></div>
                <div class="form-control">
                    <input required id="email" type="text" name="email" class="modal_input"
                        placeholder="VD: abc@gmail.com">
                    <span class="form-message"></span>
                </div>
                <div class="form-control">
                    <input required id="password" type="password" name="password" class="modal_input"
                        placeholder="VD: 123abc...">
                    <span class="form-message"></span>
                </div>
                <div class="modal_forgot-pass">Forgot your password?</div>
                <button type="submit" class="btn-sign btn-signin">Sign in</button>
            </form>
            <div class="modal_lastpage">
                <span class="modal_sub">Don't have an account?</span>
                <button class="modal_regis js-modal_regis">
                    <span>Register now</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let formLogin = document.querySelector('.modal_form');
let messageLogin = document.querySelector('.messageLogin');
formLogin.addEventListener('submit', function(e) {
    e.preventDefault();

    let email = this.querySelector('#email').value;
    let password = this.querySelector('#password').value;

    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        dataType: 'text',
        data: {
            email,
            password
        },
        success: function(data) {
            console.log(JSON.parse(data));
            if (JSON.parse(data).check == 1) {
                if (JSON.parse(data).role == 1) {
                    window.location.href = JSON.parse(data).link + '/admin';
                    return;
                }

                messageLogin.classList.add('invisible');
                messageLogin.textContent = '';
                toastr.options = {
                    positionClass: "toast-top-right",
                };
                toastr.success("Logged in successfully!", "Success", {
                    timeOut: 2000,
                    closeButton: true,
                });
                let closeLogin = document.querySelector('.modal_close');
                closeLogin.click();

                location.reload();

            } else {
                messageLogin.classList.remove('invisible');
                messageLogin.textContent = JSON.parse(data).msg;
            }

        },
        error: function(e) {
            console.log('Error: ', e)
        }

    })
})
</script>