export default function AuthSignUp(props) {
  const {
    name,
    email,
    password,
    confirm_password,
    setName,
    setEmail,
    setPassword,
    setConfirmPassword,
  } = props;
  return (
    <div>
      <div className="form-group">
        <label htmlFor="">UserName</label>
        <input
          type="text"
          value={name}
          onChange={(e) => setName(e.target.value)}
          className="form-control"
          placeholder="Type your username..."
          aria-describedby="helpId"
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Email</label>
        <input
          type="email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          className="form-control"
          placeholder="Type your email..."
          aria-describedby="helpId"
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Password</label>
        <input
          type="password"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          className="form-control"
          placeholder="Type your password..."
          aria-describedby="helpId"
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Re Password</label>
        <input
          type="password"
          value={confirm_password}
          onChange={(event) => setConfirmPassword(event.target.value)}
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
