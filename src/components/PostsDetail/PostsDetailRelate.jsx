
import Link from 'next/link';

export default function PostsDetailRelate() {
  return (
    <div>
      <h3 className="text-center capitalize mb-4">Maybe You Are Interested</h3>
      <div className="card mb-3">
        <div className="card-body">
          <Link href={`/posts/${"1"}`}>
            <a>
              <h3 className="text-primary mb-2"># Post Title</h3>
            </a>
          </Link>
          <p className="card-text" style={{ fontSize: 14 }}>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </p>
        </div>
      </div>
      <div className="card mb-3">
        <div className="card-body">
          <Link href={`/posts/${"1"}`}>
            <a>
              <h3 className="text-primary mb-2"># Post Title</h3>
            </a>
          </Link>
          <p className="card-text" style={{ fontSize: 14 }}>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </p>
        </div>
      </div>
      <div className="card mb-3">
        <div className="card-body">
          <Link href={`/posts/${"1"}`}>
            <a>
              <h3 className="text-primary mb-2"># Post Title</h3>
            </a>
          </Link>
          <p className="card-text" style={{ fontSize: 14 }}>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </p>
        </div>
      </div>
    </div>
  );
}
