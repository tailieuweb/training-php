<?php
session_start();
// Xóa hết các session
session_destroy();
echo "<script>window.location.href='index.php'</script>";
