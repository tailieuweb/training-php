export default function validatePassword(password) {
  const pattern = /^(?=.*[A-Za-z])(?=.*\d).{6,30}$/;
  return pattern.test(password);
}
