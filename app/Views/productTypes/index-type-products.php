<h2 class="mt-4 fw-light">Products Types Register</h2>
<hr>

<button type="button" onclick="cleanType()" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">New Type</button>

<table class="table mt-3 border border-dark">
    <thead class="table-dark">
        <tr class="text-center align-middle">
            <th>#</th>
            <th>Description</th>
            <th>Tax</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($product_type as $product) : ?>
            <tr class="text-center align-middle">
                <td><?= $product->id ?></td>
                <td><?= $product->product_description ?></td>
                <td><?= $product->product_tax ?></td>
                <td>
                    <button onclick="changeType('<?= $product->id ?>', '<?= $product->product_description ?>', '<?= $product->product_tax ?>')" class="btn btn-primary">
                        Edit
                    </button>
                    <button onclick="deleteModal('<?= $product->id ?>')" class="btn btn-danger">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Product Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="mt-2">
                    <label for="typeProduct" class="form-label">Product Type Description</label>
                    <input class="form-control" id="typeProduct" type="text">
                </div>

                <div class="mt-2">
                    <label for="taxProduct" class="form-label">Product Tax</label>
                    <input class="form-control" id="taxProduct" type="number" placeholder="0,00">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" onclick="clean()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="saveType()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" onclick="typeDelete()" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>