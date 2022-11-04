function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $("#img-preview").remove();

            const showImg = `
                <img src="${e.target.result}" alt="IMG UPLOAD" style="height: 110px;width: 150px;border-radius: 12px;max-width: 100%;object-fit: cover;object-position: center;margin-top: 17px;border: 1px solid;" id="img-preview"/>
            `

            $('#upload-img').append(showImg);
        };

        reader.readAsDataURL(input.files[0]);
    }
}



function readURLOneImg(input, nameClass = '.preview-img') {
    if (input.files && input.files[0]) {

        console.log(input.files[0]);

        const reader = new FileReader();

        reader.onload = function (e) {
            $(nameClass).empty();
            const showImg = `<img src="${e.target.result}" alt="IMG UPLOAD" class="img-thumbnail"/>`
            $(nameClass).append(showImg);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readURLMultipleImg(input, nameClass = '.preview-img') {
    if (input.files) {
        // console.log(nameClass);
        $(nameClass).empty();

        Array.from(input.files).forEach(file => {
            const reader = new FileReader();

            reader.addEventListener("load", function (event) {
                const showImg = `<img src="${event.target.result}" alt="IMG UPLOAD" class="img-thumbnail"/>`
                $(nameClass).append(showImg);
                // $(".preview-img-multiple").append(showImg);
            });

            reader.readAsDataURL(file);
        })
    }
}

$(document).ready(function () {
    // alert('ok');
    $(document).on("change", "input[name='upload_img']", function () {
        const value_upload = $(this).val();
        const base_uri = this.baseURI;
        const array_base_uri = base_uri.split("/");
        const last_two_array_base_uri = array_base_uri[4] + "/" + array_base_uri[5];
        const cut_base_uri = base_uri.slice(0, -last_two_array_base_uri.length);
        const url_img = cut_base_uri + "/public/client/assets/image/image_upload.png";

        $("#show-type-upload").empty();
        $(".preview-img").empty();

        let label_for = "multiple-image";
        let label = 'Upload Multiple Image';
        let alt = "Upload Multiple";
        let input = `<input type="file" id="multiple-image" class="form-control hidden" onchange="readURLMultipleImg(this)" multiple placeholder="images" name="images[]">`;

        if (value_upload === 'upload_img_one') {
            label_for = "image";
            label = 'Upload One Image';
            alt = "Upload One";
            input = `<input type="file" id="image" class="form-control hidden" onchange="readURLOneImg(this)" placeholder="image" name="image">`;
        }

        const show_input_element = `
            <label for="${label_for}" class="form-label">
                <span>${label}</span>

                <div class="input-upload-img">
                    <img class="w-10 h-10" src="${url_img}" alt="${alt}">
                </div>
            </label>
            ${input}
        `

        $("#show-type-upload").append(show_input_element);
    });

    function showAttributeInput() {
        $("#show-attribute-slider").empty();

        const show_element = `
                    <div class="mb-3">
                        <label for="" class="form-label">Title One</label>
                        <input type="text" class="form-control " id="" placeholder="Title One" name="title_one">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Title Two</label>
                        <input type="text" class="form-control " id="" placeholder="Title Two" name="title_two">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control " id="" placeholder="Description" name="description">
                    </div>
                `
        $("#show-attribute-slider").append(show_element);
    }

    let debounce;
    $(document).on("keyup input", "input[name='key_image']", function () {
        clearTimeout(debounce);

        debounce = setTimeout(() => {
            if ($(this).val()?.toLowerCase().search('slider') !== -1 || $(this).val()?.toLowerCase().search('slide') !== -1) {
                showAttributeInput();
            } else {
                $("#show-attribute-slider").empty();
            }
        }, 250);
    })

    function showValue() {
        if ($("input[name='key_image']").val()?.toLowerCase().search('slider') !== -1 || $("input[name='key_image']").val()?.toLowerCase().search('slide') !== -1) {
            showAttributeInput();
        } else {
            $("#show-attribute-slider").empty();
        }
    }

    showValue();
})