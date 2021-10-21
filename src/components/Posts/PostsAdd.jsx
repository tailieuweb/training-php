import callApi from "./../../utils/apiCaller";
import { toast } from "react-toastify";
import { useState } from "react";
import apiCaller from "./../../utils/apiCaller";

export default function PostsAdd(props) {
  const [title, setTitle] = useState("");
  const [description, setDescription] = useState("");
  const { isLogin } = props;
  const posts = () => {
    if (isLogin === true) {
      console.warn(title, description);
      apiCaller("api/products", "POST", {
        title,
        description,
      })
        .then((res) => {
          console.log(res);
          toast("Thêm Thành Công!");
        })
        .catch((error) => {
          console.log("error", error);
          toast("Sai!");
        });
    } else {
      callApi("products", "POST", {
        title,
        description,
      })
        .then((res) => {
          console.log(res);
          toast("Thêm Thành Công!");
        })
        .catch((error) => {
          console.log("error", error);
          toast("Sai!");
        });
    }
  };

  return (
    <div
      className="modal fade"
      id="postsAddModal"
      tabIndex="-1"
      role="dialog"
      aria-labelledby="postsAddModalLabel"
      aria-hidden="true"
    >
      <div className="modal-dialog modal-dialog-centered" role="document">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title" id="postsAddModalLabel">
              Write Your Confessions
            </h5>
            <button
              type="button"
              className="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div className="modal-body px-5 py-3">
            <div className="form-group">
              <label htmlFor="">Title</label>
              <input
                type="text"
                value={title}
                onChange={(e) => setTitle(e.target.value)}
                className="form-control"
                placeholder="Type a awesome title..."
                aria-describedby="helpId"
              />
            </div>
            <div className="form-group">
              <label htmlFor="">Content</label>
              <textarea
                className="form-control"
                rows="10"
                placeholder="Share with us your own stories and others."
                value={description}
                onChange={(e) => setDescription(e.target.value)}
              ></textarea>
            </div>
          </div>
          <div className="modal-footer">
            <button
              type="button"
              className="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="button" className="btn btn-primary" onClick={posts}>
              Post Your Confessions
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}
