    <h2 class="mt-4 fw-light">Products Register</h2>
    <hr>

    <!-- MODAL TRIGGER -->
    <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">New Type</button>

    <table class="table mt-3 table-secondary border border-dark">

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
            <tr class="text-center align-middle">
                <th>1</th>
                <th>Recursion</th>
                <th>199.99</th>
                <th>Book</th>
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
                <th>Skunk</th>
                <th>420.00</th>
                <th>Weed</th>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container text-center">
        
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

            <label for="productType" class="">Product Type</label>

            <select id="productType" class="custom-select" name="productType" id="">
                <option selected value="#">Select a type</option>
                <?php foreach($product_type as $type): ?>
                <option value="<?=$type->id?>"><?=$type->product_description?></option>
                <?php endforeach;?>
                
            </select>
        </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" onclick="" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="" class="btn btn-primary">Save changes</button>
      </div>

    </div>
    </div>
    </div>


<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Register</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container text-center">

            <div class="mt-2 col-12">
                <label for="productDescription" class="form-label">Product Description</label>
                <input class="form-control" id="productDescription" type="text">
            </div>

        <div class="row g-2 mt-2">
            <div class="mt-2 col-6">
                <label for="productPrice" class="form-label">Product Price</label>
                <input class="form-control" id="productPrice" type="number" placeholder="0,00">
            </div>

            <div class="mt-2 col-6">

                <label for="productType" class="form-label">Product Type</label>
                <select id="productType" class="form-select" name="productType" id="">
                    <option selected value="#">Select a type</option>
                    <option value="#">Book</option>
                    <option value="#">Weed</option>
                </select>
            </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div> -->