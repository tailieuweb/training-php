import Skeleton from "react-loading-skeleton";

export default function PostsDetailContentSkeleton() {
  return (
    <div className="card bg-white rounded-lg p-4">
      <div className="card-body py-2">
        <div className="d-flex justify-content-between">
          <div className="d-flex align-items-center">
            <Skeleton href="#!" className="avatar rounded-circle">
              <img
                alt="Image placeholder"
                src="https://ui-avatars.com/api/?name=Unknown"
              />
            </Skeleton>
            <div className="ml-3">
              <Skeleton width={100}></Skeleton>
              <Skeleton width={100}></Skeleton>
            </div>
          </div>
        </div>
        <Skeleton className="text-primary my-4"></Skeleton>
        <Skeleton height={200} className="card-text"></Skeleton>
      </div>
    </div>
  );
}
