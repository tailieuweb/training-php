import React, { useState, useContext, memo, useEffect, useRef } from "react";
import { FiUserPlus } from "react-icons/fi";
import { AuthContext } from "../../contexts/AuthProvider";
import { AppContext } from "../../contexts/AppProvider";
import { Modal, Form, Button, Alert } from "react-bootstrap";
import SpinnerBootstrap from "../SpinnerBootstrap";
import { passwordPattern } from "../../patterns/passwordPattern";
import { emailPattern } from "../../patterns/emailPattern";
import { userNamePattern } from "../../patterns/userNamePattern";
import setAccessAndRefreshTokenToLocalAndState from "../../helpers/setAccessAndRefreshTokenToLocalAndState";
//------------------------------------------------------------------------------
export default memo(function ModalRegister() {
  const [userName, setUserName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);
  const [isDoneAllInput, setIsDoneAllInput] = useState(false);
  const { setStateAccessToken, setStateRefreshToken } = useContext(AuthContext);
  const { showModalRegister, setShowModalRegister, setShowModalLogin } =
    useContext(AppContext);
  //-----------------------------------------------------------------------------
  const handleClose = () => setShowModalRegister(false);
  const handleShow = () => setShowModalRegister(true);
  const handleRegister = (event) => {
    event.preventDefault();
    setLoading(true);
    fetch(
      import.meta.env.VITE_DOMAIN_API + import.meta.env.VITE_ENDPOINT_REGISTER,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          userName,
          email,
          password,
        }),
      }
    )
      .then((response) => response.json())
      .then((data) => {
        data.success ? setError(null) : setError(data.message);
        localStorage.setItem("accessToken", JSON.stringify(data.accessToken));
        localStorage.setItem("refreshToken", JSON.stringify(data.refreshToken));
        setLoading(false);
        setShowModalRegister(false);
        setAccessAndRefreshTokenToLocalAndState(
          data.accessToken,
          data.refreshToken,
          setStateAccessToken,
          setStateRefreshToken
        );
        location.reload();
      })
      .catch((error) => {
        setError(error.toString());
        setLoading(false);
      });
  };
  const handleOpenLogin = () => {
    setShowModalRegister(false);
    setShowModalLogin(true);
  };
  //--------------------------------------------------
  useEffect(() => {
    if (userName && email && password && confirmPassword) {
      setIsDoneAllInput(true);
    } else {
      setIsDoneAllInput(false);
    }
  }, [userName, email, password, confirmPassword]);
  //--------------------------------------------------
  return (
    <div>
      <FiUserPlus
        role="button"
        size="30"
        onClick={handleShow}
        className="text-muted"
      />
      <Modal
        show={showModalRegister}
        onHide={handleClose}
        aria-labelledby="contained-modal-title-vcenter"
        centered
      >
        <Modal.Header closeButton>
          <Modal.Title>Register</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <Form onSubmit={handleRegister}>
            <Form.Group className="mb-3">
              <Form.Label>User Name</Form.Label>
              <Form.Control
                type="text"
                placeholder="Phuong Ly"
                onChange={({ target }) => setUserName(target.value)}
                value={userName}
                pattern={userNamePattern}
                autoComplete="one-time-code"
                maxLength="30"
              />
              <Form.Text className="text-muted">
                Max length name is 30. Accept a-z, A-Z, 0-9
              </Form.Text>
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Email address</Form.Label>
              <Form.Control
                type="email"
                placeholder="DanChoiVipPro69@gmail.com"
                onChange={({ target }) => setEmail(target.value)}
                value={email}
                maxLength="30"
                autoComplete="one-time-code"
                pattern={emailPattern}
              />
              <Form.Text className="text-muted">
                Max length email is 30
              </Form.Text>
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Password</Form.Label>
              <Form.Control
                type="password"
                placeholder="Password"
                onChange={({ target }) => setPassword(target.value)}
                value={password}
                maxLength="20"
                autoComplete="one-time-code"
                pattern={passwordPattern}
              />
              <Form.Text className="text-muted">
                Max length 20. Must contain at least one number, one letter or
                more characters and at least 6
              </Form.Text>
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Confirm Password</Form.Label>
              <Form.Control
                type="password"
                placeholder="Confirm Password"
                onChange={({ target }) => setConfirmPassword(target.value)}
                value={confirmPassword}
                pattern={password}
                maxLength="20"
                autoComplete="one-time-code"
              />
            </Form.Group>
            {error && <Alert variant="danger">{error}</Alert>}
            <div className="d-flex justify-content-between">
              {loading ? (
                <Button variant="primary" disabled>
                  <SpinnerBootstrap />
                  Loading...
                </Button>
              ) : (
                <Button
                  variant="primary"
                  type="submit"
                  disabled={!isDoneAllInput}
                >
                  Register
                </Button>
              )}
              <Button
                variant="primary"
                className="float-end"
                onClick={handleOpenLogin}
              >
                Login
              </Button>
            </div>
          </Form>
        </Modal.Body>
      </Modal>
    </div>
  );
});
