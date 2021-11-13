import Link from "next/link";
import { useState } from "react";

export default function ProfilePostItem(props) {
  const { post, onSelectPost } = props;
  const [isReadMore] = useState(post.description.length < 150);

  return (
    <div className="card mb-3">
      <div className="card-body">
        <div className="d-flex justify-content-between align-items-center mb-4">
          <Link href={`/posts/${"1"}`}>
            <a>
              <h3 className="text-primary mb-0"># {post.title}</h3>
            </a>
          </Link>
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
        </div>
        <p className="card-text">
          {isReadMore
            ? post.description
            : `${post.description.slice(0, 150)}...`}
          {!isReadMore && (
            <Link href={`/posts/${post.id}`}>
              <a
                style={{ fontSize: 12, color: "#000" }}
                className="font-weight-bold"
              >
                {" "}
                Read more
              </a>
            </Link>
          )}
        </p>
      </div>
    </div>
  );
}
