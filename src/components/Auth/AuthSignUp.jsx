export default function AuthSignUp(props) {
  return (
    <div>
      <div className="form-group">
        <label htmlFor="">UserName</label>
        <input
          type="text"
          className="form-control"
          placeholder="Type your username..."
          aria-describedby="helpId"
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Email</label>
        <input
          type="email"
          className="form-control"
          placeholder="Type your email..."
          aria-describedby="helpId"
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Password</label>
        <input
          type="password"
          className="form-control"
          placeholder="Type your password..."
          aria-describedby="helpId"
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Re Password</label>
        <input
          type="password"
          className="form-control"
          placeholder="Type your confirm password..."
          aria-describedby="helpId"
        />
      </div>
      <small id="helpId" className="text-muted">
        By clicking the sign up button, you agree to our{" "}
        <a href="">terms and conditions</a> and <a href="">privacy policy</a>.
      </small>
    </div>
  );
}
