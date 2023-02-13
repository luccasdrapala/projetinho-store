// document.getElementById('product').addEventListener('change', function(){
    
// })

function newSale(){
    document.getElementById('product').value = '#';
    document.getElementById('quantity').value = '';
    document.getElementById('price').value = '';
    document.getElementById('Tax').value = '';
    document.getElementById('sale').value = '';

    document.getElementById('totalPrice').value = '';
    document.getElementById('totalTax').value = '';
    document.getElementById('totalSale').value = '';

    $.ajax({
        url: `${BASE_URL}sales/getItems/${id}`,
        method: "GET",
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                populateTableItems(data.data)
                $('#modalSales').modal({backdrop: 'static', keyboard: false})
            }
        },
        error: (e) => {
            console.log(e)
            toastr.error('Ops, a error ocurred!', 'Error!')
        }
    })
}

// function getSales(){

// }