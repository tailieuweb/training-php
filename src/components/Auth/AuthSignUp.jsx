export default function AuthSignUp(props) {
  const { inputForm, onChange } = props;
  return (
    <div>
      <div className="form-group">
        <label htmlFor="">UserName</label>
        <input
          name="name"
          type="text"
          value={inputForm.name}
          onChange={onChange}
          className="form-control"
          placeholder="Type your username..."
          aria-describedby="helpId"
          required
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Email</label>
        <input
          name="email"
          type="email"
          value={inputForm.email}
          onChange={onChange}
          className="form-control"
          placeholder="Type your email..."
          aria-describedby="helpId"
          required
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Password</label>
        <input
          name="password"
          type="password"
          value={inputForm.password}
          onChange={onChange}
          className="form-control"
          placeholder="Type your password..."
          aria-describedby="helpId"
          required
        />
      </div>
      <div className="form-group">
        <label htmlFor="">Re Password</label>
        <input
          name="confirm_password"
          type="password"
          value={inputForm.confirm_password}
          onChange={onChange}
          className="form-control"
          placeholder="Type your confirm password..."
          aria-describedby="helpId"
          required
        />
      </div>
      <small id="helpId" className="text-muted">
        By clicking the sign up button, you agree to our{" "}
        <a href="">terms and conditions</a> and <a href="">privacy policy</a>.
      </small>
    </div>
  );
}
