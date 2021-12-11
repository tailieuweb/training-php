export default function getData(endpoint = "", headers = {}) {
  return fetch(import.meta.env.VITE_DOMAIN_API + endpoint, {
    headers,
  });
}
