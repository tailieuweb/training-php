import { useTranslation } from "react-i18next";

export default function PostsEdit(props) {
  const { postSelected, onChange, onEditPost } = props;
  const { t } = useTranslation("common");

  return (
    <div
      className="modal fade"
      id="editModal"
      tabIndex="-1"
      role="dialog"
      aria-labelledby="editModalLabel"
      aria-hidden="true"
    >
      <form
        onSubmit={onEditPost}
        className="modal-dialog modal-dialog-centered"
        role="document"
      >
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title" id="editModalLabel">
              {t("app.post.editTitle")}
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
              <label htmlFor="">{t("app.post.editInputTitle")}</label>
              <input
                name="title"
                type="text"
                value={postSelected.title}
                onChange={onChange}
                className="form-control"
                placeholder={t("app.post.editInputTitlePlaceholder")}
                aria-describedby="helpId"
                required
              />
            </div>
            <div className="form-group">
              <label htmlFor="">{t("app.post.editInputContent")}</label>
              <textarea
                name="description"
                className="form-control"
                rows="10"
                placeholder={t("app.post.editInputContentPlaceholder")}
                value={postSelected.description}
                onChange={onChange}
                required
              ></textarea>
            </div>
            <small className="card-text d-block mt-3">
              {t("app.post.editDescription")}
            </small>
          </div>
          <div className="modal-footer">
            <button
              type="button"
              className="btn btn-secondary"
              data-dismiss="modal"
            >
              {t("app.post.editButtonClose")}
            </button>
            <button type="submit" className="btn btn-primary">
              {t("app.post.editButtonSubmit")}
            </button>
          </div>
        </div>
      </form>
    </div>
  );
}
