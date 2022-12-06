<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="SiteController.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       <?php
                         $product_list = $_COOKIE['product-cart'] ?? '';
                        
                         if(is_array(json_decode($product_list,true)) && count(json_decode($product_list,true)) > 0){
                            foreach(json_decode($product_list,true) as $key => $product){
                                echo '<tr class="product-item" >
                                <td class="align-middle "><img src="'.$product['image'].'" alt="'.$product['name'].'" style="width: 50px;"> '.$product['name'].'</td>
                                <td class="align-middle price-product" data-value="'.$product['price'].'">'.$product['price'].'</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"value="'.$product['count'].'" class="count-product form-control form-control-sm bg-secondary text-center" >
                                        <div class="input-group-btn">
                                            <button onclick="handleTotalPriceItemProduct(this)" class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle total-product">'.$product['count'] * $product['price'] .'</td>
                                <td class="align-middle"><a class="btn btn-sm btn-primary" href="productController.php?product=cart&method=delete&id-product='.$key.'">
                                   <i class="fa fa-times"></i>
                                </a></td>
                            </tr>'; }
                         } else{
                            echo '<td class="align-middle">hây thêm sản phâm</td>';
                         }                        
                       ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text"  class="form-control p-4" >
                        <div class="input-group-append">
                            <button  class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
<script>
    
 function handleTotalPriceItemProduct(e){
    const productItem = e.parentElement.parentElement.parentElement.parentElement;
    const totalProduct = productItem.querySelector('.total-product');
    const priceProduct = productItem.querySelector('.price-product').getAttribute('data-value');
    const countProduct = productItem.querySelector('.count-product').value;
    totalProduct.innerHTML = priceProduct * (countProduct + 1) ;
    totalProduct.setAttribute('data-value',priceProduct * countProduct);
 }

</script>