import React, { useRef, useEffect } from "react";
import routes from "../../constant/routes";
import { useHistory } from "react-router";
import Header from "../../components/Header";

import { useForm } from "react-hook-form";
import { useDispatch, useSelector } from "react-redux";
import { changePasswordRequest } from "../../redux/actions";
import Cookies from "universal-cookie";
//Function Changepassword
function ChangePassword() {
  let cookie = new Cookies();
  let history = useHistory();
  const {
    register,
    handleSubmit,
    formState: { errors },
    watch,
  } = useForm();

  const dispatch = useDispatch();
  const new_password = useRef({});
  new_password.current = watch("new_password", "");
  //

  //Submit Form
  function onSubmitForm(formData) {
    dispatch(changePasswordRequest(formData));
  }
  //
  function onHandleCancel() {
    history.push(routes.profile);
  }
  //
  if (!cookie.get("_token")) {
    history.push(routes.home);
  }
  return (
    <div>
      <Header />
      <div className="h-screen flex bg-gray-bg1">
        <div className="w-full max-w-md m-auto bg-white rounded-lg border border-primaryBorder shadow-default py-10 px-16">
          <h1 className="text-2xl font-medium text-primary mt-4 mb-12 text-center">
            CHANGE PASSWORD🔐{" "}
          </h1>
          <form onSubmit={handleSubmit(onSubmitForm)}>
            <div>
              <input
                type="password"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                id="old_password"
                name="old_password"
                placeholder="Your Password"
                {...register("old_password", {
                  required: {
                    value: true,
                    message: "Password is required",
                  },
                  minLength: {
                    value: 6,
                    message: "Password should be minimum length of 6",
                  },
                  maxLength: {
                    value: 24,
                    message: "Password should be maximum length of 24",
                  },
                })}
              />{" "}
              {errors.old_password && (
                <p className="text-red-600"> {errors.old_password.message} </p>
              )}{" "}
            </div>{" "}
            <div>
              <input
                type="password"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                id="new_password"
                name="new_password"
                placeholder="New Password"
                {...register("new_password", {
                  required: {
                    value: true,
                    message: "Password is required",
                  },
                  minLength: {
                    value: 6,
                    message: "Password should be minimum length of 6",
                  },
                  maxLength: {
                    value: 24,
                    message: "Password should be maximum length of 24",
                  },
                })}
              />{" "}
              {errors.new_password && (
                <p className="text-red-600"> {errors.new_password.message} </p>
              )}{" "}
            </div>{" "}
            <div>
              <input
                type="password"
                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                id="confirm_new_password"
                name="confirm_new_password"
                placeholder="Confirm New Password"
                {...register("confirm_new_password", {
                  required: {
                    value: true,
                    message: "The passwords is required",
                  },
                  minLength: {
                    value: 6,
                    message: "Password should be minimum length of 6",
                  },
                  maxLength: {
                    value: 24,
                    message: "Password should be maximum length of 24",
                  },
                  validate: value =>
                    value === new_password.current ||
                    "The passwords do not match",
                })}
              />{" "}
              {errors.confirm_new_password && (
                <p className="text-red-600">
                  {" "}
                  {errors.confirm_new_password.message}{" "}
                </p>
              )}{" "}
            </div>{" "}
            <div
              className={`bg-blue-500 py-2 px-4 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark text-center`}
            >
              <button type="submit"> Submit </button>{" "}
            </div>{" "}
            <div
              className={`mt-4 bg-red-500 py-2 px-4 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark text-center`}
            >
              <button onClick={onHandleCancel}> Cancel </button>{" "}
            </div>{" "}
          </form>{" "}
        </div>{" "}
      </div>{" "}
    </div>
  );
}

export default ChangePassword;
