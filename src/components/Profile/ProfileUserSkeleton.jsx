import Skeleton from "react-loading-skeleton";

export default function ProfileUserSkeleton() {
  return (
    <div>
      <Skeleton className="avatar" width={200} height={200}></Skeleton>
      <div className="mt-3">
        <Skeleton width={250} className="card-title mb-0"></Skeleton>
        <Skeleton width={250} className="card-text d-block mt-1"></Skeleton>
      </div>
    </div>
  );
}
