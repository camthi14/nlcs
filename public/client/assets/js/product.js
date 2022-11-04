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
    })
})