

function addProduct() {
    
    console.log("Passei")
    if(document.getElementById('product').value == "#"){
        toastr.warning('Product is required', 'Warning')
        return
    }

    if(document.getElementById('quantity').value == 0){
        toastr.warning('Quantity is required', 'Warning')
        return
    }

    $.ajax({
        url: `${BASE_URL}sales/getItems/${document.getElementById('product').value}`,
        method: "GET",
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                console.log(data.data)
                // populateTableItems(data.data)
                // $('#modalSales').modal({backdrop: 'static', keyboard: false})
            }
        },
        error: (e) => {
            console.log(e)
            toastr.error('Ops, a error ocurred!', 'Error!')
        }
    })

}