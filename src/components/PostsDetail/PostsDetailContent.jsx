export default function PostsDetailContent() {
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
              <small className="card-text">10/10/2021</small>
            </div>
          </div>
        </div>
        <h2 className="text-primary my-4"># Post Title</h2>
        <p className="card-text">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
          voluptatibus reprehenderit doloribus quasi quisquam beatae placeat
          nemo enim, recusandae optio! Nesciunt dolor praesentium dignissimos,
          temporibus nemo voluptatum similique ad quod?
        </p>
      </div>
    </div>
  );
}
