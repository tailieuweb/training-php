<template>
    <h1>This is admin innovation page</h1>
  <div class="card-body">
    <a
      data-toggle="modal"
      data-target="#exampleModal"
      class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"
      style="color: white"
      ><i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i> Thêm
      sản phẩm</a
    >
    <table class="table">
      <thead>
        <tr>
          <th>Mã SP</th>
          <th>Hình Ảnh</th>
          <th>Tên Sản Phẩm</th>
          <th>Giá Sản Phẩm</th>
          <th>Xuất Xứ</th>
          <th>Danh Mục</th>
          <th>Hiển thị</th>
          <th>Thao Tác</th>
        </tr>
      </thead>
      <tbody id="listProductInAdmin"></tbody>
    </table>
  </div>
</template>
