<h2 class="mt-4 fw-light">Sales</h2>
<hr>

<!-- MODAL TRIGGER -->
<button type="button" onclick="openModal()" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">New Sale</button>

<table class="table mt-3 border border-secondary">
    <thead class="table-dark">
        <tr class="text-center align-middle">
            <th>#</th>
            <th>Total  Items</th>
            <th>Total Tax</th>
            <th>Total Sale</th>
            <th>Date</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        
    <?php foreach($sales as $sale): ?>
        <tr class="text-center align-middle">
            <td><?=$sale->id?></td>
            <td><?=$sale->total_items?></td>
            <td><?=$sale->total_tax?></td>
            <td><?=$sale->total_price?></td>
            <td><?=$sale->created_at?></td>
            <td>
            <button
                class="btn btn-primary">Sale</button>
            <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody> 
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container"><!--MODAL-->
                <div class="row">
                    <div class="mt-2 col-3">
                        <label for="product" class="">Sales</label>
                        <select id="product" class="custom-select" name="product">
                        <option selected value="#">Select a type</option>
                            <?php foreach($products as $products): ?>
                                <option value="<?=$products->id?>" data-tax="<?=$products->product_tax?>" data-price="<?=$products->price?>"><?=$products->description?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-2 mt-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input class="form-control" id="quantity" type="number" placeholder="0,00">
                    </div>
                    <div class="col-2 mt-2">
                        <label for="price" class="form-label">Price</label>
                        <input class="form-control" id="price" type="number" placeholder="0,00" disabled>
                    </div>
                    <div class="col-2 mt-2">
                        <label for="tax" class="form-label">Tax</label>
                        <input class="form-control" id="tax" type="number" placeholder="0,00" disabled>
                    </div>
                    <div class="col-2 mt-2">
                        <label for="sale" class="form-label">Sale</label>
                        <input class="form-control" id="sale" type="number" placeholder="0,00" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-3">
                        <button type="button" onclick="addProduct()" class="btn btn-success">Add Product</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mt-2">
                        <label for="totalPrice" class="form-label">Price</label>
                        <input class="form-control" id="price" type="number" placeholder="0,00" disabled>
                    </div>
                    <div class="col-2 mt-2">
                        <label for="totalTax" class="form-label">Tax</label>
                        <input class="form-control" id="totalTax" type="number" placeholder="0,00" disabled>
                    </div>
                    <div class="col-2 mt-2">
                        <label for="totalSale" class="form-label">Sale Total</label>
                        <input class="form-control" id="totalSale" type="number" placeholder="0,00" disabled>
                    </div>
                </div>

                <table class="table mt-3 table-secondary border border-dark" id="tableItensSale">
                    <thead class="table-dark">
                        <tr class="text-center align-middle">
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Tax</th>
                            <th>Total Sale</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                           
                    </tbody> 
                </table>
            </div>

            <!-- MODAL BODY END -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>