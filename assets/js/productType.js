
function clean()
{   
    document.getElementById("typeProduct").value = '';
    document.getElementById("taxProduct").value = '';
    document.getElementById("id").value = ''; //testar o erro do id 0
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

    //if was updated
    if(document.getElementById('id').value != ''){
        params.url = `product_types/update/${document.getElementById('id').value}`
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
            indow.location.reload(); //recarrega a pagina toda
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

function changeType(id, product_description, product_tax){

    new bootstrap.Modal(document.getElementById('exampleModal')).show()

    document.getElementById('typeProduct').value = product_description
    document.getElementById('taxProduct').value = product_tax
    document.getElementById('id').value = id

}

function deleteModal(id){
    
    document.getElementById('id').value = id
    console.log(id)
    new bootstrap.Modal(document.getElementById('deleteModal')).show()

}

function typeDelete(){
    
    console.log(document.getElementById('id').value)

    $.ajax({
        url: `product_types/delete/${document.getElementById('id').value}`,
        method: 'DELETE',
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                toastr.success('Product is deleted!', 'Success!')
                window.location.reload(); //recarrega a pagina toda
            }
            window.location.reload(); //recarrega a pagina toda
        },
        error: (e) => {
            toastr.error('Ops, a error ocurred!', 'Error!')
        }
    })
    window.location.reload(); //recarrega a pagina toda
}