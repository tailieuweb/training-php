import React from "react";

export default function PostsAddItem() {
  return (
    <div className="card">
      <div className="card-body">
        <div className="d-flex align-items-center">
          <div className="w-100">
            <button
              type="button"
              className="btn btn-primary btn-sm"
              data-toggle="modal"
              data-target="#addModal"
            >
              <i className="fa fa-plus mr-1" aria-hidden="true"></i> New Your
              Confessions
            </button>
          </div>
        </div>
        <small className="card-text d-block mt-3">
          Share with us your own stories and others.
        </small>
      </div>
    </div>
  );
}
