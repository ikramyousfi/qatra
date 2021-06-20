var ABp = document.getElementById("ABp");
var greyarea1 = 100 - ABp.value;
var percentage1 = document.getElementById("percentage1");

var ABn = document.getElementById("ABn");
var greyarea2 = 100 - ABn.value;
var percentage2 = document.getElementById("percentage2");

var Ap = document.getElementById("Ap");
var greyarea3 = 100 - Ap.value;
var percentage3 = document.getElementById("percentage3");

var An = document.getElementById("An");
var greyarea4 = 100 - An.value;
var percentage4 = document.getElementById("percentage4");

var Bp = document.getElementById("Bp");
var greyarea5 = 100 - Bp.value;
var percentage5 = document.getElementById("percentage5");

var Bn = document.getElementById("Bn");
var greyarea6 = 100 - Bn.value;
var percentage6 = document.getElementById("percentage6");

var Op = document.getElementById("Op");
var greyarea7 = 100 - Op.value;
var percentage7 = document.getElementById("percentage7");

var On = document.getElementById("On");
var greyarea8 = 100 - On.value;
var percentage8 = document.getElementById("percentage8");

var Maj = document.getElementById("maj");

window.onload = function () {
    // getValues();
    updateChart1();
    updateChart2();
    updateChart3();
    updateChart4();
    updateChart5();
    updateChart6();
    updateChart7();
    updateChart8();
};

Maj.addEventListener("click", storage);

ABp.addEventListener("change", updateChart1);
ABn.addEventListener("change", updateChart2);

Ap.addEventListener("change", updateChart3);
An.addEventListener("change", updateChart4);

Bp.addEventListener("change", updateChart5);
Bn.addEventListener("change", updateChart6);

Op.addEventListener("change", updateChart7);
On.addEventListener("change", updateChart8);

var ctx1 = document.getElementById("chart1").getContext("2d");
var chart1 = new Chart(ctx1, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: "# of Votes",
                data: [ABp, greyarea1],
                backgroundColor: ["red", "lightgrey"],
                borderColor: ["red", "lightgrey"],
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "80%",
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
    },
});

var ctx2 = document.getElementById("chart2").getContext("2d");

var chart2 = new Chart(ctx2, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: "# of Votes",
                data: [ABn, greyarea2],
                backgroundColor: ["red", "lightgrey"],
                borderColor: ["red", "lightgrey"],
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "80%",
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
    },
});

var ctx3 = document.getElementById("chart3").getContext("2d");
var chart3 = new Chart(ctx3, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: "# of Votes",
                data: [Ap, greyarea3],
                backgroundColor: ["red", "lightgrey"],
                borderColor: ["red", "lightgrey"],
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "80%",
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
    },
});

var ctx4 = document.getElementById("chart4").getContext("2d");
var chart4 = new Chart(ctx4, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: "# of Votes",
                data: [An, greyarea4],
                backgroundColor: ["red", "lightgrey"],
                borderColor: ["red", "lightgrey"],
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "80%",
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
    },
});

var ctx5 = document.getElementById("chart5").getContext("2d");
var chart5 = new Chart(ctx5, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: "# of Votes",
                data: [Bp, greyarea5],
                backgroundColor: ["red", "lightgrey"],
                borderColor: ["red", "lightgrey"],
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "80%",
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
    },
});

var ctx6 = document.getElementById("chart6").getContext("2d");
var chart6 = new Chart(ctx6, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: "# of Votes",
                data: [Bn, greyarea6],
                backgroundColor: ["red", "lightgrey"],
                borderColor: ["red", "lightgrey"],
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "80%",
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
    },
});

var ctx7 = document.getElementById("chart7").getContext("2d");
var chart7 = new Chart(ctx7, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: "# of Votes",
                data: [Op, greyarea7],
                backgroundColor: ["red", "lightgrey"],
                borderColor: ["red", "lightgrey"],
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "80%",
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
    },
});

