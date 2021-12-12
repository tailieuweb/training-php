import { useTranslation } from "next-i18next";
import Link from "next/link";
import { useRouter } from "next/router";
import { useSelector } from "react-redux";

export default function PostsFilter() {
  const router = useRouter();
  const { t } = useTranslation("common");

  const selectorPosts = useSelector((state) => state.posts);
  const postsBase = selectorPosts?.posts;

  const onPostRandom = () => {
    const filterId = postsBase.map((post) => post.id);
    router.push(
      `/posts/${filterId[Math.floor(Math.random() * filterId.length)]}`
    );
  };

  return (
    <div className="bg-white">
      <div className="container pb-3">
        <Link
          href={{
            pathname: "/posts",
            query: { filter: "new" },
          }}
        >
          <a className="btn btn-primary btn-sm">
            <i className="fa fa-sort-amount-asc" aria-hidden="true"></i>{" "}
            {t("app.post.filterNew")}
          </a>
        </Link>
        <Link
          href={{
            pathname: "/posts",
            query: { filter: "random" },
          }}
        >
          <a className="btn btn-warning btn-sm">
            <i className="fa fa-random" aria-hidden="true"></i>{" "}
            {t("app.post.filterRandom")}
          </a>
        </Link>
        <button
          type="button"
          className="btn btn-danger btn-sm"
          onClick={onPostRandom}
        >
          <i className="fa fa-random" aria-hidden="true"></i>{" "}
          {t("app.post.filterRandomPosts")}
        </button>
      </div>
    </div>
  );
}
