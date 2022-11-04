$(document).ready(function () {
    const url = window.location.href;

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    });

    function getBill(params = {}) {

        $.ajax({
            type: 'post',
            data: params,
            action: url,
            dataType: 'json',
            success: (response) => {
                if (response) {
                    const { data } = response;

                    if (data && data.length > 0) {
                        $('#show_bill').empty();

                        const billItem = `
                            ${data.map(item => (
                            `
                                <tr>
                                    <td>
                                        ${item.id_cart}
                                    </td>
                                    <td>${item.product_name}</td>
                                    <td>${item.quantity}</td>
                                    <td>${formatter.format(item.quantity * item.price)}</td>
                                    <td>
                                        <p class="${item.status_name === 'confirm' ? 'text-warning'
                                : (item.status_name === 'transport' ? 'text-primary'
                                    : (item.status_name === 'failed' ? 'text-danger' : 'text-success'))}">
                                            ${item.status_name}
                                        </p>
                                    </td>
                                    <td>${item.purchased_at}</td>
                                </tr>
                                `
                        )).join('')}
                        `;

                        $('#show_bill').append(billItem);
                    } else {
                        $('#show_bill').empty();
                        const billEmpty = `
                            <tr>
                                <td colspan="5" class='text-danger text-center'>Empty data</td>
                            </tr>
                        `;

                        $('#show_bill').append(billEmpty);
                    }
                }
            },
            error: (e) => console.log(e)
        })
    }

    if (url === 'http://localhost/chaitan/infoOrder' || url === 'http://localhost/chaitan/infoOrder/')
        getBill();

    $(document).on('click', '#change_status', function () {
        const s_id = $(this).attr('data-id');

        $('.btn_status').removeClass('btn_status');
        $(this).addClass('btn_status');

        if (s_id === 'all') {
            getBill();
            return;
        }

        getBill({ s_id });
    });

    let debounce;
    $(document).on('keyup input', '#name_search', function (e) {
        clearTimeout(debounce);

        debounce = setTimeout(() => {
            getBill({ name_search: $(this).val() });
        }, 500);
    });
})