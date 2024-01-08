function calculateCube() {
    const makeNum = str => isNaN(str) || str.trim() === "" ? 0 : +str;

    window.addEventListener("load", function () {
        const table = document.getElementById("invoiceDetailsTable");
        const tbody = table.querySelector("tbody");
        const grandTotal = document.querySelector("[name=anstotal]");

        tbody.addEventListener("input", function (e) {
            var sum = 0;
            [...tbody.querySelectorAll("tr")].forEach(row => {
                const width = makeNum(row.querySelector("[name='width[]']").value);
                const height = makeNum(row.querySelector("[name='height[]']").value);
                const length = makeNum(row.querySelector("[name='length[]']").value);
                const weight = makeNum(row.querySelector("[name='weight[]']").value);
                const priceCube = makeNum(row.querySelector("[name='price_cube[]']").value);
                const priceKg = makeNum(row.querySelector("[name='price_kg[]']").value);
                const placeCount = makeNum(row.querySelector("[name='place_count[]']").value);
                let totalSum,  totalWeight;
                totalWeight = weight * placeCount;
                const totalCube = width * height * length*placeCount;
                sum += totalCube;
                const cubicMetres = weight / totalCube;

                if (priceKg != 0 && !isNaN(priceKg)) {
                    totalSum = priceKg * totalWeight;
                } else {
                    totalSum = priceCube * totalCube;
                }


                row.querySelector("[name='cube[]']").value = totalCube.toFixed(3);
                row.querySelector("[name='cubic_metres[]']").value = cubicMetres.toFixed(3);
                row.querySelector("[name='total_sum[]']").value = totalSum.toFixed(2);
                row.querySelector("[name='total_price[]']").value = totalSum.toFixed(2);
                row.querySelector("[name='total_weight[]']").value = totalWeight.toFixed(2);
            });

            // Now you can calculate the total width, length, and height
            console.log("Total Width:", sum.toFixed(2));
        });
    });
}

function cloneCleanRow() {
    var table = document.getElementById("invoiceDetailsTable");
    var rowToClone = table.querySelector("tbody tr");
    var newRow = rowToClone.cloneNode(true);

    // Clear the content of the new row
    var inputs = newRow.querySelectorAll("input");
    inputs.forEach(function(input) {
        input.value = "";
    });

    var rowNumberCell = newRow.querySelector(".row-number");

    rowNumberCell.textContent = getRowCount()+1;

    // Append the new row to the table
    table.querySelector("tbody").appendChild(newRow);

}



function getRowCount() {
    var table = document.getElementById("invoiceDetailsTable");
    var rowCount = table.getElementsByTagName("tbody")[0].rows.length;
   return   rowCount;
}

calculateCube();

$(document).ready(function() {
        const makeNum = str => isNaN(str) || str.trim() === "" ? 0 : +str;

        window.addEventListener("load", function () {
            const table = document.getElementById("invoiceDetailsTable");
            const tbody = table.querySelector("tbody");
            const grandTotal = document.querySelector("[name=anstotal]");


                var sum = 0;
                [...tbody.querySelectorAll("tr")].forEach(row => {
                    const width = makeNum(row.querySelector("[name='width[]']").value);
                    const height = makeNum(row.querySelector("[name='height[]']").value);
                    const length = makeNum(row.querySelector("[name='length[]']").value);
                    const weight = makeNum(row.querySelector("[name='weight[]']").value);
                    const priceCube = makeNum(row.querySelector("[name='price_cube[]']").value);
                    const priceKg = makeNum(row.querySelector("[name='price_kg[]']").value);
                    const placeCount = makeNum(row.querySelector("[name='place_count[]']").value);
                    let totalSum, totalWeight;
                    totalWeight = weight * placeCount;

                    const totalCube = width * height * length * placeCount;
                    sum += totalCube;
                    const cubicMetres = weight / totalCube;

                    if (priceKg != 0 && !isNaN(priceKg)) {
                        totalSum = priceKg * totalWeight;
                    } else {
                        totalSum = priceCube * totalCube;
                    }


                    row.querySelector("[name='cube[]']").value = totalCube.toFixed(3);
                    row.querySelector("[name='cubic_metres[]']").value = cubicMetres.toFixed(3);
                    row.querySelector("[name='total_sum[]']").value = totalSum.toFixed(2);
                    row.querySelector("[name='total_price[]']").value = totalSum.toFixed(2);
                    row.querySelector("[name='total_weight[]']").value = totalWeight.toFixed(2);
                });

                // Now you can calculate the total width, length, and height
                console.log("Total Width:", sum.toFixed(2));

        });


});
