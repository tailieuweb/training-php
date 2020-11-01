<ul class="pagination modal-1">
  <li><a href="#" class="prev">&laquo</a></li>
  <li> 
    <?php for($num = 1; $num <= $totalPage; $num++) {?>
    <?php if ($num != $current_page) { ?>
    <a href="?per_page= <?$item_per_page?>&page=<?=$num?>"><?=$num?></a>
    <?php } else {?>
        <a class="active"><?=$num?></a>
     <?php } ?>
    <?php } ?>
  </li>
  <li><a href="#" class="next">&raquo;</a></li>
</ul>

<style>
.modal-1 li:first-child a {
  -moz-border-radius: 6px 0 0 6px;
  -webkit-border-radius: 6px;
  border-radius: 6px 0 0 6px;
}
.modal-1 li:last-child a {
  -moz-border-radius: 0 6px 6px 0;
  -webkit-border-radius: 0;
  border-radius: 0 6px 6px 0;
}
.modal-1 a {
  border-color: #ddd;
  color: #4285F4;
  background: #fff;
}
.modal-1 a:hover {
  background: #eee;
}
.modal-1 a.active, .modal-1 a:active {
  border-color: #4285F4;
  background: #4285F4;
  color: #fff;
}
</style>
