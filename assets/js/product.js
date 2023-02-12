function cleanProduct()
{   
    document.getElementById("productDescription").value = '';
    document.getElementById("productPrice").value = '';
    document.getElementById("productType").value = '#';
    //document.getElementById("id").value = '';
    // window.onerror=function(){
    //     alert('An error has occurred!')
    //     return true
    // }
}

function saveProduct(){

    const params = {
        url: `/products/create`,
        method: 'POST',
        data: {
            description: document.getElementById('productDescription').value,
            price: document.getElementById('productPrice').value,
            type_product_id: document.getElementById('productType').value,
        }
    }

    //if was updated
    if(document.getElementById('id').value != ''){
        console.log("passei")
        params.url = `products/update/${document.getElementById('id').value}`
    }

    $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        dataType: 'JSON',
        success: (data) => {
            if (data.code >= 200) {
                console.log('Sucesso')
            } else {
                console.log('Warning')
            }
            // window.location.reload(); //recarrega a pagina toda
        },
        error: (e) => {
            console.log(e)
            if (e.responseJSON.code == 400) { 
                console.log('Warning!')
            } else {
                console.log('erro')
            } 
        }
    })
    window.location.reload(); //recarrega a pagina toda
}

function changeProduct(id, product_description, product_price, product_type_id){

    new bootstrap.Modal(document.getElementById('exampleModal')).show()

    document.getElementById("productDescription").value = product_description
    document.getElementById("productPrice").value = product_price
    document.getElementById("productType").value = product_type_id
    document.getElementById("id").value = id
}


function showDeleteModal(id){

    document.getElementById('id').value = id
    console.log('Product modal ' + id)
    new bootstrap.Modal(document.getElementById('deleteProductModal')).show()

}

function productDelete(){

    console.log(document.getElementById('id').value)

    $.ajax({
        url: `products/delete/${document.getElementById('id').value}`,
        method: 'DELETE',
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                toastr.success('Product is deleted!', 'Success!')
                //window.location.reload(); //recarrega a pagina toda
            }
           // window.location.reload(); //recarrega a pagina toda
        },
        error: (e) => {
            toastr.error('Ops, a error ocurred!', 'Error!')
            console.log(e.responseJSON.code)
        }
    })
    window.location.reload(); //recarrega a pagina toda
}
