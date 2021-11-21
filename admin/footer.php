<h5>Day la footer</h5>





<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>
<!-- Latest jQuery form server -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS form CDN -->
<!-- js form-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<!-- add product -->
<script type="text/javascript">
    $(document).ready(function() {
        const save = document.getElementById('save');
        const form = document.getElementById('fproduct');
        $('#overlay').fadeIn().delay(2000).fadeOut();
        // event
        save.addEventListener("click", function() {
            var formData = new FormData(form);
            var url = 'index.php';
            $.ajax({
                url: url,
                contentType: false,
                processData: false,
                type: 'post',
                data: formData,
                success: function(reponse) {
                    setTimeout(function() {
                        clearForm();
                        callGetContentTable();

                    }, 500);

                },
                error: function(e) {
                    alert("that bai");
                    console.log(e.message);
                }
            });
        });
        // $(".edit-data").on('click', function(event) {
        //     var ProductID = this.getAttribute('id');
        //     console.log(ProductID);
        //     var url = 'index.php';
        //     $.ajax({
        //         url: url,
        //         method: 'post',
        //         data: 'ProductID=' + ProductID,
        //         success: function(reponse) {
        //             setTimeout(function() {
        //                 if (IsJsonString(reponse)) {
        //                     var obj = JSON.parse(reponse.toString());
        //                     updateForm(obj);
        //                 }
        //             }, 500);
        //         },
        //         error: function(e) {
        //             alert("that bai");
        //             console.log(e.message);
        //         }
        //     });
        // });
    })

    function callGetContentTable() {
        var url = 'index.php';
        $.ajax({
            url: 'index.php',
            type: 'post',
            dataType: 'text',
            data: {
                key: 'content'
            },
            success: function(reponse) {
                console.log(reponse);
                $("#products-table > thead").remove();
                $("#products-table > tbody").remove();
                //add
                $("#products-table").append(reponse);
            },
            error: function(e) {
                alert("that bai");
                console.log(e.message);
            }
        });
    }

    function IsJsonString(str) {
        try {
            var obj = JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    function clearForm() {
        $("#ProductID").val("");
        $("#ProductName").val("");
        $("#Price").val("");
        $("#Quantity").val("");
        $("#Description").val("");
        $("#CategoryID").val(0);
        $("#ManufacturerID").val(0);
    }

    function updateForm(values) {
        console.log(values);
        $("#ProductID").val(values.ProductID);
        $("#ProductName").val(values.ProductName);
        $("#Price").val(values.Price);
        $("#Quantity").val(values.Quantity);
        $("#Description").val(values.Description);
        $("#CategoryID").val(values.CategoryID);
        $("#ManufacturerID").val(values.ManufacturerID);
    }

    function editProduct(ProductID) {
        console.log(ProductID);
        var url = 'index.php';
        $.ajax({
            url: url,
            method: 'post',
            data: 'ProductID=' + ProductID,
            success: function(reponse) {
                setTimeout(function() {
                    if (IsJsonString(reponse)) {
                        var obj = JSON.parse(reponse.toString());
                        updateForm(obj);
                    }
                }, 500);
            },
            error: function(e) {
                alert("that bai");
                console.log(e.message);
            }
        });
    }
</script>
</body>

</html>