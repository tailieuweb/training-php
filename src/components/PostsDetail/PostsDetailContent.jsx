import Link from "next/link";
export default function PostsDetailContent(props) {
  const { post } = props;
  return (
    <div className="card bg-white rounded-lg p-4">
      <div className="card-body py-2">
        <div className="d-flex justify-content-between">
          <div className="d-flex align-items-center">
            <a className="avatar rounded-circle">
              <img
                alt="Image placeholder"
                src="https://ui-avatars.com/api/?name=Unknown"
              />
            </a>
            <div className="ml-3">
              <a>
                <h5 className="card-title mb-0">Unknown User</h5>
              </a>
              <small className="card-text">{post?.created_at}</small>
            </div>
          </div>
        </div>
        <Link href={`/posts/${post?.id}`}>
          <a>
            <h2 className="text-primary my-4"># {post?.title}</h2>
          </a>
        </Link>
        <p className="card-text">{post?.description}</p>
      </div>
    </div>
  );
}
