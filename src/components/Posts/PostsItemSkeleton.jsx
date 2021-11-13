import Skeleton from "react-loading-skeleton";

export default function PostsItemSkeleton() {
  return (
    <div className="card">
      <div className="card-body">
        <div className="d-flex justify-content-between">
          <div className="d-flex align-items-center">
            <Skeleton href="#!" className="avatar rounded-circle">
              <img
                alt="Image placeholder"
                src="https://ui-avatars.com/api/?name=Unknown"
              />
            </Skeleton>
            <div className="ml-3">
              <Skeleton width={200}></Skeleton>
              <Skeleton width={200}></Skeleton>
            </div>
          </div>
        </div>
        <Skeleton className="text-primary my-4"></Skeleton>
        <Skeleton height={200} className="card-text"></Skeleton>
      </div>
    </div>
  );
}
