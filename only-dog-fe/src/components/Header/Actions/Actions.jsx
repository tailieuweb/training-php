import React, { useContext, memo } from "react";
import { RiImageAddLine } from "react-icons/ri";
import ModalLogin from "../../Modal/ModalLogin";
import ModalRegister from "../../Modal/ModalRegister";
import AvatarUser from "./AvatarUser";
import { AuthContext } from "../../../contexts/AuthProvider";
import ModalImage from "../../../components/Modal/ModalImage";
import Logout from "./Logout";
//--------------------------------------------------
export default memo(function Actions() {
  const { stateAccessToken, setStateAccessToken, setStateRefreshToken } =
    useContext(AuthContext);
  //--------------------------------------------------
  window.onstorage = () => {
    localStorage.getItem("accessToken")
      ? setStateAccessToken(JSON.parse(localStorage.getItem("accessToken")))
      : setStateAccessToken("");
  };
  //--------------------------------------------------
  return (
    <div>
      <div
        className={
          stateAccessToken ? "d-flex justify-content-around" : "d-none"
        }
      >
        <ModalImage
          component={
            <RiImageAddLine
              style={{ marginRight: 18 }}
              role="button"
              size="30"
              className="text-muted"
            />
          }
          endpoint={import.meta.env.VITE_ENDPOINT_ADD_POST}
        />
        <AvatarUser />
        <Logout
          setStateAccessToken={setStateAccessToken}
          setStateRefreshToken={setStateRefreshToken}
        />
      </div>
      <div
        className={
          stateAccessToken ? "d-none" : "d-flex justify-content-around"
        }
      >
        <ModalLogin />
        <ModalRegister />
      </div>
    </div>
  );
});
