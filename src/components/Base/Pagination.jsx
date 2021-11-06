import Link from "next/link";
import { useRouter } from "next/router";
import { getPaginate } from "../../utils/commonFunctions";

export default function Pagination(props) {
  const router = useRouter();
  const pageNum = parseInt(router.query.page) || 1;

  const { baseUrl = "", maxSize = 1000, itemSize = 50 } = props;
  const paginate = getPaginate(maxSize, pageNum, itemSize);

  const passUrl = (page) => ({
    pathname: baseUrl,
    query: { ...router.query, page },
  });

  const isDisableLeft = () => (pageNum <= 1 ? " disabled" : "");
  const isDisableRight = () =>
    pageNum >= paginate.totalPages ? " disabled" : "";

  return (
    <div className="d-flex justify-content-center mt-4">
      <ul className="pagination">
        <li className={`d-none d-md-block page-item${isDisableLeft()}`}>
          <Link href={passUrl(1)}>
            <a className="page-link">
              <i className="fa fa-angle-double-left"></i>
              <span className="sr-only">First</span>
            </a>
          </Link>
        </li>

        <li className={`page-item${isDisableLeft()}`}>
          <Link href={passUrl(pageNum - 1)}>
            <a className="page-link">
              <i className="fa fa-angle-left"></i>
              <span className="sr-only">Previous</span>
            </a>
          </Link>
        </li>

        {paginate.pages.map((page) => {
          const active = pageNum === page ? " active" : "";
          return (
            <li key={page} className={`page-item${active}`}>
              <Link href={passUrl(page)}>
                <a className="page-link">{page}</a>
              </Link>
            </li>
          );
        })}

        <li className={`page-item${isDisableRight()}`}>
          <Link href={passUrl(pageNum + 1)}>
            <a className="page-link">
              <i className="fa fa-angle-right"></i>
              <span className="sr-only">Next</span>
            </a>
          </Link>
        </li>

        <li className={`d-none d-md-block page-item${isDisableRight()}`}>
          <Link href={passUrl(paginate.totalPages)}>
            <a className="page-link">
              <i className="fa fa-angle-double-right"></i>
              <span className="sr-only">Last</span>
            </a>
          </Link>
        </li>
      </ul>
    </div>
  );
}
