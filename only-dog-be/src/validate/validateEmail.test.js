const validateEmail = require("./validateEmail");
// @ponicode
describe("validateEmail.default", () => {
  test("0", () => {
    let result = validateEmail.default("email@Google.com");
    expect(result).toMatchSnapshot();
  });

  test("1", () => {
    let result = validateEmail.default("bed-free@tutanota.de");
    expect(result).toMatchSnapshot();
  });

  test("2", () => {
    let result = validateEmail.default("TestUpperCase@Example.com");
    expect(result).toMatchSnapshot();
  });

  test("3", () => {
    let result = validateEmail.default("something.example.com");
    expect(result).toMatchSnapshot();
  });

  test("4", () => {
    let result = validateEmail.default("user1+user2@mycompany.com");
    expect(result).toMatchSnapshot();
  });

  test("5", () => {
    let result = validateEmail.default("");
    expect(result).toMatchSnapshot();
  });
});
