const validateUserName = require("./validateUserName");
// @ponicode
describe("validateUserName.default", () => {
  test("0", () => {
    let result = validateUserName.default("user123");
    expect(result).toMatchSnapshot();
  });

  test("1", () => {
    let result = validateUserName.default("user name");
    expect(result).toMatchSnapshot();
  });

  test("2", () => {
    let result = validateUserName.default("user-name");
    expect(result).toMatchSnapshot();
  });

  test("3", () => {
    let result = validateUserName.default("user_name");
    expect(result).toMatchSnapshot();
  });

  test("4", () => {
    let result = validateUserName.default("");
    expect(result).toMatchSnapshot();
  });
});
