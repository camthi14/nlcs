$(document).ready(function () {
    $(document).on('click', '.products_categories-link', function () {
        const cat_id = $(this).attr('data-id');
        console.log(this.baseURI)

        $.ajax({
            url: this.baseURI,
            type: 'get',
            dataType: 'json',
            data: { cat_id },
            success: (response) => {
                console.log(response);

            },
            error: (e) => console.log(e)
        })
    });

    function getPrice() {
        $('#third').empty();
        $('#third').append(() => {
            return $('#progress').val();
        });
    }

    getPrice();

    $(document).on('change', '#progress', function (e) {
        getPrice();
    });
})