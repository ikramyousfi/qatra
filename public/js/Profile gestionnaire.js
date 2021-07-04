var max = document.getElementById("maxAB+").value;

var ABp = document.getElementById("AB+");
var greyarea1 = 100 - (ABp.value * 100) / max;
var percentage1 = document.getElementById("percentage1");

max = document.getElementById("maxAB-").value;

var ABn = document.getElementById("AB-");
var greyarea2 = 100 - (ABn.value * 100) / max;
var percentage2 = document.getElementById("percentage2");

max = document.getElementById("maxA+").value;

var Ap = document.getElementById("A+");
var greyarea3 = 100 - (Ap.value * 100) / max;
var percentage3 = document.getElementById("percentage3");

max = document.getElementById("maxA-").value;

var An = document.getElementById("A-");
var greyarea4 = 100 - (An.value * 100) / max;
var percentage4 = document.getElementById("percentage4");

max = document.getElementById("B+").value;

var Bp = document.getElementById("B+");
var greyarea5 = 100 - (Bp.value * 100) / max;
var percentage5 = document.getElementById("percentage5");

max = document.getElementById("maxB-").value;

var Bn = document.getElementById("B-");
var greyarea6 = 100 - (Bn.value * 100) / max;
var percentage6 = document.getElementById("percentage6");

max = document.getElementById("maxO+").value;

var Op = document.getElementById("O+");
var greyarea7 = 100 - (Op.value * 100) / max;
var percentage7 = document.getElementById("percentage7");

max = document.getElementById("maxO-").value;

var On = document.getElementById("O-");
var greyarea8 = 100 - (On.value * 100) / max;
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
                label: "% of Stock",
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
                label: "% of Stock",
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
                label: "% of Stock",
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
                label: "% of Stock",
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
                label: "% of Stock",
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
                label: "% of Stock",
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
                label: "% of Stock",
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
                label: "% of Stock",
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
    var max = document.getElementById("maxAB+").value;
    if (ABp.value / max < 0) {
        ABp.value = 0;
        document.getElementById("AB+").textContent = 0;
    }
    if (ABp.value / max > 1) {
        ABp.value = max;
        document.getElementById("AB+").textContent = max;
    }
    let percentage = Math.round((ABp.value * 100) / max);
    let greyarea1 = 100 - percentage;
    chart1.data.datasets[0].data = [percentage, greyarea1];
    percentage1.textContent = percentage + "%";
    chart1.update();
}
function updateChart2() {
    var max = document.getElementById("maxAB-").value;
    if (ABn.value / max < 0) {
        ABn.value = 0;
        document.getElementById("AB-").textContent = 0;
    }
    if (ABn.value / max > 1) {
        ABn.value = max;
        document.getElementById("AB-").textContent = max;
    }
    let percentage = Math.round((ABn.value * 100) / max);
    let greyarea2 = 100 - percentage;
    chart2.data.datasets[0].data = [percentage, greyarea2];
    percentage2.textContent = percentage + "%";
    chart2.update();
    console.log(max);
}
function updateChart3() {
    var max = document.getElementById("maxA+").value;
    if (Ap.value / max < 0) {
        Ap.value = 0;
        document.getElementById("A+").textContent = 0;
    }
    if (Ap.value / max > 1) {
        Ap.value = max;
        document.getElementById("A+").textContent = max;
    }
    let percentage = Math.round((Ap.value * 100) / max);
    let greyarea3 = 100 - percentage;
    chart3.data.datasets[0].data = [percentage, greyarea3];
    percentage3.textContent = percentage + "%";
    chart3.update();
}

function updateChart4() {
    var max = document.getElementById("maxA-").value;
    if (An.value / max < 0) {
        An.value = 0;
        document.getElementById("A-").textContent = 0;
    }
    if (An.value / max > 1) {
        An.value = max;
        document.getElementById("A-").textContent = max;
    }
    let percentage = Math.round((An.value * 100) / max);
    let greyarea4 = 100 - percentage;
    chart4.data.datasets[0].data = [percentage, greyarea4];
    percentage4.textContent = percentage + "%";
    chart4.update();
}

function updateChart5() {
    var max = document.getElementById("maxB+").value;
    if (Bp.value / max < 0) {
        Bp.value = 0;
        document.getElementById("B+").textContent = 0;
    }
    if (Bp.value / max > 1) {
        Bp.value = max;
        document.getElementById("B+").textContent = max;
    }
    let percentage = Math.round((Bp.value * 100) / max);
    let greyarea5 = 100 - percentage;
    chart5.data.datasets[0].data = [percentage, greyarea5];
    percentage5.textContent = percentage + "%";
    chart5.update();
}

function updateChart6() {
    var max = document.getElementById("maxB-").value;
    if (Bn.value / max < 0) {
        Bn.value = 0;
        document.getElementById("B-").textContent = 0;
    }
    if (Bn.value / max > 1) {
        Bn.value = max;
        document.getElementById("B-").textContent = max;
    }
    let percentage = Math.round((Bn.value * 100) / max);
    let greyarea6 = 100 - percentage;
    chart6.data.datasets[0].data = [percentage, greyarea6];
    percentage6.textContent = percentage + "%";
    chart6.update();
}

function updateChart7() {
    var max = document.getElementById("maxO+").value;
    if (Op.value / max < 0) {
        Op.value = 0;
        document.getElementById("O+").textContent = 0;
    }
    if (Op.value / max > 1) {
        Op.value = max;
        document.getElementById("O+").textContent = max;
    }
    let percentage = Math.round((Op.value * 100) / max);
    let greyarea7 = 100 - percentage;
    chart7.data.datasets[0].data = [percentage, greyarea7];
    percentage7.textContent = percentage + "%";
    chart7.update();
}

function updateChart8() {
    var max = document.getElementById("maxO-").value;
    if (On.value / max < 0) {
        On.value = 0;
        document.getElementById("O-").textContent = 0;
    }
    if (On.value / max > 1) {
        On.value = max;
        document.getElementById("O-").textContent = max;
    }
    let percentage = Math.round((On.value * 100) / max);
    let greyarea8 = 100 - percentage;
    chart8.data.datasets[0].data = [percentage, greyarea8];
    percentage8.textContent = percentage + "%";
    chart8.update();
}

function storage() {
    window.localStorage.stockPercent1 = (ABp.value * 100) / max;
    window.localStorage.stockPercent2 = (ABn.value * 100) / max;
    window.localStorage.stockPercent3 = (Ap.value * 100) / max;
    window.localStorage.stockPercent4 = (An.value * 100) / max;
    window.localStorage.stockPercent5 = (Bp.value * 100) / max;
    window.localStorage.stockPercent6 = (Bn.value * 100) / max;
    window.localStorage.stockPercent7 = (Op.value * 100) / max;
    window.localStorage.stockPercent8 = (On.value * 100) / max;
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
