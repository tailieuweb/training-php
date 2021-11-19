import { useTranslation } from "next-i18next";
import { toast } from "react-toastify";

export default function PostsAddItem({ user }) {
  const { t } = useTranslation("common");
  
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
              onClick={() => {
                if (!user) {
                  toast.info(t("app.toast.suggestLogin"));
                }
              }}
            >
              <i className="fa fa-plus mr-1" aria-hidden="true"></i>
              {t("app.post.newTitle")}
            </button>
          </div>
        </div>
        <small className="card-text d-block mt-3">
          {t("app.post.newDescription")}
        </small>
      </div>
    </div>
  );
}
