<div class="typeProductsSection">
    <h2 class="mt-4 fw-light">Products Types Register</h2>
    <hr>

    <!-- <button class="btn btn-warning mt-3" data-bs-toggle="modal" onclick="clean()" data-bs-target="#staticBackdrop">New Type</button> -->
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">New Type</button>

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
            <?php foreach ($product_type as $product): ?>
                <tr class="text-center align-middle">
                    <td><?=$product->id?></td>
                    <td><?=$product->product_description?></td>
                    <td><?=$product->product_tax?></td>
                    <td>
                        <button 
                            onclick="changeType('<?=$product->id?>', '<?=$product->product_description?>', '<?=$product->product_tax?>')" 
                            class="btn btn-success">
                            Update
                        </button>
                        

                        <a href="#">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    <!-- <button
                        type="button"
                        class="btn btn-purple btn-sm"
                        onclick="editModal('<?=$product->id?>', '<?=$product->description?>', '<?=$product->price?>', '<?=$product->product_type_id?>')"><i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteProduct('<?=$product->id?>')"> <i class="fa fa-trash"></i></button> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody> 
    </table>

    <!-- Modal
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Type Product Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="addProductType" onclick="saveType()" type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="saveType()" class="btn btn-primary">Save changes</button>
      </div>

    </div>
    </div>