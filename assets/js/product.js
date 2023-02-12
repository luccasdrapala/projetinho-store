function clean()
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

function saveType(){

    const params = {
        url: `/products/create`,
        method: 'POST',
        data: {
            description: document.getElementById('productDescription').value,
            price: document.getElementById('productPrice').value,
            type_product_id: document.getElementById('').value,
        }
    }

    //if was updated
    if(document.getElementById('id').value != ''){
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