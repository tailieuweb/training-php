export default function putData(endpoint = "", headers = {}) {
  return fetch(import.meta.env.VITE_DOMAIN_API + endpoint, {
    headers,
  });
}
