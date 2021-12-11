import React from "react";

export default function PostsUserRanking() {
  return (
    <div className="bg-white p-4 rounded-lg shadow">
      <h3 className="text-uppercase mb-3">Top hoạt động</h3>
      <div className="d-flex justify-content-between border-bottom pb-2">
        <span style={{ fontSize: "14px" }} className="font-weight-bold">
          Thành Viên
        </span>
        <span style={{ fontSize: "14px" }} className="font-weight-bold">
          Số Bài Viết
        </span>
      </div>
      <div className="d-flex justify-content-between border-bottom py-2">
        <div>
          <i
            style={{ fontSize: "13px" }}
            className="fa fa-user-o"
            aria-hidden="true"
          ></i>{" "}
          <span>Trọng Hiếu</span>
        </div>
        <span class="badge badge-danger">156</span>
      </div>
      <div className="d-flex justify-content-between border-bottom py-2">
        <div>
          <i
            style={{ fontSize: "13px" }}
            className="fa fa-user-o"
            aria-hidden="true"
          ></i>{" "}
          <span>Trọng Hiếu</span>
        </div>
        <span class="badge badge-success">156</span>
      </div>
      <div className="d-flex justify-content-between border-bottom py-2">
        <div>
          <i
            style={{ fontSize: "13px" }}
            className="fa fa-user-o"
            aria-hidden="true"
          ></i>{" "}
          <span>Trọng Hiếu</span>
        </div>
        <span class="badge badge-primary">156</span>
      </div>
      <div className="d-flex justify-content-between border-bottom py-2">
        <div>
          <i
            style={{ fontSize: "13px" }}
            className="fa fa-user-o"
            aria-hidden="true"
          ></i>{" "}
          <span>Trọng Hiếu</span>
        </div>
        <span class="badge badge-dark">156</span>
      </div>
      <div className="d-flex justify-content-between border-bottom py-2">
        <div>
          <i
            style={{ fontSize: "13px" }}
            className="fa fa-user-o"
            aria-hidden="true"
          ></i>{" "}
          <span>Trọng Hiếu</span>
        </div>
        <span class="badge badge-dark">156</span>
      </div>
    </div>
  );
}
