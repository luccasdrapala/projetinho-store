let totalItem = 0;
let totalTax  = 0;

$('#addSale').click(() => {
    $('#id').val('');
    $('#productName').val("").trigger("change").attr('selected');
    $('#quantity').val('1,00');
    $('#price').val('0,00');
    $('#tax').val('0,00');
    $('#totalItem').val('0,00');
    $('#tableItensSales tbody').empty();
    $('#totalTax').val('0,00');
    $('#totalSale').val('0,00');
    $('#totalItems').val('0,00');

    $('#saveSale').removeAttr('disabled');
    $('#addItem').removeAttr('disabled');
    $('#productName').removeAttr('disabled');
    $('#quantity').removeAttr('disabled');

    $('#modalSales').modal({backdrop: 'static', keyboard: false});

    totalItem = 0;
    totalTax  = 0;
})

function editModal(id, items) {
    $('#id').val(id)

    $('#saveSale').attr('disabled', true);
    $('#addItem').attr('disabled', true);
    $('#productName').attr('disabled', true);
    $('#quantity').attr('disabled', true);

    $.ajax({
        url: `${BASE_URL}sales/getItems/${id}`,
        method: "GET",
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                populateTableItems(data.data);
                $('#modalSales').modal({backdrop: 'static', keyboard: false});
            }
        },
        error: (e) => {
            console.log(e);
            alert('Ops, a error ocurred!');
        }
    })
}


function deleteSale(id) {
    $.ajax({
        url: `${BASE_URL}sales/delete/${id}`,
        method: "DELETE",
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                alert('Sale was deleted!');
                window.location.reload();
            }
        },
        error: (e) => {
            alert('Ops, a error ocurred!');
        }
    })
}

$('#addItem').on('click', () => {
    let strItem = ``;
    let itemExists = false;

    if ($('#productName option:selected').val().trim() === "") {
        alert('Product is required')
        return false;
    }

    if ($('#quantity').val() === "" || $('#quantity').val() == 0) {
        alert('Quantity is required')
        return false;
    }

    if ($('#price').val() === "" || $('#price').val() == 0) {
        alert('Price is required');
        return false;
    }

    $('#tableItensSales').find("tbody tr").each(function () {
        itemExists = false

        if ($('#productName option:selected').val() == $(this).find("td:eq(0)").html()) {
            itemExists = true;
        }
    });

    if (itemExists === false) {
        strItem = `<tr class="deleteItem">
                        <td>${$('#productName option:selected').val()}</td>
                        <td>${$('#productName option:selected').text()}</td>
                        <td class="text-right">${numberFormat($('#price').val())}</td>
                        <td class="text-right">${numberFormat($('#quantity').val())}</td>
                        <td class="text-right">${numberFormat(calculateTax(($('#price').val() * $('#quantity').val()), $('#tax').val()))}</td>
                        <td class="text-right">${numberFormat($('#totalItem').val())}</td>
                        <td class="text-center"><button type="button" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button></td>
                    </tr>`;

        $('#tableItensSales').append(strItem);
        clearItemFields();
    } else {
        alert(`${$('#productName option:selected').text()} already exists`);
    }

    calculateTotalItem();
    $('#addItem').focus();
})

function populateTableItems(data) {
    let strItem = ``

    if (!data) {
        return false;
    }

    $('#tableItensSales tbody').empty();

    data.forEach(el => {
        strItem += `<tr class="deleteItem">
                        <td>${el.product_id}</td>
                        <td>${el.product_name}</td>
                        <td class="text-right">${numberFormat(el.price)}</td>
                        <td class="text-right">${numberFormat(el.quantity)}</td>
                        <td class="text-right">${numberFormat(el.tax)}</td>
                        <td class="text-right">${numberFormat(currencyToNumber((el.price * el.quantity) + currencyToNumber(el.tax)))}</td>
                        <td class="text-center"><button type="button" class="btn btn-danger btn-sm" disabled> <i class="fa fa-trash"></i></button></td>
                    </tr>`;
    });

    $('#tableItensSales').append(strItem);
    calculateTotalItem();
}

function calculateTax(valueItem, tax) {
    return (currencyToNumber(valueItem) * currencyToNumber(tax)) / 100;
}

function calculateItem(price, quantity, tax) {

    const valueItem = currencyToNumber(price) * currencyToNumber(quantity);
    const valueTax  = calculateTax(valueItem, tax);

    return valueItem + valueTax;
}

function calculateTotalItem() {
    totalTax  = 0;
    totalItem = 0;

    $('#tableItensSales').find("tbody tr").each(function () {

        let tax = currencyToNumber($(this).find("td:eq(4)").html());
        totalTax += tax;

        let value = (currencyToNumber($(this).find("td:eq(2)").html()) * currencyToNumber($(this).find("td:eq(3)").html()));
        totalItem += value;
    });

    $('#totalItems').val(numberFormat(totalItem));
    $('#totalTax').val(numberFormat(totalTax));
    $('#totalSale').val(numberFormat(totalItem + totalTax));
}

$('#quantity, #price').on('change', function() {
    $("#totalItem").val(numberFormat(calculateItem($('#price').val(), $('#quantity').val(), $('#tax').val())));
});

$('#productName').on('change', function() {
    $('#price').val(numberFormat($(this).find(':selected').data('price')));
    $('#tax').val(numberFormat($(this).find(':selected').data('tax')));
    $("#totalItem").val(numberFormat(calculateItem($('#price').val(), $('#quantity').val(), $('#tax').val())));
});

function clearItemFields() {
    $('#productName').val("").trigger("change");
    $('#quantity').val('1,00');
    $('#price').val('0,00');
    $('#tax').val('0,00');
    $('#totalItem').val('0,00');
}

$("#tableItensSales").on("click", ".deleteItem", function() {
    $(this).closest("tr").remove();
    calculateTotalItem();
})

function getSaleItems() {
    let items = [];

    $('#tableItensSales').find("tbody tr").each(function () {
        items.push({
            product_id: $(this).find("td:eq(0)").html(),
            quantity: currencyToNumber($(this).find("td:eq(3)").html()),
            price: currencyToNumber($(this).find("td:eq(2)").html()),
            tax: currencyToNumber($(this).find("td:eq(4)").html())
        })
    })

    return items;
}

$('#saveSale').on('click', () => {

    if (!$('#tableItensSales tbody').find('tr').length) {
        alert('Please add a item', 'Warning');
        return false;
    }

    const data = {
        total_price: $('#totalSale').val(),
        total_tax: $('#totalTax').val(),
        items: getSaleItems()
    }

    $.ajax({
        url: `${BASE_URL}sales/create`,
        method: 'POST',
        dataType: 'JSON',
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: (data) => {
            if (data.code === 200 || data.code === 201) {
                alert('Sale was created/updated!');
            } else {
                alert(data.data);
            }

            window.location.reload();
        },
        error: (e) => {
            console.log(e);
            alert(e.responseJSON.data);
        }
    })

    $('#modalSales').modal('hide');
});