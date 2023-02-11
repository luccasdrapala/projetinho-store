// console.log('passeiiiii')

// if(document.getElementById("typeProductsSection"))

// {
//     document.getElementById("addProductType").addEventListener("click", function(){

//         document.getElementById("typeProduct").value = '';

//         document.getElementById("taxProduct").value = '';

//         // new bootstrap.Modal(document.querySelector('modalTypeProducts')).show()
//         //show the modal

//     })

// }

function clean()
{   
    console.log('Pasei aqui')
    document.getElementById("typeProduct").value = '';
    document.getElementById("taxProduct").value = '';
}

function saveType(){

    const params = {
    url: `product_types/create`,
        method: 'POST',
        data: {
            product_description: document.getElementById('typeProduct').value,
            product_tax: document.getElementById('taxProduct').value
        }
    }

    $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        dataType: 'JSON',
        success: (data) => {
            if (data.code >= 200) {
                toastr.success('Product created/updated!', 'Success!')
            } else {
                toastr.warning(data.data, 'Warning!')
            }

            window.location.reload(); //recarrega a pagina toda
        },
        error: (e) => {
            console.log(e)
            if (e.responseJSON.code == 400) { 
                toastr.warning(e.responseJSON.data, 'Warning!')
            } else {
                toastr.error(e.responseJSON.data, 'Error!')
            } 
        }
    })
}

function changeType(id, product_description, product_tax){

    document.getElementById('typeProduct').value = product_description
    document.getElementById('taxProduct').value = product_tax

    new bootstrap.Modal(document.getElementById('exampleModal')).show()

}