import React from "react";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import Header from "../../components/Header";
import { useForm } from "react-hook-form";
import { useDispatch} from "react-redux";
import {loginRequest} from "../../redux/actions";
import { useCookies } from "react-cookie";
import routes from "../../constant/routes";
import { useHistory } from "react-router";

function Login() {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();
  const onSubmitForm = formData => {
    dispatch(loginRequest(formData));
  };
  let history = useHistory();
  const [cookies] = useCookies(["_token"]);
  // if (cookies._token) {
  //   history.push(routes.homepage);
  // }
  const dispatch = useDispatch();
  //Form Login
  return (
    <div>
      <Header />
      <div className="h-screen flex bg-gray-bg1">
        <div className="w-full max-w-md m-auto bg-white rounded-lg border border-primaryBorder shadow-default py-10 px-16">
          <h1 className="text-2xl font-medium text-primary mt-4 mb-12 text-center">
            LOG IN🔐{" "}
          </h1>
          <form onSubmit={handleSubmit(onSubmitForm)}>
            <div>
              <label htmlFor="email"> </label>{" "}
              <input
                type="email"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                id="login-email-input"
                placeholder="Your Email"
                {...register("email", {
                  required: {
                    value: true,
                    message: "Email required.",
                  },
                })}
              />
              {errors.email && (
                          <p className="text-red-600">
                            {errors.email.message}
                          </p>
                        )}
            </div>{" "}
            <div>
              <label htmlFor="password"> </label>{" "}
              <input
                type="password"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                id="login-password-input"
                placeholder="Your Password"
                {...register("password", {
                  required: {
                    value: true,
                    message: "Password  required.",
                  },
                  minLength: {
                    value: 6,
                    message:
                      "Password have minimum length is 6",
                  },
                })}
              />
              {errors.password && (
                          <p className="text-red-600">
                            {errors.password.message}
                          </p>
                        )}
            </div>{" "}
            <div>
              <button type="submit" 
              className={`bg-blue-500 py-2 px-36 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark text-center`}
              >
                Login </button>{" "}
            </div>{" "}
            <div className="flex justify-center items-center mt-6">
              <button
                className={`bg-green-500 py-2 px-4 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark`}
              >
                {" "}
                <Link to="./Register"> Register </Link>{" "}
              </button>{" "}
            </div>{" "}
            <div className="text-center color-red">
              <button className="bg-white">
                <Link to="./Pass"> Forgot password </Link>{" "}
              </button>{" "}
            </div>{" "}
          </form>{" "}
        </div>{" "}
      </div>{" "}
    </div>
  );
};

export default Login;