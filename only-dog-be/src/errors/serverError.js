export default function serverError(res) {
  return res
    .status(500)
    .json({ success: false, message: "Internal server error" });
}
