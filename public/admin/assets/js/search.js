let loader = document.querySelectorAll(".loader");
let keyword = JSON.parse(localStorage.getItem("kyw")) || "";

function setLoading(selector) {
    setTimeout(() => {
        loader.forEach((item) => {
            console.log(item);
            selector.style.visibility = "hidden";

            item.style.display = "block";
        });
    }, 500);
}

let debounce;

function searchInput(input, table, form) {
    input?.addEventListener("keyup", function (e) {
        setLoading(table);

        clearTimeout(debounce);

        localStorage.setItem("kyw", JSON.stringify(e.target.value));

        debounce = setTimeout(() => {
            form.submit();
        }, 1000);
    });
}

function formSubmit(form, table) {
    form?.addEventListener("submit", function (e) {
        e.preventDefault();
        loader.forEach((item) => {
            console.log(item);
            table.style.visibility = "hidden";

            item.style.display = "block";
        });
        setTimeout(() => {
            loader.forEach((item) => {
                console.log(item);
                table.style.visibility = "visible";

                item.style.display = "none";
            });
        }, 1000);
    });


}

// search group
let keyword_search = document.querySelector(".keyw_s");

let table_s = document.querySelector(".table_s");
let form_s = document.querySelector(".form_s");
console.log(keyword_search, table_s, form_s);

searchInput(keyword_search, table_s, form_s);

formSubmit(form_s, table_s);

// select group
let select_gr = document.querySelector('.select_gr');

select_gr?.addEventListener("change", function (e) {
    localStorage.setItem("idSelect", JSON.stringify(e.target.value));
    setLoading(table_s);
    setTimeout(() => {
        form_s.submit();
    }, 1500);
});