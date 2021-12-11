import { useTranslation } from "next-i18next";
import { useEffect, useState } from "react";
import { countAndSort } from "../../utils/commonFunctions";

export default function PostsUserRanking(props) {
  const { posts } = props;
  const { t } = useTranslation("common");

  const [topRanking, setTopRanking] = useState([]);

  useEffect(() => {
    const rankingUserId = posts.map((o) => o.user_id);
    const rankingFilterUserId = rankingUserId.filter((o) => o !== 0);
    const rankingSortUserId = countAndSort(rankingFilterUserId).slice(0, 5);
    setTopRanking(rankingSortUserId);
  }, [posts]);

  return (
    <div className="bg-white p-4 rounded-lg shadow">
      <h3 className="text-uppercase mb-3">{t("app.ranking.title")}</h3>
      <div className="d-flex justify-content-between border-bottom pb-2">
        <span style={{ fontSize: "14px" }} className="font-weight-bold">
          {t("app.ranking.member")}
        </span>
        <span style={{ fontSize: "14px" }} className="font-weight-bold">
          {t("app.ranking.numberPosts")}
        </span>
      </div>
      {topRanking.map((o) => (
        <div
          key={o[0]}
          className="d-flex justify-content-between border-bottom py-2"
        >
          <div>
            <i className="fa fa-user-o" aria-hidden="true"></i>{" "}
            <span style={{ fontSize: "14px", marginLeft: "5px" }}>
              {t("app.common.unknown")} {o[0]}
            </span>
          </div>
          <span className="badge badge-danger">{o[1]}</span>
        </div>
      ))}
    </div>
  );
}
