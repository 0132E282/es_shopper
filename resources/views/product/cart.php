<!-- Page Header Start -->
<?php 
 $total = 0;
 $product_list = $_COOKIE['product-cart'] ?? '';
?>
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
                            <th>info</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       <?php if(is_array(json_decode($product_list,true)) && count(json_decode($product_list,true)) > 0){
                            foreach(json_decode($product_list,true) as $key => $product){
                                $total += ($product['price'] *  $product['count']);
                                echo '<tr class="product-item" data-value="'.$key.'">
                                <td class="align-middle "><img src="'.$product['image'].'" alt="'.$product['name'].'" style="width: 50px;"> '.$product['name'].'</td>
                                <td class="align-middle show-price price-product" data-value="'.$product['price'].'"></td>
                                <td class="align-middle ">
                                  <p>color:'.$product['color'].' </p>
                                  <p>size: '.$product['size'].' </p>
                                </td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" value="'.$product['count'].'" class="count-product form-control form-control-sm bg-secondary text-center" >
                                        <div class="input-group-btn">
                                            <button  class="btn btn-sm btn-primary  btn_up-product btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle show-price " data-value="'.$product['count'] * $product['price'] .'"></td>

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
                            <h6 class="font-weight-medium ">Subtotal</h6>
                            <div class="font-weight-medium subtotal-product "><?=$total?></div>
                            
                        </div>
                        <a href="siteController.php?site=checkout" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<script>
(function(){
   return {
    cookieArray  :  decodeURIComponent(document.cookie).split(';'),
    getCookieByName : function (name){
        for(let i = 0 ; i < this.cookieArray.length - 1 ; i ++){
           let cookie =  this.cookieArray[i].split('=');
           if( cookie[0].trim() ===  name ){
             return cookie[1];
           }else {
             console.error('the key undefined');
           }
        }
    },
    handleEvent : function(){
        const productList = document.querySelectorAll('.product-item');
        const productCart = JSON.parse( this.getCookieByName('product-cart'));
        Array.from(productList).forEach((product)=>{
        product.onclick = e =>{
            const valueCountProduct = e.currentTarget.querySelector('.count-product').value;
        }})
    },
    readerTotalPrice : function(){
        const productList = document.querySelectorAll('.total-product');
        const result =  Array.from(productList).reduce((total,element)=>{
           const totalPrice = element.getAttribute('data-value');
           return total + Number(totalPrice);
        },0)
      document.querySelector('.subtotal-product').setAttribute('data-value',result);
    },
    main : function(){
        this.readerTotalPrice();
        this.handleEvent();
     }
   }
 })().main()

</script>