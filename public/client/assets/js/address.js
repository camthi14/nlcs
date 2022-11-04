$(document).ready(function () {
    const HOST_API = 'https://vapi.vnappmob.com/api/province';

    function getProvince() {
        $.get(`${HOST_API}`, function (response) {
            if (response && response.results) {



                const option = `${response?.results.map(province => (`
                <option value="${province.province_id}">${province.province_name}</option>
                `)).join('')}`

                $("#province").append(option);
            }
        }).fail(function () {
            alert("error");
        });
    }

    getProvince();

    $(document).on("change", "#province", function () {
        const province_id = $(this).val();

        $.get(`${HOST_API}/district/${province_id}`, function (response) {
            if (response && response.results) {

                $("#district").empty();

                let option = '';

                if (response?.results.length < 0)
                    option += '<option value="" selected disabled>Not data district</option>'
                else
                    option += '<option value="" selected disabled>---Select---</option>'

                option += `${response?.results.map(district => (`
                    <option value="${district.district_id}">${district.district_name}</option>
                `)).join('')}`

                $("#district").append(option);
            }
        }).fail(function () {
            alert("error");
        });
        handleGetValueAddress();
    })

    $(document).on("change", "#district", function () {
        const district_id = $(this).val();

        $.get(`${HOST_API}/ward/${district_id}`, function (response) {
            if (response && response.results) {
                $("#ward").empty();

                let option = '';

                if (+response?.results.length === 0)
                    option += '<option value="" selected disabled>Not data ward</option>'
                else
                    option += '<option value="" selected disabled>---Select---</option>'

                option += `${response?.results.map(ward => (`
                    <option value="${ward.ward_id}">${ward.ward_name}</option>
                `)).join('')}`

                $("#ward").append(option);
            }
        }).fail(function () {
            alert("error");
        });

        handleGetValueAddress();
    });

    $(document).on("change", "#ward", function () {
        handleGetValueAddress()
    });

    let debounce;
    $(document).on("keyup change", "#note", function () {

        clearTimeout(debounce);

        debounce = setTimeout(() => {
            handleGetValueAddress();
        }, 500)
    })


    function handleGetValueAddress() {
        const province_id = $("#province").val();
        const district_id = $("#district").val();
        const ward_id = $("#ward").val();

        const province_value = $(`#province option[value='${province_id}']`).text();
        const district_value = $(`#district option[value='${district_id}']`).text();
        const ward_value = $(`#ward option[value='${ward_id}']`).text();

        let address = '';

        if (province_value)
            address += `${province_value}`;

        if (district_value)
            address += `, ${district_value}`;

        if (ward_value)
            address += `, ${ward_value}`;

        if ($("#note").val())
            address += `, ${$("#note").val()}`;

        $("#address").attr("value", address);
    }


})

