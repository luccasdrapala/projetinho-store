<div class="row form-group justify-content-center d-flex mt-5" id="sectionSales">
    <div class="col-12">
        <h2>List of Sales</h2>
        <hr>
    </div>

    <div class="col-12 mt-4">
        <div class="modal fade in" id="modalSales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h5 class="modal-title text-white">New Sale</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class='form-group'>
                                    <label for='productName'>Product </label>
                                    <select class="form-control select2" id="productName" style="width: 100%;">
                                        <option selected value=""> <-- SELECT --> </option>
                                        <?php foreach ($products as $product) : ?>
                                            <option value="<?= $product->id ?>" data-tax="<?= $product->product_tax ?>" data-price="<?= $product->price ?>"> <?= $product->description ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class='form-group'>
                                    <label for='quantity' class="float-right">Qty (+) </label>
                                    <input type='text' class='form-control currency' id='quantity' placeholder="1,00" value="1,00">
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class='form-group'>
                                    <label for='price' class="float-right">Unit. ($) </label>
                                    <input type='text' class='form-control currency' id='price' placeholder="0,00" readonly>
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class='form-group'>
                                    <label for='tax' class="float-right">Tax (%) </label>
                                    <input type='text' class='form-control currency' id='tax' placeholder="0,00" readonly>
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class='form-group' class="float-right">
                                    <label for='totalItem'>Total Item (=) </label>
                                    <input type='text' class='form-control currency' id='totalItem' placeholder="0,00" readonly>
                                </div>
                            </div>
                            <div class="col-6 col-md-12">
                                <div class='form-group'>
                                    <button class="btn btn-success" type="button" id="addItem"> <i class="fa fa-plus"></i> Add Item </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 offset-md-5 col-4">
                                <div class='form-group'>
                                    <label class="float-right">Total Items (=) </label>
                                    <input type='text' class='form-control currency' id='totalItems' placeholder="0,00" readonly>
                                </div>
                            </div>
                            <div class="col-md-2 col-4">
                                <div class='form-group'>
                                    <label class="float-right">Total Tax (=) </label>
                                    <input type='text' class='form-control currency' id='totalTax' placeholder="0,00" readonly style="background: #ECADE1">
                                </div>
                            </div>
                            <div class="col-md-2 col-4">
                                <div class='form-group'>
                                    <label class="float-right">Total Sale (=) </label>
                                    <input type='text' class='form-control currency' id='totalSale' placeholder="0,00" readonly style="background: #D6FBE4">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class='form-group'>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm" id="tableItensSales" style="width: 100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Product</th>
                                                    <th class="text-right">Unit.</th>
                                                    <th class="text-right">Qty</th>
                                                    <th class="text-right">Tax</th>
                                                    <th class="text-right">Total</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="id" value="">

                    <div class="modal-footer text-xs-center" style="background-color:#f5f5f5;">
                        <button type="button" class="btn btn-primary" id="saveSale">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="button" id="addSale"> <i class="fa fa-plus"></i> Add Sale</button>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm" id="tableSales" style="width: 100% !important">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Total Items</th>
                        <th>Total Tax</th>
                        <th>Total Sale</th>
                        <th>Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($sales as $sale) : ?>
                        <tr class="">
                            <td><?= $sale->id ?></td>
                            <td><?= $sale->total_items ?></td>
                            <td><?= $sale->total_tax ?></td>
                            <td><?= $sale->total_price ?></td>
                            <td><?= date('d/m/Y', strtotime($sale->created_at)) ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" onclick="editModal('<?= $sale->id ?>', 'null')"> <i class="fa fa-search"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteSale('<?= $sale->id ?>')"> <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>