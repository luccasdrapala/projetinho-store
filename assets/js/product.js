function cleanProduct() {
    document.getElementById("productDescription").value = '';
    document.getElementById("productPrice").value = '';
    document.getElementById("productType").value = '#';
}

function saveProduct() {
    if (document.getElementById("productDescription").value == '' ||
        document.getElementById("productPrice").value == '' ||
        document.getElementById("productType").value == '#' ||
        parseInt(document.getElementById("productPrice").value) == 0
    ) {
        alert('Preencha todos os campos!');
        return false;
    }

    const params = {
        url: `${BASE_URL}products/create`,
        method: 'POST',
        data: {
            description: document.getElementById('productDescription').value,
            price: document.getElementById('productPrice').value,
            type_product_id: document.getElementById('productType').value,
        }
    }

    if (document.getElementById('id').value != '') {
        params.url = `${BASE_URL}products/update/${document.getElementById('id').value}`;
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
                alert('Ocorreu um erro ao salvar produto!');
            }
        },
        error: (e) => {
            alert('Ocorreu um erro ao salvar produto!');
        }
    });
}

function changeProduct(id, product_description, product_price, product_type_id){
    new bootstrap.Modal(document.getElementById('exampleModal')).show();
    document.getElementById("productDescription").value = product_description;
    document.getElementById("productPrice").value = product_price;
    document.getElementById("productType").value = product_type_id;
    document.getElementById("id").value = id;
}


function showDeleteModal(id){
    document.getElementById('id').value = id;
    new bootstrap.Modal(document.getElementById('deleteProductModal')).show();

}

function productDelete(){
    $.ajax({
        url: `${BASE_URL}products/delete/${document.getElementById('id').value}`,
        method: 'DELETE',
        dataType: 'JSON',
        success: (data) => {
            if (data.code === 200) {
                window.location.reload();
            } else {
                alert('Ocorreu um erro ao deletar produto!');
            }
        },
        error: (e) => {
            alert('Ocorreu um erro ao deletar produto!');
        }
    });
}
