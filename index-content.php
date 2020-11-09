<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}

$less = new lessc;
$less->compileFile('less/index.less', 'public/css/index.css');
?>

<div class="header">
    <div class="container">
        <h2>Home Page</h2>

        <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success">
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            <!-- logged in user information -->
            <div class="profile_info">
                <img src="public/images/user_profile.png">

                <div>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <strong><?php echo $_SESSION['user']['username']; ?></strong>

                        <small>
                            <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                            <br>
                            <?php echo $_SESSION['user']['fullname']; ?><br>
                            <?php echo $_SESSION['user']['email']; ?><br>
                            <div class="chuc_nang">
                                <a href="edit.php?id='1">Edit Information</a><br>
                                <a class="click_chucnang" onclick="mo_edit()" id="edit" href="#">Edit password</a>
                                <a class="click_chucnang" id="edit" href="home.php?logout='1'" style="color: black;">Logout</a>
                            </div>
                        </small>

                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="top_modal" id="top_modal">

<div class="div_form">
    <form method="post" class="form-edit_pass" class="needs-validation" novalidate>
        <div class="item_edit">
            <h2> ĐỔI MẬT KHẨU</h2>
            <h1 onclick="modal_close()">X</h1>
        </div>
        <div class="input-group">
            <label>Password mới</label>
            <input class="input_edit" type="password" placeholder="Nhập password mới..." name="password_1" id="password-1" required>
            <small class="invalid-feedback">Enter new password</small>
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input class="input_edit" type="password" placeholder="Nhập lại password..." name="password_2" id="password-2" required>
            <small class="invalid-feedback">Confirm password</small>
        </div>

        <div class="input-group">
            <button type="submit" class="btn btn-save" name="save_pass">Save</button>

        </div>
        
    </form>
</div>

</div>

<script>
function mo_edit() {
    document.getElementById("top_modal").style.display = "block";
}

function modal_close() {
    document.getElementById("top_modal").style.display = "none";
}
const new_pass = document.querySelector('.add_user');
// const new_pass = document.querySelector('#new-pass');
const form_edit = document.querySelector('.form-edit');
// const btn_back = document.querySelector('.btn-back');
const password_1 = document.querySelector('#password-1');
const password_2 = document.querySelector('#password-2');
const btn_save = document.querySelector('.btn-save');
const form = document.querySelector('form');

new_pass.onclick = () => {
    form_edit.style.display = 'inline-block';
}
// btn_back.onclick = () => {
// 	form_edit.style.display = 'none';
// }

password_1.pattern = '[a-zA-Z0-9]{6,}';

btn_save.onclick = () => {
    if (password_1.value != password_2.value) {
        return false;
    }
}
form.onsubmit = (e) => {


    if (form.checkValidity() === false) {
        e.preventDefault();

    }
    form.classList.add('was-validated');

};
</script>


</div>

</div>