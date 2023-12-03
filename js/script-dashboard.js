const allSideMenu = document.querySelectorAll("#sidebar .side.menu.top li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// Toggle Sidebar
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

// const searchButton = document.querySelector('#content nav form .form-input button');
// const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
// const searchForm = document.querySelector('#content nav form');

// searchButton.addEventListener('click', function (e) {
// 	if(window.innerWidth < 576) {
// 		e.preventDefault();
// 		searchForm.classList.toggle('show');
// 		if(searchForm.classList.contains('show')) {
// 			searchButtonIcon.classList.replace('bx-search', 'bx-x');
// 		} else {
// 			searchButtonIcon.classList.replace('bx-x', 'bx-search');
// 		}
// 	}
// })

// document.addEventListener("DOMContentLoaded", function () {
//   var searchInput = document.getElementById("search-input1");
//   var tableRows = document.querySelectorAll("tbody tr"); // Ganti dengan selektor yang sesuai

//   searchInput.addEventListener("input", function () {
//     var searchValue = searchInput.value.toLowerCase();

//     tableRows.forEach(function (row) {
//       var rowText = row.textContent.toLowerCase();

//       if (rowText.includes(searchValue)) {
//         row.style.display = "";
//       } else {
//         row.style.display = "none";
//       }
//     });
//   });
// });

if (window.innerWidth < 768) {
  sidebar.classList.add("hide");
} else if (window.innerWidth < 576) {
  searchButtonIcon.classList.replace("bx-x", "bx-search");
  searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
  if (this.innerWidth > 576) {
    searchButtonIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
  }
});

// Switch Mode
const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

// Check if 'switch-mode' is in localStorage and set the checkbox accordingly
if (localStorage.getItem("switch-mode") === "true") {
  document.getElementById("switch-mode").checked = true;
} else {
  document.getElementById("switch-mode").checked = false;
}

// Add an event listener to the checkbox to update localStorage when it changes
document.getElementById("switch-mode").addEventListener("change", function () {
  localStorage.setItem("switch-mode", this.checked);
});

//search bar scanner
// document.querySelector('input[type="search"]').addEventListener('input', function() {
//   var searchQuery = this.value;
//   // Lakukan aksi pencarian dengan searchQuery
// });

// APEXCHART /
var options = {
  series: [
    {
      name: "series1",
      data: [31, 40, 28, 51, 42, 109, 100],
    },
    {
      name: "series2",
      data: [11, 32, 45, 32, 34, 52, 41],
    },
  ],
  chart: {
    height: 350,
    type: "area",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
  },
  xaxis: {
    type: "datetime",
    categories: [
      "2018-09-19T00:00:00.000Z",
      "2018-09-19T01:30:00.000Z",
      "2018-09-19T02:30:00.000Z",
      "2018-09-19T03:30:00.000Z",
      "2018-09-19T04:30:00.000Z",
      "2018-09-19T05:30:00.000Z",
      "2018-09-19T06:30:00.000Z",
    ],
  },
  tooltip: {
    x: {
      format: "dd/MM/yy HH:mm",
    },
  },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
