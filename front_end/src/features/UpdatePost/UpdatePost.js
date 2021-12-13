import React, { useState, useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import ReactQuill, { Quill } from "react-quill";
import "react-quill/dist/quill.snow.css";
import Header from "../../components/Header";
import { useHistory } from "react-router";
import routes from "../../constant/routes";
import { set, useForm } from "react-hook-form";
import env from "../../env";
import {
  getAllCategorieRequest,
  getDetailPostRequest,
  updatePostRequest,
} from "../../redux/actions";
import Cookies from "universal-cookie";

function UpdatePost(props) {
  let cookie = new Cookies();
  let dispatch = useDispatch();
  const [cover, setCover] = useState("");
  const [changeCover, setChangeCover] = useState(false);
  let history = useHistory();
  const {
    register,
    handleSubmit,
    formState: { errors },
    setError,
    setValue,
    watch,
  } = useForm();
  const allCategorie = useSelector(state => state.getAllCategorieReducer.data);
  const postData = useSelector(state => state.getDetailPostReducer.data);
  const modulesQill = {
    toolbar: [
      [{ header: "1" }, { header: "2" }, { font: [] }],
      [{ size: [] }],
      ["bold", "italic", "underline", "strike", "blockquote"],
      [
        { list: "ordered" },
        { list: "bullet" },
        { indent: "-1" },
        { indent: "+1" },
      ],
      ["link", "image", "video"],
      ["clean"],
    ],
    clipboard: {
      matchVisual: false,
    },
    history: {
      delay: 1000,
      maxStack: 50,
      userOnly: false,
    },
  };
  //
  useEffect(() => {
    dispatch(getAllCategorieRequest());
  }, []);
  useEffect(() => {
    dispatch(
      getDetailPostRequest({
        postID: props.match.params.id,
      })
    );
  }, [props.match.params.id]);
  useEffect(() => {
    register("content", {
      minLength: {
        value: 100,
        message: "Content should be minimum length of 100",
      },
    });
  }, [register]);

  const onEditorStateChange = editorState => {
    setValue("content", editorState);
  };
  const editorContent = watch("content");
  //
  const formats = [
    "header",
    "font",
    "size",
    "bold",
    "italic",
    "underline",
    "strike",
    "blockquote",
    "list",
    "bullet",
    "indent",
    "link",
    "image",
    "video",
  ];
  //
  const onHandleCancel = () => {
    history.push(routes.profile);
  };

  //
  const onImageStateChange = e => {
    if (e.target.files[0]) {
      console.log("FILE:", e.target.files[0].type);
      if (
        e.target.files[0].type !== "image/png" &&
        e.target.files[0].type !== "image/jpeg"
      ) {
        setChangeCover(true);
        setValue("image", null);
      } else {
        setValue("image", e.target.files[0]);
        setChangeCover(true);
      }
    }
  };
  //

  const image = watch("image");
  //Submit Form
  const onSubmitForm = formData => {
    if (!image) {
      setValue("image", null);
    }

    console.log("FORM DATA: ", formData);

    dispatch(updatePostRequest(formData));
  };

  console.log("postData: ", postData);
  //
  if (!cookie.get("_token")) {
    history.push(routes.home);
  }

  if (postData) {
    return (
      <>
        <Header></Header>
        {postData && (
          <div className="py-12">
            <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
              <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div className="p-6 bg-white border-b border-gray-200">
                  <h1 className="pb-10 text-4xl font-bold">Update Post</h1>
                  <form onSubmit={handleSubmit(onSubmitForm)}>
                    <div className="flex flex-col w-full mb-3">
                      <input
                        className="hidden"
                        name="postID"
                        defaultValue={postData.id}
                        {...register("postID")}
                      ></input>
                      <label className="py-2 text-xl font-semibold text-gray-600">
                        Category <span className="text-red-500">*</span>
                      </label>
                      <select
                        className="block w-full h-10 px-4 border-2 rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter md:w-full "
                        required="required"
                        name="categoriesId"
                        id="categoriesId"
                        defaultValue={postData.listCateId}
                        {...register("categoriesId", { required: true })}
                      >
                        {allCategorie ? (
                          allCategorie.map(cate => (
                            <option value={cate.id} key={cate.id}>
                              {cate.name}
                            </option>
                          ))
                        ) : (
                          <option></option>
                        )}
                      </select>
                    </div>
                    <div className="mb-4">
                      <label className="py-2 text-xl font-semibold text-gray-600">
                        Name <span className="text-red-500">*</span>
                      </label>{" "}
                      <br></br>
                      <input
                        type="text"
                        className="block w-full h-10 px-4 border-2 rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter md:w-full"
                        name="name"
                        id="name"
                        defaultValue={postData.name}
                        placeholder="Name..."
                        {...register("name", {
                          required: {
                            value: true,
                            message: "Name required.",
                          },
                          maxLength: {
                            value: 100,
                            message: "Name should be maximum length of 100",
                          },
                        })}
                      />
                      {errors.name && (
                        <p className="text-red-600">{errors.name.message}</p>
                      )}
                    </div>

                    <div className="mb-4">
                      <label className="py-2 text-xl font-semibold text-gray-600">
                        Description <span className="text-red-500">*</span>
                      </label>{" "}
                      <br></br>
                      <input
                        type="text"
                        className="block w-full h-10 px-4 border-2 rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter md:w-full"
                        name="description"
                        id="description"
                        defaultValue={postData.description}
                        placeholder="Description..."
                        {...register("description", {
                          required: {
                            value: true,
                            message: "Description required.",
                          },
                          maxLength: {
                            value: 200,
                            message:
                              "Description should be maximum length of 200",
                          },
                        })}
                      />
                      {errors.description && (
                        <p className="text-red-600">
                          {errors.description.message}
                        </p>
                      )}
                    </div>

                    <div className="mb-3 md:space-y-2">
                      <label className="py-2 text-xl font-semibold text-gray-600">
                        Cover image <span className="text-red-500">*</span>
                        <abbr className="hidden" title="required">
                          *
                        </abbr>
                      </label>
                      <div className="flex items-center py-6">
                        <div className="flex-none w-3/12 mr-4 overflow-hidden h-3/12 rounded-xl ">
                          <img
                            className="object-cover w-full h-full mr-4"
                            src={cover ? cover : env.URL_IMAGE + postData.image}
                            alt="Cover image upload"
                          />
                        </div>
                        <label className="cursor-pointer ">
                          <span className="px-4 py-2 text-sm text-white bg-green-400 rounded-full focus:outline-none hover:bg-green-500 hover:shadow-lg">
                            Browse
                          </span>
                          <input
                            type="file"
                            className="hidden"
                            name="image"
                            id="image"
                            onInputCapture={e => {
                              if (e.target.files[0]) {
                                if (
                                  e.target.files[0].type === "image/png" ||
                                  e.target.files[0].type === "image/jpeg"
                                ) {
                                  let reader = new FileReader();
                                  let file = e.target.files[0];
                                  if (file) {
                                    setChangeCover(true);
                                    reader.readAsDataURL(e.target.files[0]);
                                    reader.onload = e => {
                                      setCover(e.target.result);
                                    };
                                  }
                                } else {
                                  setError("image", {
                                    message: "TYPE INVAILID",
                                  });
                                  setCover("");
                                  setValue("image", null);
                                  {
                                    register("image", null);
                                  }
                                }
                              }
                            }}
                            onChange={e => {
                              onImageStateChange(e);
                            }}
                          />
                        </label>
                      </div>
                      {errors.image && (
                        <p className="text-red-600">{errors.image.message}</p>
                      )}
                    </div>

                    <div className="mb-8">
                      <label className="py-2 text-xl font-semibold text-gray-600">
                        Content <span className="text-red-500">*</span>
                      </label>{" "}
                      <br></br>
                      <ReactQuill
                        theme="snow"
                        placeholder="Content..."
                        name="content"
                        defaultValue={postData.content}
                        onChange={onEditorStateChange}
                        modules={modulesQill}
                        formats={formats}
                        style={{ height: "300px" }}
                      />
                    </div>
                    {errors.content && (
                      <p className="mt-24 text-red-600 sm:mt-12">
                        {errors.content.message}
                      </p>
                    )}

                    <div className="flex p-1 mt-28 sm:mt-2">
                      <button
                        className="px-10 py-4 mt-10 mr-2 text-white bg-red-500 hover:bg-blue-400"
                        onClick={onHandleCancel}
                      >
                        Cancel
                      </button>
                      <button
                        type="submit"
                        className="px-10 py-4 mt-10 text-white bg-blue-500 hover:bg-blue-400"
                      >
                        Submit
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        )}
      </>
    );
  } else {
    return (
      <div className="flex justify-center items-center flex-center w-full h-full bg-white opacity-75 fixed">
        <div className="animate-spin rounded-full h-40 w-40 border-t-4 border-b-4 border-purple-500"></div>
      </div>
    );
  }
}

export default UpdatePost;
