import React, { memo, useState, useEffect, useContext } from "react";
import SpinnerBootstrap from "../../../components/SpinnerBootstrap";
import { AuthContext } from "../../../contexts/AuthProvider";
import getData from "../../../helpers/fetchs/getData";
import getUserIdFromAccessToken from "../../../helpers/getUserIdFromAccessToken";
import Suggestion from "./Suggestion";
import sortDescendingBasedOnFollowers from "../../../helpers/sortDescendingBasedOnFollowers";
//--------------------------------------------------
export default memo(function Suggestions({ openModal, setOpenModal }) {
  //--------------------------------------------------
  const [stateUsers, setStateUsers] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  const { stateAccessToken } = useContext(AuthContext);
  //--------------------------------------------------
  useEffect(() => {
    stateAccessToken
      ? getData(import.meta.env.VITE_ENDPOINT_GET_ALL_USER)
          .then((res) => res.json())
          .then((data) => {
            //get user id current
            const strUserId = getUserIdFromAccessToken(stateAccessToken);
            const obUserCurrent = data.users.find(
              (val) => val._id === strUserId
            );
            const arrUserFollow = data.users.filter(
              (val) =>
                !obUserCurrent.followings.includes(val._id) &&
                strUserId !== val._id
            );
            setStateUsers(sortDescendingBasedOnFollowers(arrUserFollow));
            setIsLoading(false);
          })
          .catch((err) => console.log(err))
      : getData(import.meta.env.VITE_ENDPOINT_GET_ALL_USER)
          .then((res) => res.json())
          .then((data) => {
            setStateUsers(sortDescendingBasedOnFollowers(data.users));
            setIsLoading(false);
          })
          .catch((err) => console.log(err));
  }, []);
  //--------------------------------------------------
  return isLoading ? (
    <SpinnerBootstrap />
  ) : (
    <div className="container mt-4">
      <div className="row">
        {stateUsers?.slice(0, 6).map((val) => (
          <Suggestion
            key={val._id}
            userName={val.userName}
            userId={val._id}
            pathAvatar={val.pathAvatar}
            openModal={openModal}
            setOpenModal={setOpenModal}
          />
        ))}
      </div>
    </div>
  );
});
