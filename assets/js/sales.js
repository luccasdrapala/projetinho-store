let valueItem = 0
let valueTax = 0

function openModal(){
    document.getElementById('product').value == "#"
    document.getElementById('quantity').value == '1.00'
    console.log("passei")
}

$('#product').on('change', function() {
    
    let price = $('#price').val($(this).find(':selected').data('price'))
    let tax = $('#tax').val($(this).find(':selected').data('tax'))

    let quantity = document.getElementById('quantity').value

    document.getElementById('sale').value = calculateItem(price, tax, quantity)
})

$('#quantity').on('change', function() {

    document.getElementById('sale').value = calculateItem(price, tax, quantity)
})

function calculateItem(price, quantity, tax){
        
    const valueItem = currencyToNumber(price) * currencyToNumber(quantity)
    const valueTax  = calculateTax(valueItem, tax)

    return valueItem +valueTax
}

function currencyToNumber(value) {

    if (!value) {
        value = 0;
    }

    if (value.length > 10) {
        return isNaN(value) == false ? parseFloat(value) : parseFloat(value.replace(".", "").replace(",", ".").replace(".", ""))
    }

	return isNaN(value) == false ? parseFloat(value) : parseFloat(value.replace(".", "").replace(",", "."))
}



function editModal() {

    // if(document.getElementById('product').value == "#"){
    //     toastr.warning('Product is required', 'Warning')
    //     return
    // }

    // if(document.getElementById('quantity').value == 0){
    //     toastr.warning('Quantity is required', 'Warning')
    //     return
    // }

    $.ajax({
        url: `sales/getItems/${document.getElementById('product').value}`,
        method: "GET",
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                console.log(data.data)
                populateTableItems(data.data)
                // $('#modalSales').modal({backdrop: 'static', keyboard: false})
            }
        },
        error: (e) => {
            console.log(e)
            toastr.error('Ops, a error ocurred!', 'Error!')
        }
    })

}

function populateTableItems(data) {

    let Items = ''

    if(!data) {
        return
    }

    document.getElementById('tableBody').remove()

    data.array.forEach(el => {
        Items += `<tr class="text-center align-middle">
                    <td>${el.product_id}</td>
                    <td>${el.product_name}</td>
                    <td>${el.quantity}</td>
                    <td>${el.price}</td>
                    <td>${el.tax}</td>
                    <td>${(el.quantity*el.quantity)}</td> //colocar imposto
                    <td>12/02/2023</td>
                    <td>
                    <button  
                        class="btn btn-success">Sale</button>
                    <button class="btn btn-danger">Delete</button>
                    </td>
                </tr> `
    });

    document.getElementById('tableItensSale').append(Items)

}
