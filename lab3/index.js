var k = 2;
function addTable() {
    var check = document.getElementById("super_table");
    if (check !== null) {
        alert("Таблица уже создана!");
        return;
    }
    var table = document.createElement("table");
    table.setAttribute("id", "super_table");
    var tr1 = document.createElement("tr");
    var th1 = document.createElement("th");
    th1.innerHTML = "ID";
    var th2 = document.createElement("th");
    th2.innerHTML = "Text";
    tr1.appendChild(th1);
    tr1.appendChild(th2);
    table.appendChild(tr1);
    var tr2 = document.createElement("tr");
    var td11 = document.createElement("td");
    td11.innerHTML = "1";
    tr2.appendChild(td11);
    var td12 = document.createElement("td");
    td12.innerHTML = "Hello";
    tr2.appendChild(td12);
    table.appendChild(tr2);
    var tr3 = document.createElement("tr");
    var td21 = document.createElement("td");
    td21.innerHTML = "2";
    tr3.appendChild(td21);
    var td22 = document.createElement("td");
    td22.innerHTML = "World";
    tr3.appendChild(td22);
    table.appendChild(tr3);
    document.getElementById("root").appendChild(table);
    document.getElementById("button1").disabled = false;
    document.getElementById("button2").disabled = false;
}

function addRow() {
    k++;
    var table = document.getElementById("super_table");
    var addtext = document.getElementById("addtext");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "" + k;
    cell2.innerHTML = addtext.value;
    addtext.value = "";
}

function deleteRow() {
    var table = document.getElementById("super_table");
    var number = document.getElementById("number").value;
    if (isNaN(number) || number === "") {
        alert("Пожалуйста, введите число");
        return;
    }
    var length = table.rows.length;
    if (number >= length) {
        document.getElementById("number").value = "";
        alert("Строки с таким номером не существует");
        return;
    }
    if (length === 1) {
        document.getElementById("button1").disabled = true;
        document.getElementById("button2").disabled = true;
        table.setAttribute("id", "");
        table.deleteRow(0);
        document.getElementById("number").value = "";
        k = 2;
    } else {
        table.deleteRow(number);
        document.getElementById("number").value = "";
        length = table.rows.length;
        for (var i = number; i < length; i++) {
            table.rows[i].cells[0].innerHTML = "" + i;
        }
        k--;
    }
}