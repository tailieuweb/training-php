import Skeleton from "react-loading-skeleton";

export default function PostsDetailRelateSkeleton() {
  return (
    <div className="row">
      {[...Array(6).keys()].map((item) => {
        return (
          <div key={item}  className="col-md-4">
            <div className="card mb-3">
              <div className="card-body">
                <Skeleton className="text-primary mb-2"></Skeleton>
                <Skeleton height={100} className="card-text"></Skeleton>
              </div>
            </div>
          </div>
        );
      })}
    </div>
  );
}
