export default function PostsDelete(props) {
  const { postSelected, onDeletePost} = props;
  return (
    <div
      className="modal fade"
      id="deleteModal"
      tabIndex={-1}
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div className="modal-dialog" role="document">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title">Delete Confession</h5>
            <button
              type="button"
              className="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div className="modal-body py-2 ">
            <h3 className="text-primary mb-4"># {postSelected.title}</h3>
            This action cannot be restored by anything. Do you want to delete
            this confession?
          </div>
          <div className="modal-footer">
            <button
              type="button"
              className="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button
              type="button"
              className="btn btn-danger"
              onClick={onDeletePost}
            >
              Delete
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}
