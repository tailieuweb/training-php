//Action Types
export const START_LOADING = "START_LOADING";
export const STOP_LOADING = "STOP_LOADING";

//Action Creator
export const startLoading = () => ({
  type: START_LOADING,
});

export const stopLoading = () => ({
  type: STOP_LOADING,
});
