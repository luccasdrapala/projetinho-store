    <h2 class="mt-4 fw-light">Products Register</h2>
    <hr>

    <!-- MODAL TRIGGER -->
    <button type="button" onclick="cleanProduct()" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">New Product</button>

    <table class="table mt-3 border border-dark">
        <thead class="table-dark">
            <tr class="text-center align-middle">
                <th>#</th>
                <th>Description</th>
                <th>Price</th>
                <th>Type</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getProducts as $products) : ?>
                <tr class="text-center align-middle">
                    <td><?= $products->id ?></td>
                    <td><?= $products->description ?></td>
                    <td><?= $products->price ?></td>
                    <td><?= $products->type_description ?></td>
                    <td>
                        <a href="#">
                            <button onclick="changeProduct('<?= $products->id ?>', '<?= $products->description ?>', '<?= $products->price ?>', '<?= $products->type_id ?>')" class="btn btn-primary">Edit</button>
                        </a>

                        <a href="#">
                            <button onclick="showDeleteModal('<?= $products->id ?>')" class="btn btn-danger">Delete</button>
                        </a>
                        <input type="hidden" id="id" value="">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container">

                    <div class="row">
                        <div class="mt-2 col-12">
                            <label for="productDescription" class="form-label">Product Description</label>
                            <input class="form-control" id="productDescription" type="text">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-2 col-6">
                            <label for="productPrice" class="form-label">Product Price</label>
                            <input class="form-control" id="productPrice" type="number" placeholder="0,00">
                        </div>

                        <div class="mt-2 col-6">
                            <label for="productType" class="form-label">Product Type</label>
                            <select id="productType" class="custom-select" name="productType" id="" style="width: 100%">
                                <option selected value="#">Select a type</option>
                                <?php foreach ($product_type as $type) : ?>
                                    <option value="<?= $type->id ?>"><?= $type->product_description ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="saveProduct()" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p>Are you sure that you want to delete ?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="productDelete()" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>