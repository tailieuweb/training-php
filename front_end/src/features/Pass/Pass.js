import React from "react";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import Header from "../../components/Header";
import { useForm } from "react-hook-form";
import { useDispatch} from "react-redux";
import {loginRequest,resetpassRequest} from "../../redux/actions";
import { useCookies } from "react-cookie";
import routes from "../../constant/routes";
import { useHistory } from "react-router";

function Pass() {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();
  const onSubmitForm = formData => {
    dispatch(resetpassRequest(formData));
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
                        FORGOT PASSWORD
                    </h1>

                      <form onSubmit={handleSubmit(onSubmitForm)}>
                        <div>
                            <label htmlFor='email'></label>
                            <input
                                type='email'
                                className={`w-full p-2 text-primary border rounded-md outline-none text-sm transition duration-150 ease-in-out mb-4`}
                                id='email'
                                placeholder='Your Email'
                                {...register("email", {
                                    required: {
                                      value: true,
                                      message: "Email required.",
                                    },
                                    minLength: {
                                      value: 6,
                                      message:
                                        "Email have minimum length is 6",
                                    },
                                  })}
                            />
                             {errors.email && (
                          <p className="text-red-600">
                            {errors.email.message}
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

export default Pass;
