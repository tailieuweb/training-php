export default function validateUserName(userName) {
  const pattern = /^[\w\s\-]{1,30}$/; //a-z A-Z 0-9 _ -
  return pattern.test(userName);
}
