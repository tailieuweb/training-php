import React, { memo, useState, createContext } from "react";
//-----------------------------------------------------------
export default memo(function AuthProvider({ children }) {
  const [stateAccessToken, setStateAccessToken] = useState(
    JSON.parse(localStorage.getItem("accessToken"))
  );
  const [stateRefreshToken, setStateRefreshToken] = useState(
    JSON.parse(localStorage.getItem("refreshToken"))
  );
  //-----------------------------------------------------------
  return (
    <AuthContext.Provider
      value={{
        stateAccessToken,
        setStateAccessToken,
        stateRefreshToken,
        setStateRefreshToken,
      }}
    >
      {children}
    </AuthContext.Provider>
  );
});
//--------------------------------------------------------------
export const AuthContext = createContext();
