import { useTranslation } from "react-i18next";

export default function PostsDelete(props) {
  const { postSelected, onDeletePost} = props;
  const { t } = useTranslation("common");

  return (
    <div
      className="modal fade"
      id="deleteModal"
      tabIndex={-1}
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <form onSubmit={onDeletePost} className="modal-dialog" role="document">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title">{t("app.post.deleteTitle")}</h5>
            <button
              type="button"
              className="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div className="modal-body py-2 ">
            <h3 className="text-primary mb-4"># {postSelected.title}</h3>
            {t("app.post.deleteDescription")}
          </div>
          <div className="modal-footer">
            <button
              type="button"
              className="btn btn-secondary"
              data-dismiss="modal"
            >
              {t("app.post.deleteButtonClose")}
            </button>
            <button type="submit" className="btn btn-danger">
              {t("app.post.deleteButtonSubmit")}
            </button>
          </div>
        </div>
      </form>
    </div>
  );
}
