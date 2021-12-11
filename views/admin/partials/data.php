<?php
$token = null;
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
?>
<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-data__tool">

                    <?php 
                    $keyword = '';
                    if(!empty($_GET['keyword'])) {
                        $keyword = $_GET['keyword'];
                    }
                    ?>
                    <form method="get" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i> Search
                                        </button>
                                    </div>
                                    <input type="text" id="input1-group2" name="keyword" value="<?php echo $keyword ?>"
                                        placeholder="Search users" class="form-control">
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
                <?php
                    if(!empty($users)) {
                ?>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </th>
                                <th>name</th>
                                <th>email</th>
                                <th>date</th>
                                <th>Role</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) { ?>
                            <tr class="tr-shadow">
                                <td>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </td>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td>
                                    <span class="block-email"><?= htmlspecialchars($user['email']) ?></span>
                                </td>
                                <?php
                                    $date=date_create($user['date']);
                                ?>
                                <td><?= htmlspecialchars(date_format($date ,"d-m-Y | H:i:s" ))?></td>
                                <td class="desc"><?= htmlspecialchars($user['permission']) ?></td>
                                <?php if($user['action'] == 1) {?>
                                <td>
                                    <span class="status--process">Active</span>
                                </td>
                                <?php } else { ?>
                                <td>
                                    <span class="status--process">Inactive</span>
                                </td>
                                <?php } ?>
                                <!-- Xóa người dùng -->

                                <td>
                                    <div class="table-data-feature" style="justify-content: flex-start;">
                                        <a href="view_user.php?id=<?= md5($user['id'] . 'chuyen-de-web-2') ?>" class="item">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <a href="delete_user.php?id=<?= md5($user['id'] . 'chuyen-de-web-2') ?>&token=<?php echo $token?>" class="item">
                                            <i class="zmdi zmdi-delete"></i>
                                            <input type="hidden" name="token" value="<?php echo $token ?>">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?>
                <!-- Test Reflected XSS bằng htmlspecialchars -->
                <?php if (!empty($params['keyword'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo htmlspecialchars($params['keyword']) ?>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>