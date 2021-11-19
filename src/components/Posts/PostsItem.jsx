import Link from "next/link";
import { useState } from "react";
import { useTranslation } from "react-i18next";

export default function PostsItem(props) {
  const { user, post, onSelectPost } = props;
  const [isReadMore] = useState(post.description.length < 350);
  const { t } = useTranslation("common");

  return (
    <div className="card">
      <div className="card-body">
        <div className="d-flex justify-content-between">
          <div className="d-flex align-items-center">
            <a className="avatar rounded-circle">
              <img
                alt="Image placeholder"
                src="https://ui-avatars.com/api/?name=Unknown"
              />
            </a>
            <div className="ml-3">
              <a>
                <h5 className="card-title mb-0">{t("app.common.unknown")}</h5>
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
                {t("app.post.editButton")}
              </button>
              <button
                type="button"
                className="btn btn-danger btn-sm"
                data-toggle="modal"
                data-target="#deleteModal"
                onClick={onSelectPost}
              >
                {t("app.post.deleteButton")}
              </button>
            </div>
          )}
        </div>
        <Link href={`/posts/${post.id}`}>
          <a>
            <h3 className="text-primary my-4"># {post.title}</h3>
          </a>
        </Link>
        <p className="card-text">
          {isReadMore
            ? post.description
            : `${post.description.slice(0, 350)}...`}
          {!isReadMore && (
            <Link href={`/posts/${post.id}`}>
              <a
                style={{ fontSize: 12, color: "#000" }}
                className="font-weight-bold"
              >
                {" "}
                {t("app.common.readMore")}
              </a>
            </Link>
          )}
        </p>
      </div>
    </div>
  );
}
