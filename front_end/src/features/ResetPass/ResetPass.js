import React from "react";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import Header from "../../components/Header";
import { useForm } from "react-hook-form";
import { useDispatch} from "react-redux";
import {loginRequest,confirmpassRequest} from "../../redux/actions";
import { useCookies } from "react-cookie";
import routes from "../../constant/routes";
import { useHistory } from "react-router";

function ResetPass() {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();
  const onSubmitForm = formData => {
    dispatch(confirmpassRequest(formData));
  };
  let history = useHistory();
  const [cookies] = useCookies(["_token"]);

  const dispatch = useDispatch();
    return (
        <div>
             <Header/>
            <div className='h-screen flex bg-gray-bg1'>
                <div className='w-full max-w-md m-auto bg-white rounded-lg border border-primaryBorder shadow-default py-10 px-16'>
                    <h1 className='text-2xl font-medium text-primary mt-4 mb-12 text-center'>
                        RESET PASSWORD
                    </h1>

                    <form onSubmit={handleSubmit(onSubmitForm)}>
                        <div>
                            <label htmlFor='verification'></label>
                            <input
                                type='text'
                                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                                id='code'
                                placeholder='verification code'
                                {...register("code", {
                                    required: {
                                      value: true,
                                      message: "Code required.",
                                    },
                                    minLength: {
                                      value: 8,
                                      message:
                                        "Code have minimum length is 8",
                                    },
                                  })}
                            />
                             {errors.code && (
                          <p className="text-red-600">
                            {errors.code.message}
                          </p>
                        )}
                        </div>
                        <div>
                            <label htmlFor='newpassword'></label>
                            <input
                                type='password'
                                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                                id='newpassword'
                                placeholder='New PassWord'
                                {...register("new_password", {
                                    required: {
                                      value: true,
                                      message: "New PassWord required.",
                                    },
                                    minLength: {
                                      value: 6,
                                      message:
                                        "Password have minimum length is 6",
                                    },
                                    maxLength: {
                                        value: 60,
                                        message:
                                          "Password have maximum length is 60",
                                      },
                                  })}
                            />
                              {errors.new_password && (
                          <p className="text-red-600">
                            {errors.new_password.message}
                          </p>
                        )}
                        </div>
                        <div>
                            <label htmlFor='confirmpassword'></label>
                            <input
                                type='password'
                                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                                id='newpassword'
                                placeholder='Confirm PassWord'
                                {...register("confirm_password", {
                                    required: {
                                      value: true,
                                      message: "Confirm PassWord required.",
                                    },
                                    minLength: {
                                      value: 6,
                                      message:
                                        "Confirm PassWord have minimum length is 6",
                                    },
                                    maxLength: {
                                        value: 60,
                                        message:
                                          "Confirm PassWord have maximum length is 60",
                                      },
                                  })}
                            />
                               {errors.confirm_password && (
                          <p className="text-red-600">
                            {errors.confirm_password.message}
                          </p>
                        )}
                        </div>
                        <div className={`bg-blue-500 py-2 px-4 text-sm text-white rounded border border-green focus:outline-none focus:border-green-dark text-center`}>
                            <button>
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default ResetPass;
