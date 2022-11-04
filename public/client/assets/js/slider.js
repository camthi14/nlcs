$(document).ready(function () {
    let items = document.querySelectorAll('.main7_content-item');

    items = Array.from(items).map((i, index) => ({ image: i.dataset.image, id: index }));

    console.log(items);

    const newItems = Array.from(items).map(i => i.image);

    console.log(newItems);

    let filter = Array.from(items).filter(({ image }, index) => !newItems.includes(image, index + 1));

    filter = swapPosition(filter, 0, 1); // Swap vị trí đầu tiên cho phần tử thứ 2.
    filter = swapPosition(filter, 1, 2); // Swap vị trí cuối cùng cho phần tử thứ 2.

    document.querySelectorAll('.home_main7 .owl-dots .owl-dot span').forEach((item, index) => {
        console.log({item, data: filter[index]});
        item.style.backgroundImage = `url('${filter[index].image}')`;
    });

    $(".owl-carousel").owlCarousel();
});

function swapPosition(arr, i, j) {
    let temp = arr[i];
    arr[i] = arr[j];
    arr[j] = temp;
    return arr;
}

//main3
$('.js-slider').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});

// main_7
$('.main7_content').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }

})
$('.laster_product').owlCarousel({
    loop: false,
    margin: 10,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }

})


$('.slider').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    // autoplay: true,
    autoplayTimeout: 5000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
