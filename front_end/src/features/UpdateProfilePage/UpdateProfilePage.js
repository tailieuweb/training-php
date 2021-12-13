// FEATURE UPDATE PROFILE
// Packages
import React, { useState, useEffect } from "react";
import PropTypes from "prop-types";
import { useDispatch, useSelector } from "react-redux";
import { getProfileRequest } from "../../redux/actions";
import { useForm } from "react-hook-form";
import { useHistory } from "react-router";
import routes from "../../constant/routes";
import Cookies from "universal-cookie";
import { updateProfileRequest } from "../../redux/actions";
// Components
import Header from "../../components/Header";
import Footer from "../../components/Footer";

UpdateProfile.propTypes = {};
function UpdateProfile(props) {
  let cookie = new Cookies();
  const dispatch = useDispatch();
  const [avatar, setAvatar] = useState();
  let history = useHistory();
  //const [changeAvt, setChangeAvt] = useState(false);
  const {
    register,
    handleSubmit,
    formState: { errors },
    setError,
    setValue,
    watch,
  } = useForm();

  const profile = useSelector(state => state.getProfileReducer.data);
  //
  useEffect(() => {
    dispatch(getProfileRequest());
  }, []);
  //
  useEffect(() => {
    register("avatar", {
      required: { value: false },
      validate: value =>
        value.type === "image/png" ||
        value.type === "image/jpeg" ||
        " TYPE IVAILID!",
    });
  }, [register]);

  //
  const onAvatarStateChange = e => {
    if (e.target.files[0]) {
      //setChangeAvt(true);
      setValue("avatar", e.target.files[0]);
    }
  };
  const editorContent = watch("avatar");
  //Submit Form
  const onSubmitForm = formData => {
    if (!editorContent) {
      setValue("avatar", "");
    }
    console.log("FORM DATA: ", formData);
    dispatch(updateProfileRequest(formData));
  };
  //
  const onHandleCancel = () => {
    history.push(routes.profile);
  };
  //
  if (!cookie.get("_token")) {
    history.push(routes.home);
  }
  return (
    <>
      {/* Header */}
      <Header></Header>
      {/* Form Update */}
      {profile ? (
        <div className="relative min-h-full flex items-center justify-center bg-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-200 bg-no-repeat bg-cover relative items-center">
          <div className="absolute  opacity-60 inset-0 z-0"></div>
          <div className="max-w-3xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div className="grid  gap-8 grid-cols-1">
              <div className="flex flex-col ">
                <div className="flex flex-col sm:flex-row items-center">
                  <h2 className="font-semibold text-lg mr-auto">
                    Update Profile
                  </h2>
                  <div className="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                </div>
                <div className="mt-5">
                  <form onSubmit={handleSubmit(onSubmitForm)}>
                    <div className="md:space-y-2 mb-3">
                      <label className="text-xs font-semibold text-gray-600 py-2">
                        Avatar
                        <abbr className="hidden" title="required">
                          *
                        </abbr>
                      </label>
                      <div className="flex items-center py-6">
                        <div className="w-24 h-24 mr-4 flex-none rounded-xl  overflow-hidden ">
                          <img
                            className="w-24 h-24 mr-4 object-cover"
                            src={avatar ? avatar : profile.avatar}
                            alt="Avatar Upload"
                          />
                        </div>
                        <label className="cursor-pointer ">
                          <span className="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">
                            Browse
                          </span>
                          <input
                            type="file"
                            className="hidden"
                            name="avatar"
                            id="avatar"
                            onInputCapture={e => {
                              if (e.target.files[0]) {
                                if (
                                  e.target.files[0].type === "image/png" ||
                                  e.target.files[0].type === "image/jpeg"
                                ) {
                                  let reader = new FileReader();
                                  let file = e.target.files[0];
                                  if (file) {
                                    reader.readAsDataURL(e.target.files[0]);
                                    reader.onload = e => {
                                      setAvatar(e.target.result);
                                    };
                                  }
                                } else {
                                  setError("avatar", {
                                    message: "TYPE INVAILID",
                                  });
                                  setValue("avatar", null);
                                  setAvatar(profile.avatar);
                                }
                              }
                            }}
                            onChange={e => {
                              onAvatarStateChange(e);
                            }}
                          />
                        </label>
                        {errors.avatar && (
                          <p className="text-red-600">
                            {errors.avatar.message}
                          </p>
                        )}
                      </div>
                    </div>
                    <div className="md:flex flex-row md:space-x-4 w-full text-xs">
                      <div className="mb-3 space-y-2 w-full text-xs">
                        <label className="font-semibold text-gray-600 py-2">
                          First Name <abbr title="required">*</abbr>
                        </label>
                        <input
                          placeholder="First Name"
                          className="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                          required="required"
                          type="text"
                          name="first_name"
                          id="first_name"
                          defaultValue={profile.first_name}
                          {...register("first_name", {
                            required: {
                              value: true,
                              message: "First name required.",
                            },
                            maxLength: {
                              value: 24,
                              message:
                                "First name should be maximum length of 24",
                            },
                          })}
                        />
                        {errors.first_name && (
                          <p className="text-red-600">
                            {errors.first_name.message}
                          </p>
                        )}
                      </div>
                      <div className="mb-3 space-y-2 w-full text-xs">
                        <label className="font-semibold text-gray-600 py-2">
                          Last Name <abbr title="required">*</abbr>
                        </label>
                        <input
                          placeholder="Last Name"
                          className="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                          required="required"
                          type="text"
                          name="last_name"
                          id="last_name"
                          defaultValue={profile.last_name}
                          {...register("last_name", {
                            required: {
                              value: true,
                              message: "Last name required",
                            },
                            maxLength: {
                              value: 24,
                              message:
                                "Last name should be maximum length of 24",
                            },
                          })}
                        />
                        {errors.last_name && (
                          <p className="text-red-600">
                            {errors.last_name.message}
                          </p>
                        )}
                      </div>
                    </div>
                    <div className="mb-3 space-y-2 w-full text-xs">
                      <label className=" font-semibold text-gray-600 py-2">
                        Email
                      </label>
                      <div className="flex flex-wrap items-stretch w-full mb-4 relative">
                        <div className="flex">
                          <span className="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              className="h-6 w-6"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                              ></path>
                            </svg>
                          </span>
                        </div>
                        <input
                          type="text"
                          className="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow"
                          placeholder="example@gmail.com"
                          defaultValue={profile.email}
                          disabled
                        />
                      </div>
                    </div>
                    <div className="mb-3 space-y-2 w-full text-xs">
                      <label className="font-semibold text-gray-600 py-2">
                        Birthday <abbr title="required">*</abbr>
                      </label>
                      <input
                        className="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                        required="required"
                        type="date"
                        name="dob"
                        id="dob"
                        defaultValue={profile.dob}
                        {...register("dob", {
                          required: {
                            value: true,
                            message: "Birthday required.",
                          },
                          validate: value =>
                            Date.parse(value) <= Date.now() ||
                            "Birthday Invailid.!",
                        })}
                      />
                      {errors.dob && (
                        <p className="text-red-600">{errors.dob.message}</p>
                      )}
                    </div>
                    <div className="md:flex md:flex-row md:space-x-4 w-full text-xs">
                      <div className="w-full flex flex-col mb-3">
                        <label className="font-semibold text-gray-600 py-2">
                          Phone
                        </label>
                        <input
                          placeholder="Phone"
                          className="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                          type="number"
                          name="phone"
                          id="phone"
                          defaultValue={profile.phone}
                          {...register("phone", {
                            required: {
                              value: true,
                              message: "Phone is required",
                            },
                            minLength: {
                              value: 8,
                              message: "Phone should be minimum length of 8",
                            },
                            maxLength: {
                              value: 15,
                              message: "Phone should be maximum length of 15",
                            },
                          })}
                        />
                        {errors.phone && (
                          <p className="text-red-600">{errors.phone.message}</p>
                        )}
                      </div>
                      <div className="w-full flex flex-col mb-3">
                        <label className="font-semibold text-gray-600 py-2">
                          Gender<abbr title="required">*</abbr>
                        </label>
                        <select
                          className="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                          required="required"
                          name="gender"
                          id="gender"
                          defaultValue={profile.gender}
                          {...register("gender", { required: true })}
                        >
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                          <option value="0">Orther</option>
                        </select>
                        {errors.gender && (
                          <p className="text-red-600">Gender required.</p>
                        )}
                      </div>
                    </div>
                    <div className="flex-auto w-full mb-1 text-xs space-y-2">
                      <label className="font-semibold text-gray-600 py-2">
                        Description
                      </label>
                      <textarea
                        required=""
                        name="message"
                        id=""
                        className="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                        placeholder="Enter your comapny info"
                        spellCheck="false"
                        defaultValue={profile.description}
                        {...register("description", {
                          required: {
                            value: false,
                          },
                          maxLength: {
                            value: 400,
                            message:
                              "Description should be maximum length of 400",
                          },
                        })}
                      ></textarea>
                      {errors.description && (
                        <p className="text-red-600">
                          {errors.description.message}
                        </p>
                      )}
                    </div>

                    <div className="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                      <button
                        className="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"
                        onClick={onHandleCancel}
                      >
                        {" "}
                        Cancel{" "}
                      </button>
                      <button
                        className="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500"
                        type="submit"
                      >
                        Save
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      ) : (
        <div></div>
      )}
      {/* Footer */}
      {/* <Footer></Footer> */}
    </>
  );
}

export default UpdateProfile;
