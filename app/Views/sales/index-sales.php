<h2 class="mt-4 fw-light">Products Register</h2>
<hr>

<!-- MODAL TRIGGER -->
<button type="button" onclick="newSale()" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">New Sale</button>

<table class="table mt-3 table-secondary border border-dark">
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
        <tr class="text-center align-middle">
            <td>1</td>
            <td>199.99</td>
            <td>10.0</td>
            <td>119.98</td>
            <td>12/02/2023</td>
            <td>
                <button  
                    class="btn btn-success">Sale</button>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>   
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
                        <label for="product" class="">Product</label>
                        <select id="product" class="custom-select" name="product">
                        <option selected value="#">Select a type</option>
                            <?php foreach($getProducts as $products): ?>
                            <option value="<?=$products->id?>" data-tax="<?=$product->tax?>" data-price="<?=$product->price?>"><?=$products->description?></option>
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
                        <button type="button" class="btn btn-success">Add Product</button>
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

                <table class="table mt-3 table-secondary border border-dark">
                    <thead class="table-dark">
                        <tr class="text-center align-middle">
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Tax</th>
                            <th>Total Sale</th>
                            <th>Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center align-middle">
                            <td>1</td>
                            <td>Java como programar</td>
                            <td>1</td>
                            <td>100.00</td>
                            <td>10</td>
                            <td>110.00</td>
                            <td>12/02/2023</td>
                            <td>
                            <button  
                                class="btn btn-success">Sale</button>
                            <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>   
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