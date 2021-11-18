//FEATUREPOST
export const FEATUREPOST_REQUEST = "FEATUREPOST_REQUEST";
export const FEATUREPOST_SUCCESS = "FEATUREPOST_SUCCESS";
export const FEATUREPOST_FAILURE = "FEATUREPOST_FAILURE";

export const featurepostRequest = (payload) => {
  return {
    type: FEATUREPOST_REQUEST,
    payload: payload,
  };
};

//get post by category
/* getPostByCategory
 * Call Call api tất cả bài viết theo category
 * Lấy tất cả bà viết
 */
export const GETPOSTBYCATEGORY_REQUEST = "GETPOSTBYCATEGORY_REQUEST";
export const GETPOSTBYCATEGORY_SUCCESS = "GETPOSTBYCATEGORY_SUCCESS";
export const GETPOSTBYCATEGORY_FAILURE = "GETPOSTBYCATEGORY_FAILURE";

export const getPostByCategoryRequest = (payload) => {
  return {
    type: GETPOSTBYCATEGORY_REQUEST,
    payload: payload,
  };
};
//get category
//GET  CATEGORIES
/* GET aLL  CATEGORIES
 * Call Call api tất cả category
 */
export const GETCATEGORIES_REQUEST = "GETCATEGORIES_REQUEST";
export const GETCATEGORIES_SUCCESS = "GETCATEGORIES_SUCCESS";
export const GETCATEGORIES_FAILURE = "GETCATEGORIES_FAILURE";

export const getCategoriesRequest = (payload) => {
  return {
    type: GETCATEGORIES_REQUEST,
    payload: payload,
  };
};

/*
 /*
 * getFeaturePost

 * Call api lấy bài viết nổibat
 */
export const GETFEATUREPOST_REQUEST = "GETFEATUREPOST_REQUEST";
export const GETFEATUREPOST_SUCCESS = "GETFEATUREPOST_SUCCESS";
export const GETFEATUREPOST_FAILURE = "GETFEATUREPOST_FAILURE";

export const getFeaturePostRequest = (payload) => {
  return {
    type: GETFEATUREPOST_REQUEST,
    payload: payload,
  };
};

//detail póst
/* GET detailPost
 *   Call api lấy chi tiết bài viết
 */
export const GETDETAILPOST_REQUEST = "GETDETAILPOST_REQUEST";
export const GETDETAILPOST_SUCCESS = "GETDETAILPOST_SUCCESS";
export const GETDETAILPOST_FAILURE = "GETDETAILPOST_FAILURE";

export const getDetailPostRequest = (payload) => {
  return {
    type: GETDETAILPOST_REQUEST,
    payload: payload,
  };
};
