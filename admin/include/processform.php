<?php
//add image into global $_POST.

if ($_POST && $_FILES) {
    $_POST['ImageUrl'] = $_FILES['ImageUrl']['name'];
}
foreach ($_POST as $key => $value) {
    # value != array. strip whitespace from $value.
    if (!is_array($value)) {
        $value = trim($value);
    }
    #check expected array.
    if (!in_array($key, $expected)) {
        continue;
    }
    if (in_array($key, $required) && empty($value)) {
        //required  value is missing
        $missing[] = $key;
        $$key = "";
        continue;
    }

    $$key = $value;
}

