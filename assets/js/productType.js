function cleanType() {
    document.getElementById("typeProduct").value = '';
    document.getElementById("taxProduct").value = '';
    document.getElementById("id").value = '';
}

function saveType() {
    if (document.getElementById("typeProduct").value == '' ||
        document.getElementById("taxProduct").value == '' ||
        parseInt(document.getElementById("taxProduct").value) == 0
    ) {
        alert('Preencha todos os campos!');
        return false;
    }

    const params = {
        url: `${BASE_URL}product_types/create`,
        method: 'POST',
        data: {
            product_description: document.getElementById('typeProduct').value,
            product_tax: document.getElementById('taxProduct').value
        }
    }

    if (document.getElementById('id').value != ''){
        params.url = `${BASE_URL}product_types/update/${document.getElementById('id').value}`;
    }

    $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        dataType: 'JSON',
        success: (data) => {
            if (data.code >= 200) {
                window.location.reload();
            } else {
                alert('Ocorreu um erro ao salvar o tipo!')
            }
        },
        error: (e) => {
            alert('Ocorreu um erro ao salvar o tipo!')
        }
    })
}

function changeType(id, product_description, product_tax){
    new bootstrap.Modal(document.getElementById('exampleModal')).show()
    document.getElementById('typeProduct').value = product_description
    document.getElementById('taxProduct').value = product_tax
    document.getElementById('id').value = id
}

function deleteModal(id){
    document.getElementById('id').value = id
    new bootstrap.Modal(document.getElementById('deleteModal')).show()
}

function typeDelete(){
    $.ajax({
        url: `${BASE_URL}product_types/delete/${document.getElementById('id').value}`,
        method: 'DELETE',
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                window.location.reload();
            }
        },
        error: (e) => {
            alert('Ocorreu um erro ao deletar o tipo!')
        }
    })
}