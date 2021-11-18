// FEATURE VIEW PROFILE
// Packages
import { Link, Redirect, useHistory } from "react-router-dom";
import React, { Fragment, useState, useEffect } from "react";
import { useForm } from "react-hook-form";
import { Disclosure, Menu, Transition } from "@headlessui/react";
import env from "../../env";
import {
  getProfileRequest,
  getListPostByUserRequest,
  deletePostRequest,
} from "../../redux/actions";
import ProfilePost from "../../components/ProiflePost";
import { useDispatch, useSelector } from "react-redux";
import * as moment from "moment";
// Constant
import routes from "../../constant/routes";
// Components
import Header from "../../components/Header";
import Footer from "../../components/Footer";

function classNames(...classes) {
  return classes.filter(Boolean).join(" ");
}

export default function ProfilePage() {
  const {
    register,
    handleSubmit,
    formState: { errors },
    watch,
  } = useForm();
  const [idDel, setIdDel] = useState();
  let history = useHistory();
  const dispatch = useDispatch();
  //
  const onHandleUpdate = () => {
    //Vào trang cập nhật profile
    history.push(routes.updateprofile);
  };
  //
  const onHandleNewPost = () => {
    //Vào trang tạo bài viết
    history.push(routes.createpost);
  };
  //
  const onHandleDelete = id => {
    dispatch(
      deletePostRequest({
        postID: id,
      })
    );
    setIdDel(id);
  };
  //
  useEffect(() => {
    dispatch(getProfileRequest());
    dispatch(getListPostByUserRequest());
  }, []);
  useEffect(() => {
    dispatch(getListPostByUserRequest());
  }, [idDel]);
  const profile = useSelector(state => state.getProfileReducer.data);
  const listPost = useSelector(state => state.CRUDPostReducer.data);

  return (
    <>
      {/* Header */}
      <Header></Header>
      {/* Profile */}
      {profile && (
        <main className="profile-page bg-gray-200 pb-5">
          <section className="relative block" style={{ height: "500px" }}>
            <div
              className="absolute top-0 w-full h-full bg-center bg-cover"
              style={{
                backgroundImage:
                  "url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2710&q=80')",
              }}
            >
              <span
                id="blackOverlay"
                className="w-full h-full absolute "
              ></span>
            </div>
            <div
              className="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
              style={{ height: "70px" }}
            >
              <svg
                className="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
              >
                <polygon
                  className="text-gray-300 fill-current"
                  points="2560 0 2560 100 0 100"
                ></polygon>
              </svg>
            </div>
          </section>
          <></>
          <section className="relative pt-16  bg-gray-200">
            <div className="container mx-auto px-4">
              <div className="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                <div className="px-6">
                  <div className="flex flex-wrap justify-center">
                    <div className="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                      <div className="relative">
                        <img
                          alt="..."
                          src={(profile.avatar && profile.avatar) || ""}
                          className="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                          style={{ maxWidth: "150px" }}
                        />
                      </div>
                    </div>
                    <div className="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                      <div className="py-6 px-3 mt-32 sm:mt-0">
                        <button
                          className="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1"
                          type="button"
                          style={{ transition: "all .15s ease" }}
                          onClick={onHandleUpdate}
                        >
                          Update
                        </button>
                        <button
                          className="bg-green-500 active:bg-green-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1"
                          type="button"
                          style={{ transition: "all .15s ease" }}
                          onClick={onHandleNewPost}
                        >
                          New post
                        </button>
                      </div>
                    </div>
                    <div className="w-full lg:w-4/12 px-4 lg:order-1">
                      <div className="flex justify-center py-4 lg:pt-4 pt-8">
                        <div className="mr-4 p-3 text-center">
                          <span className="text-xl font-bold block uppercase tracking-wide text-gray-700">
                            100
                          </span>
                          <span className="text-sm text-gray-500">Posts</span>
                        </div>
                        <div className="mr-4 p-3 text-center">
                          <span className="text-xl font-bold block uppercase tracking-wide text-gray-700">
                            4.5
                            <i className="fa fa-star" aria-hidden="true"></i>
                          </span>
                          <span className="text-sm text-gray-500">Rating</span>
                        </div>
                        <div className="lg:mr-4 p-3 text-center">
                          <span className="text-xl font-bold block uppercase tracking-wide text-gray-700">
                            89
                          </span>
                          <span className="text-sm text-gray-500">
                            Comments
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="text-center mt-12">
                    <h3 className="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2">
                      {profile.first_name + " " + profile.last_name}
                    </h3>
                    <div className="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase">
                      ({profile.gender === "1" && "Male"}
                      {profile.gender === "2" && "Female"}
                      {profile.gender === "0" && "Orther"})
                    </div>
                    <div className="mb-2 text-gray-700 mt-10">
                      <i className="fa fa-phone-square mr-2 text-lg text-gray-500"></i>
                      {(profile.phone && profile.phone) || "Unknow"}
                    </div>
                  </div>
                  <div className="mt-10 py-10 border-t border-gray-300 text-center">
                    <div className="flex flex-wrap justify-center">
                      <div className="w-full lg:w-9/12 px-4">
                        <p className="mb-4 text-lg leading-relaxed text-gray-800">
                          {(profile.description && profile.description) ||
                            "Unknow"}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div className="grid-cols-6 grid-rows-1 gap-4 mx-auto max-w-6xl lg:grid my-7 px-10 ">
            <div className="col-span-6">
              {listPost ? (
                <div>
                  <div className="bg-gray-200   justify-center">
                    {/* Component Post*/}
                    <ProfilePost
                      postList={listPost}
                      profile={profile}
                      onHandleDelete={onHandleDelete}
                    ></ProfilePost>
                    {/* Component post */}
                  </div>
                </div>
              ) : (
                <div></div>
              )}
              <div className="flex justify-center">
                <button className="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                  Loadmore
                </button>
              </div>
            </div>
          </div>
        </main>
      )}

      {/* Footer */}
      {/* <Footer></Footer> */}
    </>
  );
}
