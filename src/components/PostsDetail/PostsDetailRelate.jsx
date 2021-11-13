import Link from "next/link";
import { useState } from "react";

export default function PostsDetailRelate(props) {
  const { posts } = props;
  return (
    <div>
      <h3 className="text-center capitalize mb-4">Maybe You Are Interested</h3>
      {posts.map((post) => {
        const isReadMore = post.description.length < 150;
        return (
          <div key={post.id} className="card mb-3">
            <div className="card-body">
              <Link href={`/posts/${post.id}`}>
                <a>
                  <h3 className="text-primary mb-2"># {post.title}</h3>
                </a>
              </Link>
              <p className="card-text" style={{ fontSize: 14 }}>
                {isReadMore
                  ? post.description
                  : `${post.description.slice(0, 150)}...`}
                {!isReadMore && (
                  <Link href={`/posts/${post.id}`}>
                    <a
                      style={{ fontSize: 12, color: "#000" }}
                      className="font-weight-bold"
                    >
                      {" "}
                      Read more
                    </a>
                  </Link>
                )}
              </p>
            </div>
          </div>
        );
      })}
    </div>
  );
}
