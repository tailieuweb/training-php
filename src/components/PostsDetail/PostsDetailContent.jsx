export default function PostsDetailContent() {
    return (
      <div className="bg-white rounded-lg px-5 py-4">
        <div className="py-2">
          <div className="d-flex justify-content-between">
            <div className="d-flex align-items-center">
              <a href="#!" className="avatar rounded-circle">
                <img
                  alt="Image placeholder"
                  src="https://ui-avatars.com/api/?name=Unknown"
                />
              </a>
              <div className="ml-3">
                <a href="">
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
