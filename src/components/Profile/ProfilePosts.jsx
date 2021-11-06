
import Link from "next/link";

export default function ProfilePosts() {
    return (
      <div className="card mb-3">
        <div className="card-body">
          <div className="d-flex justify-content-between align-items-center mb-4">
            <Link href={`/posts/${"1"}`}>
              <a>
                <h3 className="text-primary mb-0"># Post Title</h3>
              </a>
            </Link>
            <div>
              <button
                type="button"
                className="btn btn-warning btn-sm"
                data-toggle="modal"
                data-target="#editModal"
              >
                Sửa
              </button>
              <button
                type="button"
                className="btn btn-danger btn-sm"
                data-toggle="modal"
                data-target="#deleteModal"
              >
                Xóa
              </button>
            </div>
          </div>
          <p className="card-text">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate
            recusandae alias nulla non, architecto aperiam nostrum ratione
            blanditiis, doloribus sed excepturi esse molestias asperiores
            incidunt reiciendis explicabo, delectus earum vel!
          </p>
        </div>
      </div>
    );
}
