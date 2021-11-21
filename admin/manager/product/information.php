<h2 class="text-center">Display Information Of Products</h2>
<!-- ...:::: Start Cart Section:::... -->
<div class="cart-section">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table id="products-table">
                                <?= $phonecontrol->display_products() ?>
                                <!-- Start Cart Table Head -->
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button type="button" id="btn-product" class="btn btn-md btn-golden" data-toggle="modal" data-target="#myModel">
                                ADD
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->
</div>
</div>
<!-- Modal form-->
<div class="modal fade" id="myModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">PRODUCT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="fproduct" enctype="multipart/form-data">
                    <input type="text" name="ProductID" id="ProductID" hidden>
                    <p>
                        <label for="ProductName">
                            Name product
                        </label>
                        <input type="text" name="ProductName" id="ProductName">
                    </p>
                    <p>
                        <label for="Price">
                            Price Prodcut
                        </label>
                        <input type="number" name="Price" id="Price" min="0">
                    </p>
                    <p>
                        <label for="Quantity">`
                            Quantity product
                        </label>
                        <input type="number" name="Quantity" id="Quantity" min="0" max="10">
                    </p>
                    <p>
                        <label for="Description">
                            Description product
                        </label>
                        <textarea name="Description" id="Description"></textarea>
                    </p>
                    <p>
                        <label for="ManufacturerID">
                            Manufacture prodcut
                        </label>
                        <?= $manucontrol->display_manu(); ?>
                    </p>
                    <p>
                        <label for="CategoryID">
                            Category product
                        </label>
                        <?= $catecontrol->display_cate(); ?>
                    </p>
                    <p>
                        <input type="file" name="ImageUrl" id="ImageUrl">
                        <label for="ImageUrl">
                            Photographic
                        </label>
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save" data-toggle="modal" data-target="#notification-modal">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal notification -->
<div class="modal fade" id="notification-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>