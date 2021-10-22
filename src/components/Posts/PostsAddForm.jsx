import PostsAdd from "./PostsAdd";
import { useDispatch, useSelector } from "react-redux";
import { actAddPost, actLoadPosts } from "../../redux/actions/postsActions";
import { useRouter } from "next/dist/client/router";
import { useEffect, useState } from "react";
import { toast } from "react-toastify";

const ITEM_PER_PAGE = 5;
const inputPost = { id: "", title: "", description: "" };
export default function PostsAddForm() {
  // Next
  const router = useRouter();
  const { pageNum } = router.query;

  // Redux
  const dispatch = useDispatch();
  const selectorPosts = useSelector((state) => state.posts);
  const postsBase = selectorPosts?.posts;

  // State React
  const [posts, setPosts] = useState([]);
  const [postSelected, setPostSelected] = useState(inputPost);

  // Effect
  useEffect(() => dispatch(actLoadPosts()), []);

  useEffect(() => {
    const postsData = [...postsBase].splice(
      (pageNum - 1) * ITEM_PER_PAGE,
      ITEM_PER_PAGE
    );
    setPosts(postsData);
  }, [pageNum, postsBase]);

  // Functions
  const onChange = (e) => {
    const { name, value } = e.target;
    setPostSelected({ ...postSelected, [name]: value });
  };
    const onAddPost = async (e) => {
      e.preventDefault();
      const { title, description } = postSelected;
      if (title.length === 0 || description.length === 0) {
        return toast.warning("Vui lòng nhập đầy đủ thông tin");
      }
    // request and close modal
    await dispatch(actAddPost(postSelected));
    document.querySelector("#editModal button[data-dismiss='modal']").click();
  };
  return (
    <div className="card">
      <div className="card-body">
        <div className="d-flex align-items-center">
          <div className="w-100">
            <button
              type="button"
              className="btn btn-primary btn-sm"
              data-toggle="modal"
              data-target="#postsAddModal"
            >
              <i className="fa fa-plus mr-1" aria-hidden="true"></i> New Your
              Confessions
            </button>
            <PostsAdd
             postSelected={postSelected}
             onChange={onChange}
             onAddPost={onAddPost}/>
          </div>
        </div>
        <small className="card-text d-block mt-3">
          Share with us your own stories and others.
        </small>
      </div>
    </div>
  );
}
