import ProfilePosts from "./ProfilePosts";
import ProfileUser from "./ProfileUser";

export default function Profile() {
  return (
    <div className="row mt-4">
      <div className="col-12 col-md-4">
        <ProfileUser />
      </div>
      <div className="col-12 col-md-8">
        <ProfilePosts />
        <ProfilePosts />
        <ProfilePosts />
      </div>
    </div>
  );
}
