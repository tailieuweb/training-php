export default function PostsAdd(props) {
  const { postSelected, onChange, onAddPost } = props;
  return (
    <div
      className="modal fade"
      id="addModal"
      tabIndex="-1"
      role="dialog"
      aria-labelledby="addModalLabel"
      aria-hidden="true"
    >
      <form
        onSubmit={onAddPost}
        className="modal-dialog modal-dialog-centered"
        role="document"
      >
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title" id="addModalLabel">
              Write Your Confessions
            </h5>
            <button
              type="button"
              className="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div className="modal-body px-5 py-3">
            <div className="form-group">
              <label htmlFor="">Title</label>
              <input
                name="title"
                type="text"
                value={postSelected.title}
                onChange={onChange}
                className="form-control"
                placeholder="Type a awesome title..."
                aria-describedby="helpId"
                required
              />
            </div>
            <div className="form-group">
              <label htmlFor="">Content</label>
              <textarea
                name="description"
                className="form-control"
                rows="10"
                placeholder="Share with us your own stories and others."
                value={postSelected.description}
                onChange={onChange}
                required
              ></textarea>
            </div>
          </div>
          <div className="modal-footer">
            <button
              type="button"
              className="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" className="btn btn-primary">
              Post Your Confessions
            </button>
          </div>
        </div>
      </form>
    </div>
  );
}
