import React from "react";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import Header from "../../components/Header";
import { useForm } from "react-hook-form";
import { useDispatch} from "react-redux";
import {registerRequest} from "../../redux/actions";
import { useCookies } from "react-cookie";
import routes from "../../constant/routes";
import { useHistory } from "react-router";

function Register() {
  const dispatch = useDispatch();
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();
  const onSubmitForm = formData => {
    
    dispatch(registerRequest(formData));
  };
  return (
    // Form Register
    <div>
      <Header />
      <div className="h-screen flex bg-gray-bg1">
        <div className="w-full max-w-md m-auto bg-white rounded-lg border border-primaryBorder shadow-default py-6 px-16">
          <h1 className="text-2xl font-medium text-primary mt-4 mb-12 text-center">
            REGISTER ACCOUNT{" "}
          </h1>
          <form onSubmit={handleSubmit(onSubmitForm)}>
            <div>
              <label htmlFor="email"> </label>{" "}
              <input
                type="email"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="email"
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
              <label htmlFor="firtname"> </label>{" "}
              <input
                type="text"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="firtname"
                placeholder="Firt Name"
                {...register("first_name", {
                  required: {
                    value: true,
                    message: "First Name required.",
                  },
                  minLength: {
                    value: 2,
                    message:
                      "First Name have minimum length is 2",
                  },
                  maxLength: {
                    value: 60,
                    message:
                      "First Name have maxmum length is 60",
                  },
                })}
              />
              {errors.first_name && (
                          <p className="text-red-600">
                            {errors.first_name.message}
                          </p>
                        )}
            </div>{" "}
            <div>
              <label htmlFor="lastname"> </label>{" "}
              <input
                type="text"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="lastname"
                placeholder="Last Name"
                {...register("last_name", {
                  required: {
                    value: true,
                    message: "Last Name required.",
                  },
                  minLength: {
                    value: 2,
                    message:
                      "Last Name have minimum length is 4",
                  },
                  maxLength: {
                    value: 60,
                    message:
                      "Last Name have maxmum length is 60",
                  },
                })}
              />
              {errors.last_name && (
                          <p className="text-red-600">
                            {errors.last_name.message}
                          </p>
                        )}
            </div>{" "}
            <div>
              <label htmlFor="password"> </label>{" "}
              <input
                type="password"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="password"
                placeholder="Your Password"
                {...register("password", {
                  required: {
                    value: true,
                    message: "Password  required.",
                  },
                  minLength: {
                    value: 2,
                    message:
                      "Password have minimum length is 6",
                  },
                  maxLength: {
                    value: 60,
                    message:
                      "Password have maxmum length is 60",
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
              <label htmlFor="confirmpassword"> </label>{" "}
              <input
                type="password"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="confirmpassword"
                placeholder="Confirm Password"
                {...register("confirm_password", {
                  required: {
                    value: true,
                    message: "Confirm Password  required.",
                  },
                  minLength: {
                    value: 2,
                    message:
                      "Confirm Password have minimum length is 6",
                  },
                })}
              />
               {errors.confirm_password && (
                          <p className="text-red-600">
                            {errors.confirm_password.message}
                          </p>
                        )}
            </div>{" "}
            <div>
              <label htmlFor="gender"> </label>{" "}
              <input
                type="text"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="gender"
                placeholder="1 is Female 2 is Male"
                {...register("gender", {
                  required: {
                    value: true,
                    message: "Gender required",
                  },
                  maxLength: {
                    value: 1,
                    message:
                      "",
                  },
                })}
              />
              {errors.gender && (
                          <p className="text-red-600">
                            {errors.gender.message}
                          </p>
                        )}
            </div>{" "}
            <div>
              <label htmlFor="phone"> </label>{" "}
              <input
                type="text"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-2`}
                id="phone"
                placeholder="Phone"
                {...register("phone", {
                  required: {
                    value: true,
                    message: "Phone required.",
                  },
                  minLength: {
                    value: 10,
                    message:
                      "Confirm Password have minimum length is 10",
                  },
                })}
              />
            </div>{" "}
            <div>
              <button type="submit" 
              className={`bg-blue-500 py-2 px-32 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark text-center`}
              >
                Register </button>{" "}
            </div>{" "}
            <div className="flex justify-center items-center mt-6">
              <button
                className={` bg-green-500 py-2 px-4 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark`}
              >
                <Link to="./Login"> Login </Link>{" "}
              </button>{" "}
            </div>{" "}
          </form>{" "}
        </div>{" "}
      </div>{" "}
    </div>
  );
};

export default Register;
