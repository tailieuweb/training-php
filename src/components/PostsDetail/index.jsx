import PostsDetailContent from "./PostsDetailContent";
import PostsDetailRelate from './PostsDetailRelate';

export default function PostsDetail() {
  return (
    <div className="row mt-4">
      <div className="col-12 col-md-8">
        <PostsDetailContent />
      </div>
      <div className="col-12 col-md-4">
        <PostsDetailRelate />
      </div>
    </div>
  );
}
