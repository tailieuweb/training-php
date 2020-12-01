<?php
session_start();

include('../functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (!isAdmin()) {
    $_SESSION['msg'] = "You have no authority to perform this action";
    header('location: ../index.php');
}

$users_option = array(
    'order_by' => 'id asc'
);
$users = get_by_options('users', $users_option);
$i = 0;
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Full name</th>
            <th scope="col">Presence Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $result) : $i++; ?>
            <tr scope="row">
                <td><input type="text" id="mssv_user<?= $i ?>" value="<?php echo $result['id']; ?>"></td>
                <td><?php echo $result['username']; ?></td>
                <td><?php echo $result['fullname']; ?></td>
                <?php if ($result['presence'] > 0) : ?>
                    <td><input checked class="form-check-input" type="checkbox" id="inlineCheckbox<?=$i?>" value="option3" disabled>
                        <label class="form-check-label" for="defaultCheck1">
                            Presenced
                        </label>
                    </td>
                <?php else : ?>
                    <td><input class="form-check-input" type="checkbox" id="inlineCheckbox<?=$i?>" value="option3" disabled>
                        <label class="form-check-label" for="defaultCheck1">
                            Not present
                        </label></td>
            </tr>
    <?php endif;
            endforeach; ?>
    </tbody>
</table>
<input type="text" id="total_user_mssv" value="<?= $i ?>">