require('./bootstrap');
import 'swiper/css';
import AOS from 'aos';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import $ from 'jquery';

document.addEventListener('DOMContentLoaded', function () {

    AOS.init();

    let btn = $('#myBtn');
    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    require('./gsap');


    //toggle header on time
    const toggleScrollClass = function () {
        if (window.scrollY > 24) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    }
    toggleScrollClass();

    //check scroll to take actions on it
    window.addEventListener('scroll', function () {
        toggleScrollClass();
    });

    const swiper = new Swiper('.swiper1', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        autoplay: true,
        grabCursor: true,
        pagination: false,
        navigation: {
            nextEl: '.swiper-next',
            prevEl: '.swiper-prev',
        },
        disableOnInteraction: false,
    });
    const swiper2 = new Swiper('.swiper2', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        slidesPerView: 1,
        centeredSlides: true,
        roundLengths: false,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
        },
        disableOnInteraction: false,
    });
    const swiper3 = new Swiper('.swiper3', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        spaceBetween: 30,
        slidesPerView: 1.2,
        centeredSlides: true,
        roundLengths: false,
        grabCursor: true,
        disableOnInteraction: false,
        breakpoints: {
// when window width is >= 640px
            640: {
                slidesPerView: 2,
                spaceBetween: 40
            }
        }
    });


    var table = document.getElementById("myTable");
    var headers = table.getElementsByTagName("th");
    var searchInput = document.getElementById("searchInput");
    var sortDirection = {};
    var dropdown = document.getElementById("dropdown");
    var resetButton = document.createElement("button");
    resetButton.classList.add("btn", "btn-secondary", "ml-2");
    resetButton.innerHTML = "پاک کردن";
    resetButton.style.display = "none";
    dropdown.parentNode.insertBefore(resetButton, dropdown.nextSibling);

// populate the dropdown options from the third column of the table's value
    for (var i = 1; i < table.rows.length; i++) {
        var option = document.createElement("option");
        option.text = table.rows[i].cells[2].innerText;
        dropdown.add(option);
    }

    var rowsPerPage = document.getElementById("rowsPerPage");

// add the change event listener to the rowsPerPage dropdown
    rowsPerPage.addEventListener("change", function () {
        var numRows = parseInt(rowsPerPage.value);
        var tableRows = table.getElementsByTagName("tr");

        // loop through the table rows and hide/show based on the selected number of rows
        for (var i = 1; i < tableRows.length; i++) { // start loop from index 1 to skip header row
            if (i <= numRows) {
                tableRows[i].style.display = "";
            } else {
                tableRows[i].style.display = "none";
            }
        }
    });

// add the change event listener to the dropdown
    dropdown.addEventListener("change", function () {
        var selectedOption = dropdown.options[dropdown.selectedIndex].text.toUpperCase();
        var tableRows = table.getElementsByTagName("tr");

        // loop through the table rows and hide/show based on the selected option
        for (var i = 1; i < tableRows.length; i++) { // start loop from index 1 to skip header row
            var cells = tableRows[i].getElementsByTagName("td");
            var rowText = cells[2].innerText.toLocaleString(undefined, {useGrouping: false}).toUpperCase();

            if (selectedOption === rowText || selectedOption === "") {
                tableRows[i].style.display = "";
            } else {
                tableRows[i].style.display = "none";
            }
        }

        // Show reset button
        resetButton.style.display = "inline-block";
    });

// add reset button event listener
    resetButton.addEventListener("click", function () {
        var tableRows = table.getElementsByTagName("tr");

        // loop through the table rows and show all rows
        for (var i = 1; i < tableRows.length; i++) {
            tableRows[i].style.display = "";
        }

        // Reset dropdown
        dropdown.selectedIndex = 0;

        // Hide reset button
        resetButton.style.display = "none";
    });

// add the click event listener to the table headers
    for (var i = 0; i < headers.length; i++) {
        (function (colIndex) {
            headers[colIndex].addEventListener("click", function () {
                sortTable(colIndex);
            });
        })(i);
    }

// add the input event listener to the search input
    searchInput.addEventListener("input", function () {
        var filter = searchInput.value.toUpperCase();
        var tableRows = table.getElementsByTagName("tr");

        // loop through the table rows and hide/show based on the search query
        for (var i = 1; i < tableRows.length; i++) { // start loop from index 1 to skip header row
            var cells = tableRows[i].getElementsByTagName("td");
            var rowText = "";

            for (var j = 0; j < cells.length; j++) {
                rowText += cells[j].innerText.toLocaleString(undefined, {useGrouping: false}).toUpperCase() + " ";
            }

            if (rowText.indexOf(filter) > -1) {
                tableRows[i].style.display = "";
            } else {
                tableRows[i].style.display = "none";
            }
        }
    });

    var sortDirection = Array(table.rows[0].cells.length).fill("asc");

    function sortTable(colIndex) {
        var tableRows = table.getElementsByTagName("tr");
        var rowArray = [];
        for (var i = 1; i < tableRows.length; i++) {
            rowArray.push(tableRows[i]);
        }
        if (isNaN(parseFloat(rowArray[0].getElementsByTagName("td")[colIndex].innerText))) {
            rowArray.sort(function (a, b) {
                var aVal = a.getElementsByTagName("td")[colIndex].innerText.toLocaleString(undefined, {useGrouping: false});
                var bVal = b.getElementsByTagName("td")[colIndex].innerText.toLocaleString(undefined, {useGrouping: false});
                return aVal.localeCompare(bVal);
            });
        } else {
            rowArray.sort(function (a, b) {
                var aVal = parseFloat(a.getElementsByTagName("td")[colIndex].innerText);
                var bVal = parseFloat(b.getElementsByTagName("td")[colIndex].innerText);
                return aVal - bVal;
            });
        }
        if (sortDirection[colIndex] === "desc") {
            rowArray.reverse();
        }
        for (var i = 0; i < rowArray.length; i++) {
            table.tBodies[0].appendChild(rowArray[i]);
        }
        sortDirection[colIndex] = sortDirection[colIndex] === "asc" ? "desc" : "asc";
    }

// show only the first 5 rows
    var rowsPerPage = document.getElementById("rowsPerPage");
    rowsPerPage.value = 25;
    var numRows = parseInt(rowsPerPage.value);
    var tableRows = table.getElementsByTagName("tr");

    for (var i = 1; i < tableRows.length; i++) {
        if (i <= numRows) {
            tableRows[i].style.display = "";
        } else {
            tableRows[i].style.display = "none";
        }
    }

})





