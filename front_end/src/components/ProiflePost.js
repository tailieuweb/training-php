import React, { Fragment, useState, useEffect } from "react";
import PropTypes from "prop-types";
import { Link } from "react-router-dom";
import { Disclosure, Menu, Transition } from "@headlessui/react";
import * as moment from "moment";
import routes from "../constant/routes";
import env from "../env";
function classNames(...classes) {
  return classes.filter(Boolean).join(" ");
}
function ProfilePost(props) {
  const { postList, profile } = props;
  console.log("POST LIST: ", postList);
  //
  const onHandleDelete = id => {
    props.onHandleDelete(id);
  };
  if (postList) {
    return (
      <>
        {postList.map(post => (
          <div>
            <div
              className="flex w-full bg-white shadow-md rounded-lg overflow-hidden mx-auto  mb-5"
              key={post.id}
            >
              <div className="flex items-center w-full">
                <div className="w-full">
                  <div className="flex flex-row mt-2 px-2 py-3 mx-3 justify-between">
                    <div className="flex flex-row ">
                      <div className="w-auto h-auto rounded-full border-2 border-pink-500">
                        <img
                          className="w-12 h-12 object-cover rounded-full shadow cursor-pointer"
                          alt="User avatar"
                          src={profile.avatar}
                        />
                      </div>
                      <div className="flex flex-col mb-2 ml-4 mt-1">
                        <div className="text-gray-600 text-sm font-semibold">
                          {profile.first_name + " " + profile.last_name}
                        </div>
                        <div className="flex w-full mt-1">
                          <div className="text-blue-700 font-base text-xs mr-1 cursor-pointer">
                            {post.status}
                          </div>
                          <div className="text-gray-400 font-thin text-xs">
                            • {moment(post.created_at).format("DD/MM/YYYY")}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <Menu
                        as="div"
                        className="relative inline-block text-left"
                      >
                        <div>
                          <Menu.Button className="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                            Options
                          </Menu.Button>
                        </div>

                        <Transition
                          as={Fragment}
                          enter="transition ease-out duration-100"
                          enterFrom="transform opacity-0 scale-95"
                          enterTo="transform opacity-100 scale-100"
                          leave="transition ease-in duration-75"
                          leaveFrom="transform opacity-100 scale-100"
                          leaveTo="transform opacity-0 scale-95"
                        >
                          <Menu.Items className="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div className="py-1">
                              {post.status !== "pending" && (
                                <Menu.Item>
                                  {({ active }) => (
                                    <Link
                                      to={`/detailpost/${post.id}`}
                                      className={classNames(
                                        active
                                          ? "bg-gray-100 text-gray-900"
                                          : "text-gray-700",
                                        "block px-4 py-2 text-sm"
                                      )}
                                    >
                                      View
                                    </Link>
                                  )}
                                </Menu.Item>
                              )}

                              <Menu.Item>
                                {({ active }) => (
                                  <a
                                    href={routes.updatepost + post.id}
                                    //to={routes.updatepost + post.id}
                                    className={classNames(
                                      active
                                        ? "bg-gray-100 text-gray-900"
                                        : "text-gray-700",
                                      "block px-4 py-2 text-sm"
                                    )}
                                  >
                                    Update
                                  </a>
                                )}
                              </Menu.Item>
                              <Menu.Item
                                onClick={() => onHandleDelete(post.id)}
                              >
                                {({ active }) => (
                                  <p
                                    className={classNames(
                                      active
                                        ? "bg-gray-100 text-gray-900"
                                        : "text-gray-700",
                                      "block px-4 py-2 text-sm"
                                    )}
                                  >
                                    Delete
                                  </p>
                                )}
                              </Menu.Item>
                            </div>
                          </Menu.Items>
                        </Transition>
                      </Menu>
                    </div>
                  </div>
                  <div className="border-b border-gray-100"></div>
                  <div className="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2 ">
                    <img
                      className="w-screen "
                      src={env.URL_IMAGE + post.image}
                    />{" "}
                  </div>
                  <Link
                    className="text-gray-600 font-semibold text-lg mb-2 mx-3 px-2"
                    to={`/detailpost/${post.id}`}
                  >
                    {post.name}
                  </Link>
                  <div
                    className="text-gray-500 font-thin text-sm mb-6 mx-3 px-2 "
                    dangerouslySetInnerHTML={{
                      __html: post.content.substr(0, 500),
                    }}
                  ></div>
                  {post.status !== "pending" && (
                    <Link
                      className="text-gray-600 font-semibold text-lg mb-2 mx-3 px-2"
                      to={`/detailpost/${post.id}`}
                    >
                      ...xem thêm
                    </Link>
                  )}

                  <div className="flex w-full border-t border-gray-100">
                    <div className="mt-3 mx-5 flex flex-row">
                      <div className="flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center">
                        Comments:
                        <div className="ml-1 text-gray-400 font-thin text-ms">
                          {" "}
                          {post.commentTotal}
                        </div>
                      </div>
                      <div className="flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center">
                        Views:{" "}
                        <div className="ml-1 text-gray-400 font-thin text-ms">
                          {" "}
                          {post.views}
                        </div>
                      </div>
                    </div>
                    <div className="mt-3 mx-5 w-full flex justify-end">
                      <div className="flex text-gray-700 font-normal text-sm rounded-md mb-2 mr-4 items-center">
                        Rating:{" "}
                        <div className="ml-1 text-gray-400 font-thin text-ms">
                          {" "}
                          {post.starAverage + " "}
                          <i className="fa fa-star" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ))}
      </>
    );
  } else {
    return <div></div>;
  }
}

export default ProfilePost;
