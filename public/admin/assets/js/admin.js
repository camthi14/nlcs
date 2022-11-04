$(document).ready(function () {

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    });

    $(document).on("click", "#show_detail", function () {
        const action = $(this).attr("data-action");

        console.log(action);

        $.ajax({
            method: 'get',
            url: action,
            dataType: "json",
            success: ({ data, path_img }) => {
                console.log(data);
                console.log(path_img);

                $("#show_bill").empty();
                $("#show_info_product").empty();
                $("#quantity").empty();
                $("#total_bill").empty();

                const total = data.price * data.quantity;

                const itemElementShowBill = `
                    <li class="detail-bill--content__list-item mb-2">
                        <span>ID Bill: &nbsp;</span>
                        <span class="text-bold">${data.id_cart}</span>
                    </li>
                    <li class="detail-bill--content__list-item mb-2">
                        <span>Address receive: &nbsp;</span>
                        <span class="text-bold">${data.address}</span>
                    </li>
                    <li class="detail-bill--content__list-item mb-2">
                        <span>Type checkout: &nbsp;</span>
                        <span class="text-bold">Thanh toán khi nhận hàng</span>
                    </li>
                `

                const trShowInfoProduct = `
                     <tr>
                        <th scope="row">${data.id_product}</th>
                        <td>
                            <img class="img-thumbnail" style="width: 140px" src="${path_img + data.img}" alt="">
                        </td>
                        <td>
                            <p>${data.name}</p>
                        </td>
                        <td>${formatter.format(data.price)}</td>
                        <td>${data.quantity}</td>
                        <td>${formatter.format(total)}</td>
                    </tr>
                `


                $("#show_bill").append(itemElementShowBill);
                $("#show_info_product").append(trShowInfoProduct);
                $("#quantity").text(`${data.quantity} sản phẩm`);
                $("#total_bill").text(`${formatter.format(total)}`);
            },
            fail: (error => console.log(error))
        })


    })
})