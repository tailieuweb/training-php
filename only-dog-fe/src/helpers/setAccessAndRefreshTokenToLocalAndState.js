//------------------------------------------------------
export default function setAccessAndRefreshTokenToLocalAndState(
  accessToken,
  refreshToken,
  setStateAccessToken,
  setStateRefreshToken
) {
  accessToken
    ? localStorage.setItem("accessToken", JSON.stringify(accessToken))
    : localStorage.removeItem("accessToken");
  refreshToken
    ? localStorage.setItem("refreshToken", JSON.stringify(refreshToken))
    : localStorage.removeItem("refreshToken");
  setStateAccessToken(accessToken);
  setStateRefreshToken(refreshToken);
}
