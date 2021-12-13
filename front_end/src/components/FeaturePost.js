import React from "react";
import PropTypes from "prop-types";
import { Link } from "react-router-dom";
import env from "../env";

FeaturePost.propTypes = {
  image: PropTypes.string,
  description: PropTypes.string,
  name: PropTypes.string,
};

FeaturePost.defaul = {
  image: "",
  description: "",
  name: "",
};
/*
 * getFeaturePost

 * Call api lấy bài viết nổibat
Hiển thị ra giao diện
 */

function FeaturePost(props) {
  const { featurePost } = props;
  if (featurePost) {
    return (
      <>
        {featurePost.map((post) => (
          <div
            className="grid grid-flow-col grid-rows-2 gap-0 p-2 py-3 rounded-lg hover:bg-gray-200 lg:grid-cols-3 lg:grid-rows-1 items-center"
            key={post.id}
          >
            <div className="mr-3 h-24 w-36 sm:w-56 sm:h-36 lg:w-32 lg:h-24">
              <img
                className="h-24 rounded-lg w-36 sm:w-56 sm:h-36 lg:w-32 lg:h-24"
                src={env.URL_IMAGE + post.image}
              />
            </div>
            <div className="col-span-2 text-xs -pt-1 lg:ml-8 xl:ml-8 content-center">
              <div className="w-52">
                <Link to={`/detailpost/${post.id}`}>
                  <p className="font-sans font-bold whitespace-normal sm:text-sm lg:text-base overflow-hidden line-clamp-3 overflow-ellipsis">
                    {post.name}
                  </p>
                </Link>
              </div>
            </div>
          </div>
        ))}
      </>
    );
  } else {
    return <div>featurePost.error</div>;
  }
}

export default FeaturePost;
