import jwt_decode from "jwt-decode";
//---------------------------------
export default function getUserIdFromAccessToken(accessToken) {
  if (accessToken) {
    return jwt_decode(accessToken).userId;
  }
  return "";
}
