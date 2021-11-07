import Skeleton from "react-loading-skeleton";

export default function ProfilePostSkeleton() {
  return (
    <div className="card mb-3">
      <div className="card-body">
        <Skeleton className="text-primary mb-4"></Skeleton>
        <Skeleton height={70} className="card-text"></Skeleton>
      </div>
    </div>
  );
}