var ctx8 = document.getElementById("chart8").getContext("2d");
var chart8 = new Chart(ctx8, {
    type: "doughnut",
    data: {
        datasets: [
            {
                label: "# of Votes",
                data: [On, greyarea8],
                backgroundColor: ["red", "lightgrey"],
                borderColor: ["red", "lightgrey"],
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "80%",
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
    },
});

function updateChart1() {
    if (ABp.value < 0) {
        ABp.value = 0;
        document.getElementById("ABp").textContent = 0;
    }
    let greyarea1 = 100 - ABp.value;
    chart1.data.datasets[0].data = [ABp.value, greyarea1];
    percentage1.textContent = ABp.value;
    chart1.update();
}
function updateChart2() {
    if (ABn.value < 0) {
        ABn.value = 0;
        document.getElementById("ABn").textContent = 0;
    }
    let greyarea2 = 100 - ABn.value;
    chart2.data.datasets[0].data = [ABn.value, greyarea2];
    percentage2.textContent = ABn.value;
    chart2.update();
}
function updateChart3() {
    if (Ap.value > 100) {
        Ap.value = 100;
        document.getElementById("Ap").textContent = "100";
    } else if (Ap.value < 0) {
        Ap.value = 0;
        document.getElementById("Ap").textContent = 0;
    }
    let greyarea3 = 100 - Ap.value;
    chart3.data.datasets[0].data = [Ap.value, greyarea3];
    percentage3.textContent = Ap.value;
    chart3.update();
}

function updateChart4() {
    if (An.value < 0) {
        An.value = 0;
        document.getElementById("An").textContent = 0;
    }
    let greyarea4 = 100 - An.value;
    chart4.data.datasets[0].data = [An.value, greyarea4];
    percentage4.textContent = An.value;
    chart4.update();
}

function updateChart5() {
    if (Bp.value > 100) {
        Bp.value = 100;
        document.getElementById("Bp").textContent = "100";
    } else if (Bp.value < 0) {
        Bp.value = 0;
        document.getElementById("Bp").textContent = 0;
    }
    let greyarea5 = 100 - Bp.value;
    chart5.data.datasets[0].data = [Bp.value, greyarea5];
    percentage5.textContent = Bp.value;
    chart5.update();
}

function updateChart6() {
    if (Bn.value > 100) {
        Bn.value = 100;
        document.getElementById("Bn").textContent = "100";
    } else if (Bn.value < 0) {
        Bn.value = 0;
        document.getElementById("Bn").textContent = 0;
    }
    let greyarea6 = 100 - Bn.value;
    chart6.data.datasets[0].data = [Bn.value, greyarea6];
    percentage6.textContent = Bn.value;
    chart6.update();
}

function updateChart7() {
    if (Op.value > 100) {
        Op.value = 100;
        document.getElementById("Op").textContent = "100";
    } else if (Op.value < 0) {
        Op.value = 0;
        document.getElementById("Op").textContent = 0;
    }
    let greyarea7 = 100 - Op.value;
    chart7.data.datasets[0].data = [Op.value, greyarea7];
    percentage7.textContent = Op.value;
    chart7.update();
}

function updateChart8() {
    if (On.value > 100) {
        On.value = 100;
        document.getElementById("On").textContent = "100";
    } else if (On.value < 0) {
        On.value = 0;
        document.getElementById("On").textContent = 0;
    }
    let greyarea8 = 100 - On.value;
    chart8.data.datasets[0].data = [On.value, greyarea8];
    percentage8.textContent = On.value;
    chart8.update();
}

function storage() {
    window.localStorage.stockPercent1 = ABp.value;
    window.localStorage.stockPercent2 = ABn.value;
    window.localStorage.stockPercent3 = Ap.value;
    window.localStorage.stockPercent4 = An.value;
    window.localStorage.stockPercent5 = Bp.value;
    window.localStorage.stockPercent6 = Bn.value;
    window.localStorage.stockPercent7 = Op.value;
    window.localStorage.stockPercent8 = On.value;
}

// function getValues() {
//   // stocker la premiere variable chart 1

//   let storageContent1 = window.localStorage.stockPercent1;
//   if (!storageContent1) {
//     ABp.value= 0;
//   }
//   else {
//     ABp.value = storageContent1;
//   }

//   // stocker la variable 2 chart 2

//   let storageContent2 = window.localStorage.stockPercent2;
//   if (!storageContent1) {
//     ABn.value= 0;
//   }
//   else {
//     ABn.value = storageContent2;
//   }

//   // stocker la variable 3 chart 3

//   let storageContent3 = window.localStorage.stockPercent3;
//   if (!storageContent3) {
//     Ap.value= 0;
//   }
//   else {
//     Ap.value = storageContent3;
//   }

//   // stocker la variable 4 chart 4

//   let storageContent4 = window.localStorage.stockPercent4;
//   if (!storageContent4) {
//     An.value= 0;
//   }
//   else {
//     An.value = storageContent4;
//   }

//   // stocker la variable 5 chart 5

//   let storageContent5 = window.localStorage.stockPercent5;
//   if (!storageContent5) {
//     Bp.value= 0;
//   }
//   else {
//     Bp.value = storageContent5;
//   }

//   // stocker la variable 6 chart 6

//   let storageContent6 = window.localStorage.stockPercent6;
//   if (!storageContent6) {
//     Bn.value= 0;
//   }
//   else {
//     Bn.value = storageContent6;
//   }

//   // stocker la variable 7 chart 7

//   let storageContent7 = window.localStorage.stockPercent7;
//   if (!storageContent7) {
//     Op.value= 0;
//   }
//   else {
//     Op.value = storageContent7;
//   }

//   // stocker la variable 8 chart 8

//   let storageContent8 = window.localStorage.stockPercent8;
//   if (!storageContent8) {
//     On.value= 0;
//   }
//   else {
//     On.value = storageContent8;
//   }
// }
