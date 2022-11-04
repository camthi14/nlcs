window.addEventListener('load', function () {
    const handle_delete = document.querySelectorAll('.delete_handle');
    [...handle_delete].forEach(item => item.addEventListener('click', function (e) {
        e.preventDefault();
        let that = this;
        if (e.target.matches('.delete_handle i')) {
            let href = e.target.parentElement.getAttribute('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        contentType: "application/json",
                        url: href,
                        dataType: 'text',
                        success: function (data) {
                            if (+data > 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Trong group co ' + (+data) + ' user dang ton tai! Khong the xoa!',
                                    footer: '<a href="">Why do I have this issue?</a>'
                                })
                            } else {
                                if (+data == -1) {

                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    that.parentElement.parentElement.remove();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'He thong gap su co ! Vui long thu lai sao!',
                                        footer: '<a href="">Why do I have this issue?</a>'
                                    })
                                }
                            }
                        },
                        error: function (e) {

                            console.log(e)

                        }
                    });

                }
            })

        }
    }));
});