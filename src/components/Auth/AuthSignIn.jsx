import githubLogo from "../../assets/images/github.svg";
import googleLogo from "../../assets/images/google.svg";

export default function AuthSignIn(props) {
  const {inputForm, onChange} = props;
  return (
    <div>
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
      <div className="btn-wrapper text-center mb-2">
        {/* <a href="#" className="btn btn-neutral btn-icon">
          <span className="btn-inner--icon">
            <img src={githubLogo} />
          </span>
          <span className="btn-inner--text">Sign In Github</span>
        </a>
        <a href="#" className="btn btn-neutral btn-icon">
          <span className="btn-inner--icon">
            <img src={googleLogo} />
          </span>
          <span className="btn-inner--text">Sign In Google</span>
        </a> */}
      </div>
    </div>
  );
}
