<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <?php include_once("views/head.php");?>
</head>

<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php");?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Liên hệ chúng tôi</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="contact.php">Liên hệ chúng tôi</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Contact Form Area =================-->
    <section class="contact_form_area p_100">
        <div class="container">
            <div class="main_title">
                <h2>Liên lạc</h2>
                <h5>Bạn có bất cứ điều gì trong tâm trí của bạn muốn cho chúng tôi biết? Vui lòng liên hệ với chúng tôi
                    qua biểu mẫu liên hệ của chúng tôi.</h5>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <form class="row contact_us_form" action="" method="POST" id="test-form" novalidate="novalidate">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên của bạn">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Địa chỉ email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Chủ thể">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="message" id="message" rows="1"
                                placeholder="Tin nhắn"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" value="submit" class="btn order_s_btn form-control">Xác nhận ngay bây giờ</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 offset-md-1">
                    <div class="contact_details">
                        <div class="contact_d_item">
                            <h3>Địa chỉ nhà :</h3>
                            <p>54B, Tailstoi Town 5238 <br /> La city, IA 522364</p>
                        </div>
                        <div class="contact_d_item">
                            <h5>Điện thoại : <a href="tel:01372466790">01372.466.790</a></h5>
                            <h5>Email : <a href="mailto:rockybd1995@gmail.com">rockybd1995@gmail.com</a></h5>
                        </div>
                        <div class="contact_d_item">
                            <h3>Giờ mở cửa :</h3>
                            <p>8:00 sáng - 10:00 tối</p>
                            <p>Thứ hai - chủ Nhật</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Contact Form Area =================-->

    <!--================End Banner Area =================-->
    <section class="map_area">
        <div id="mapBox" class="mapBox row m0" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13"
            data-marker="img/map-marker.png" data-info="54B, Tailstoi Town 5238 La city, IA 522364"
            data-mlat="40.701083" data-mlon="-74.1522848">
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Newsletter Area =================-->
    <?php include_once("views/layouts/news.php");?>
    <!--================End Newsletter Area =================-->

    <!--================Footer Area =================-->
    <?php include_once("views/layouts/footer.php");?>
    <!--================End Footer Area =================-->


    <!--================Search Box Area =================-->
    <?php include_once("views/layouts/search.php");?>
    <!--================End Search Box Area =================-->

    <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var submit = $("button[type='submit']");
        submit.click(function() {
            var data = $('form#test-form').serialize();
            var name = $('input#name').val();
            var email = $('input#email').val();
            var subject = $('input#subject').val();
            var message = $('textarea#message').val();
            if (name != '' && email != '' && subject != '' && message != '') {
                $.ajax({
                    type: 'GET',
                    url: 'https://script.google.com/macros/s/AKfycbxEknthvljEhAgdUtRqYMzTFtwF3SOgaHgp7aIHD5l1iW4DjPzT/exec',
                    dataType: 'json',
                    crossDomain: true,
                    data: data,
                    success: function(data) {
                        if (data == 'false') {
                            alert(
                                'Thêm không thành công, bạn cũng có thể sử dụng để hiển thị Popup hoặc điều hướng'
                            );
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Giáo sư...',
                                text: 'Gửi liên hệ thành công !',
                            })
                            $('input#name').val('');
                            $('input#email').val('');
                            $('input#subject').val('');
                            $('textarea#message').val('');
                        }
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Giáo sư...',
                    text: 'Lỗi liên hệ! Vui lòng nhập tất cả các trường ',
                })
            }

            return false;
        });
    });
    </script>
    <?php include_once("views/footer.php");?>

</body>

</html>