import React from "react";
import { RiLogoutBoxRLine } from "react-icons/ri";
import setAccessAndRefreshTokenToLocalAndState from "../../../helpers/setAccessAndRefreshTokenToLocalAndState";
//--------------------------------------------------------
export default function Logout({ setStateAccessToken, setStateRefreshToken }) {
  return (
    <RiLogoutBoxRLine
      role="button"
      size="30"
      onClick={() => {
        setAccessAndRefreshTokenToLocalAndState(
          "",
          "",
          setStateAccessToken,
          setStateRefreshToken
        );
        location.reload();
      }}
      className="text-muted"
    />
  );
}
