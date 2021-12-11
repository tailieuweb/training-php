export default function putData(endpoint = "", headers = {}, body = {}) {
  return fetch(import.meta.env.VITE_DOMAIN_API + endpoint, {
    method: "PUT",
    headers,
    body,
  });
}
