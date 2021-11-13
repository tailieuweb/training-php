import { START_LOADING, STOP_LOADING } from "../actions/commonActions";

const commonReducer = (state = { loading: false }, action) => {
  switch (action.type) {
    case START_LOADING:
      return { ...state, loading: true };
    case STOP_LOADING:
      return { ...state, loading: false };
    default:
      return { ...state };
  }
};

export default commonReducer;
