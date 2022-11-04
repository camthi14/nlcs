$(document).ready(function () {


    $(document).on("change", "#num_order", function (e) {
        const id = $(this).attr("data-id");
        const quantity = $(this).val();

        const action = this.baseURI + "/update_quantity";

        $.ajax({
            url: action,
            method: 'POST',
            data: { id, quantity },
            success: function(response) {
                const data = JSON.parse(response);

                $(".amount_sub_total_" + id).text("$" + data.sub_total);
                $(".cart_total").text("$" + data.total);
            },
            error: function() {
                console.log("ERROR UPDATE QUANTITY");
            }
        })
    })
})