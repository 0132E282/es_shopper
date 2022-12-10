<?php 
 session_start();
 $accountUser = $_SESSION['client'] ?? '';
 $fullName = $accountUser['fullname'] ?? '';
 $email = $accountUser['email'] ?? '';
 $fontNumber =  $accountUser['font_number'] ?? '';
?>
<!-- Page Header Start -->
   <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
    <form method="POST" action="BillController.php?bill=create&method=put" id="create-bill">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                  
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>họ và tên</label>
                                <input class="form-control" name="name" value="<?=$fullName?>"type="text" placeholder="John">
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="email" value=<?=$email?> placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>số điện thoại</label>
                                <input class="form-control" type="text" name="font-number" value="<?= $fontNumber ?>"  placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>tỉnh / thành phố</label>
                                <input class="form-control" type="text" name="city" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>quận phường</label>
                                <input class="form-control" type="text" name="district" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>chi tiết địa chỉ</label>
                                <input class="form-control" type="text" name="detail-address" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" name="code-zip" placeholder="123">
                            </div>

                        </div>
                   
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">sản phẩm</h5>
                        <?php 
                            $total = 0;
                            $product_list = $_COOKIE['product-cart'] ?? '';
                            if(json_decode($product_list)){
                                foreach(json_decode($product_list,true) as $key => $product){
                                    $total += $product['price'] * $product['count'];
                                    echo '<div class="d-flex justify-content-between">
                                            <p>'.$product['name'].'</p>
                                            <p>'.$product['price'] * $product['count'].'</p>
                                        </div>';
                                }
                            }
                        ?>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng Sản Phẩm </h5>
                            <h5 class="font-weight-bold"><?= $total ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class=" btn-submit btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" type="submit" form="create-bill" value="Submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
