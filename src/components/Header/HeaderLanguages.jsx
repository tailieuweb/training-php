export default function HeaderLanguages() {
  return (
    <div className="dropdown ml-2">
      <a
        href="#"
        className="btn btn-dark btn-sm dropdown-toggle d-flex align-items-center"
        data-toggle="dropdown"
        id="navbarDropdownMenuLink2"
      >
        <img
          className="mr-2"
          style={{ width: "22px" }}
          src="/united-kingdom.png"
        />
        Languages
      </a>
      <ul className="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
        <li>
          <a className="dropdown-item d-flex align-items-center" href="#">
            <img
              className="mr-2"
              style={{ width: "22px" }}
              src="/united-kingdom.png"
            />
            English
          </a>
        </li>
        <li>
          <a className="dropdown-item d-flex align-items-center" href="#">
            <img
              className="mr-2"
              style={{ width: "22px" }}
              src="/vietnam.png"
            />
            Vietnamese
          </a>
        </li>
      </ul>
    </div>
  );
}
