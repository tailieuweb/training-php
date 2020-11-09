<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<div class="header">
    <div class="container">
        <h2>List User</h2>
        <div id="form">
            <?php echo display_error();
            ?>
            <!-- tao form search -->
            <form class="form_search" method="get">
                <input type="text" class="form-control" name="search" id="search" 
                <?php if (isset($value_search)) { ?> value="<?php echo $value_search ?>  " <?php  } ?> placeholder="Search...">
                <button class="btn_search"> Search</button>
            </form>
            <?php if (isset($id)) { ?>
                <!-- tạo form xem -->
                <div class="row">
                    <div class="col_8">
                        <img class="images-fiul" src="./public/images/admin_profile.png" alt="">

                    </div>
                    <div class="col_4">
                        <?php if (isset($row) == true) { ?>
                            <p>
                                <?php echo $row['id']; ?>
                            </p>
                            <p>
                                <?php echo $row['username']; ?>
                            </p>
                            <p>
                                <?php echo $row['fullname']; ?>
                            </p>
                            <p>
                                <?php echo $row['email']; ?>

                            </p>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>

                <table id="list_danhsach">
                    <tr>
                        <th>STT</th>
                        <th>Image</th>
                        <th>Username</th>
                        <th>FullName</th>
                        <th>Email</th>
                        <th>Chức Năng</th>
                    </tr>
                    <?php if (isset($results)) {
                        foreach ($results as $value) : ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td>
                                    <?php
                                    $img = isset($value['image']) ? $value['image'] : 'public/images/no-image.png';
                                    $str_out = '';
                                    $str_out .= '<img src="' . $img . '" style="width: 50px"/>';
                                    echo $str_out;
                                    ?>
                                </td>
                                <td><?php echo $value['username']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td>
                                    <!-- Xem -->
                                    <button class="btn-warning btn_click click_xem">
                                        <a href="list.php?<?php echo $mahoa_id ?>=
                                    <?php echo base64_encode(base64_encode(base64_encode(base64_encode($value['id'])))) ?>&xem=aaaa">Xem</a></button>
                                    <!-- Sửa -->
                                    <button onclick="btn_xoa()" class="btn-success btn_click click_edit">
                                        <a href="edit.php?id=<?php echo $value['id'] ?>&sua=aaaa">Sửa </a></button>
                                    <!-- Xóa -->
                                    <button class="btn-danger btn_click click_xoa" onclick="return confirm('Ban co chac muon xoa?')">
                                        <a href="list.php?<?php echo $mahoa_id ?>=
                                    <?php echo base64_encode(base64_encode(base64_encode(base64_encode($value['id'])))) ?>&xoa=sss">Xóa</a></button>
                                </td>
                            </tr>
                        <?php endforeach;
                    }
                    // show kết quả search
                    if (isset($a)) {
                        foreach ($searchrs as $value) : ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td>
                                    <?php
                                    $img = isset($value['image']) ? $value['image'] : 'public/images/no-image.png';
                                    $str_out = '';
                                    $str_out .= '<img src="' . $img . '" style="width: 50px"/>';
                                    echo $str_out;
                                    ?>
                                </td>
                                <td><?php echo $value['username']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td>
                                    <!-- Xem -->
                                    <button class="btn-warning btn_click click_xem">
                                        <a href="list.php?<?php echo $mahoa_id ?>=
                                    <?php echo base64_encode(base64_encode(base64_encode(base64_encode($value['id'])))) ?>&xem=aaaa">Xem</a></button>
                                    <!-- Sửa -->
                                    <button onclick="btn_xoa()" class="btn-success btn_click click_edit">
                                        <a href="edit.php?id=<?php echo $value['id'] ?>&sua=aaaa">Sửa </a></button>
                                    <!-- Xóa -->
                                    <button class="btn-danger btn_click click_xoa" onclick="return confirm('Ban co chac muon xoa?')">
                                        <a href="list.php?<?php echo $mahoa_id ?>=
                                    <?php echo base64_encode(base64_encode(base64_encode(base64_encode($value['id'])))) ?>&xoa=sss">Xóa</a></button>
                                </td>
                            </tr>
                    <?php endforeach;
                    }
                    ?>

                </table>

            <?php } ?>

            <div class="back" style="text-align: center">
                <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>

            </div>

        </div>
    </div>