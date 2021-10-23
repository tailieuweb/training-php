import { useState } from "react";

export default function PostsItem(props) {
  const { user, post, onSelectPost } = props;
  const [isReadMore, setIsReadMore] = useState(post.description.length < 400);

  return (
    <div className="card">
      <div className="card-body">
        <div className="d-flex justify-content-between">
          <div className="d-flex align-items-center">
            <a href="#!" className="avatar rounded-circle">
              <img
                alt="Image placeholder"
                src="https://ui-avatars.com/api/?name=Unknown"
              />
            </a>
            <div className="ml-3">
              <a href="">
                <h5 className="card-title mb-0">Unknown User</h5>
              </a>
              <small className="card-text">{props.post.created_at}</small>
            </div>
          </div>
          {post?.user_id === user?.id && (
            <div>
              <button
                type="button"
                className="btn btn-warning btn-sm"
                data-toggle="modal"
                data-target="#editModal"
                onClick={onSelectPost}
              >
                Sửa
              </button>
              <button
                type="button"
                className="btn btn-danger btn-sm"
                data-toggle="modal"
                data-target="#deleteModal"
                onClick={onSelectPost}
              >
                Xóa
              </button>
            </div>
          )}
        </div>
        <h3 className="text-primary my-4"># {post.title}</h3>
        <p className="card-text">
          {isReadMore
            ? post.description
            : `${post.description.slice(0, 400)}...`}
          {!isReadMore && (
            <span
              style={{ fontSize: 12, cursor: "pointer" }}
              className="font-weight-bold"
              onClick={() => setIsReadMore(true)}
            >
              {" "}
              Read more
            </span>
          )}
        </p>
      </div>
    </div>
  );
}
