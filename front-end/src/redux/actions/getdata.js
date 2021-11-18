//GET ALL CATEGORIE
export const GET_ALL_CATEGORIE_REQUEST = "GET_ALL_CATEGORIE_REQUEST";
export const GET_ALL_CATEGORIE_SUCCESS = "GET_ALL_CATEGORIE_SUCCESS";
export const GET_ALL_CATEGORIE_FAILURE = "GET_ALL_CATEGORIE_FAILURE";

export const getAllCategorieRequest = payload => {
  return {
    type: GET_ALL_CATEGORIE_REQUEST,
    payload: payload,
  };
};
