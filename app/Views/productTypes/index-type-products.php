<div class="typeProductsSection">
    <h2 class="mt-4 fw-light">Products Types Register</h2>
    <hr>

    <button class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">New Type</button>

    <table class="table mt-3 table-secondary border border-dark">

       <thead class="table-dark">
            <tr class="text-center align-middle">
                <th>#</th>
                <th>Description</th>
                <th>Tax</th>
                <th>Options</th>
            </tr>
       </thead>
       <tbody>
            <tr class="text-center align-middle">
                <th>1</th>
                <th>Book</th>
                <th>7.5</th>
                <th>
                    <a href="#">
                        <button class="btn btn-success">Update</button>
                    </a>

                    <a href="#">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </th>
            </tr>
            <tr class="text-center align-middle">
                <th>2</th>
                <th>Weed</th>
                <th>4.2</th>
                <th>
                    <a href="#">
                        <button class="btn btn-success">Update</button>
                    </a>

                    <a href="#">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </th>
            </tr>
       </tbody> 
    </table>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Type Product Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- BODY -->
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="addProductType" type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
    </div>
    </div>