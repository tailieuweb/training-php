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
  getFeatureMemberRequest,
  postFilterRequest,
} from "../../redux/actions";
import ProfilePost from "../../components/ProiflePost";
import { useDispatch, useSelector } from "react-redux";
import * as moment from "moment";
// Constant
import routes from "../../constant/routes";
// Components
import Header from "../../components/Header";
import Footer from "../../components/Footer";
import FeatureMember from "../../components/FeatureMember";
import { useCookies } from "react-cookie";

function classNames(...classes) {
  return classes.filter(Boolean).join(" ");
}

export default function ProfilePage() {
  const [cookies, setCookie, removeCookie] = useCookies(["_token"]);
  let history = useHistory();

  const {
    register,
    handleSubmit,
    formState: { errors },
    watch,
  } = useForm();
  const [idDel, setIdDel] = useState();
  const [loadmore, setLoadmore] = useState(1);
  //
  const [dateFilter, setDateFilter] = useState(false);

  const dispatch = useDispatch();
  //
  const onHandleUpdate = () => {
    //Vào trang cập nhật profile
    history.push(routes.updateprofile);
    setLoadmore(1);
  };
  //
  const onHandleNewPost = () => {
    //Vào trang tạo bài viết
    history.push(routes.createpost);
    setLoadmore(1);
  };
  //
  const onHandleDelete = id => {
    dispatch(
      deletePostRequest({
        postID: id,
      })
    );
    setIdDel(id);
    setLoadmore(1);
  };
  //
  const onHandleLoadmore = () => {
    setLoadmore(loadmore + 1);
  };
  //
  const onFilterSubmit = FormData => {
    //
    dispatch(postFilterRequest(FormData));
    setLoadmore(1);
  };

  const onHandleFilter = e => {
    if (e.target.value === "date") {
      setDateFilter(true);
    } else {
      setDateFilter(false);
    }
  };
  //

  useEffect(() => {
    dispatch(getProfileRequest());
    dispatch(postFilterRequest());
    dispatch(getFeatureMemberRequest());
  }, []);
  useEffect(() => {
    dispatch(postFilterRequest());
  }, [idDel]);
  useEffect(() => {
    dispatch(
      postFilterRequest({
        load_more_number: loadmore,
      })
    );
  }, [loadmore]);
  const profile = useSelector(state => state.getProfileReducer.data);
  const listPost = useSelector(state => state.CRUDPostReducer.data);
  const listFeaturestUser = useSelector(
    state => state.getFeatureMemberReducer.data
  );

  if (profile) {
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
                              {profile.postTotal}
                            </span>
                            <span className="text-sm text-gray-500">Posts</span>
                          </div>
                          <div className="mr-4 p-3 text-center">
                            <span className="text-xl font-bold block uppercase tracking-wide text-gray-700">
                              {profile.starAvg + " "}
                              <i className="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <span className="text-sm text-gray-500">
                              Rating
                            </span>
                          </div>
                          <div className="lg:mr-4 p-3 text-center">
                            <span className="text-xl font-bold block uppercase tracking-wide text-gray-700">
                              {profile.commentTotal}
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
            <div className="grid-cols-6 grid-rows-1 gap-4 mx-auto max-w-full lg:grid my-7 px-10 ">
              <div className="col-span-1 mb-5 mx-5 lg:mx-1 ">
                <div className="bg-white shadow-md rounded-lg overflow-hidden mx-auto w-full p-5">
                  <h1 className="pb-1 pl-2 mt-2 text-lg font-bold text-left">
                    Filter{" "}
                  </h1>
                  <form onSubmit={handleSubmit(onFilterSubmit)}>
                    <label className="block text-grey-darker text-sm mb-1 mt-2">
                      <select
                        className="form-select block shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-grey-darker leading-tight"
                        {...register("order_by")}
                      >
                        <option value="ASC">Tăng</option>
                        <i className="fa fa-arrow-up" aria-hidden="true"></i>
                        <option value="DESC">Giảm</option>
                      </select>
                    </label>
                    <label className="block text-grey-darker text-sm mb-1 mt-2">
                      <select
                        className="form-select block shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-grey-darker leading-tight"
                        onChangeCapture={e => onHandleFilter(e)}
                        {...register("filter_by", { required: true })}
                      >
                        <option value="name">Name</option>
                        <option value="created_at">Created At</option>
                        <option value="date">Date</option>
                      </select>
                    </label>
                    {dateFilter && (
                      <input
                        className="form-select block shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-grey-darker leading-tight"
                        required="required"
                        type="date"
                        name="time"
                        id="time"
                        {...register("time")}
                      />
                    )}
                    <div className="flex justify-center mt-2">
                      <button className="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Filter
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div className="col-span-4">
                {listPost ? (
                  <div>
                    <div className="bg-gray-200   justify-center">
                      {/* Component Post*/}
                      <ProfilePost
                        postList={listPost.data}
                        profile={profile}
                        onHandleDelete={onHandleDelete}
                      ></ProfilePost>
                      {/* Component post */}
                    </div>
                  </div>
                ) : (
                  <div></div>
                )}
                {listPost &&
                  listPost.maxPage > loadmore &&
                  listPost.maxPage !== 0 && (
                    <div className="flex justify-center">
                      <button
                        className="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                        onClick={onHandleLoadmore}
                      >
                        Loadmore
                      </button>
                    </div>
                  )}
              </div>
              <div className="col-span-1">
                <h1 className="pb-1 pl-2 mt-2 text-lg font-bold text-left">
                  Thành Viên Nổi Bật{" "}
                </h1>
                <div className="flex flex-row overflow-auto lg:flex-col">
                  <FeatureMember listUser={listFeaturestUser} />
                </div>
              </div>
            </div>
          </main>
        )}

        {/* Footer */}
        {/* <Footer></Footer> */}
      </>
    );
  } else {
    return <div className="w-screen	h-screen"></div>;
  }
}
