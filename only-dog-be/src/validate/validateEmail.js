export default function validateEmail(email) {
  const pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$/;
  return pattern.test(email);
}
