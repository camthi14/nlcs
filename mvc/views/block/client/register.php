 <div id="register" class="register js_register">
     <div class="register_content js_register-content">
         <div class="register_close js_register-close">
             <i class="fa-solid fa-xmark"></i>
         </div>

         <div class="register_header">
             <div class="register_logo">
                 <a href="" class="logo">
                     <img src=" <?= _PUBLIC_CLIENT . '/image/footer/logo_04.png' ?>" alt="">
                 </a>
             </div>
         </div>

         <div class="register_body">
             <h2 class="register_title">Great to have back!</h2>
             <form action="<?php echo _WEB_ROOT . '/user/handleRegister' ?>" method="post" class="register_form" id="res-form1">
                 <div class="alert alert-danger message-register fs-3 invisible"></div>

                 <div class="form-control">
                     <input id="email" type="text" name="email" class="register_input" placeholder="VD: abc@gmail.com">
                     <span class="form-message"></span>
                 </div>
                 <div class="form-control">
                     <input id="password" type="password" name="password" class="register_input" placeholder="VD: 123abc...">
                     <span class="form-message"></span>
                 </div>
                 <div class="form-control">
                     <input id="cf_password" type="password" name="cf_password" class="register_input" placeholder="Nhập lại password...">
                     <span class="form-message"></span>
                 </div>
                 <input type="hidden" name="register" value="register">
                 <button type="submit" class="btn-sign btn-signin">Register</button>
             </form>
             <button class="res_login js-res_login">
                 <span>Back in login</span>
                 <i class="fa-solid fa-arrow-right"></i>
             </button>
         </div>
     </div>
 </div>

 <script>
     $(".register_form").on('submit', function(e) {
         e.preventDefault();

         let email = this.querySelector('#email').value;
         let password = this.querySelector('#password').value;

         if (email && password)
             $.ajax({
                 type: 'post',
                 url: $(this).attr('action'),
                 dataType: 'json',
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 success: function(data) {
                     const {
                         check,
                         msg
                     } = data;

                     if (check === 0) {
                         $(".message-register").text(msg);
                         $(".message-register").removeClass("invisible");
                         return;
                     }

                     $(".message-register").addClass("invisible");

                     toastr.options = {
                         positionClass: "toast-top-right",
                     };

                     toastr.success(msg, "Success", {
                         timeOut: 2000,
                         closeButton: true,
                     });

                     $(".js-res_login").trigger("click");

                 },
                 error: function(e) {
                     console.log('Error: ', e)
                 }

             })
     })
 </script>