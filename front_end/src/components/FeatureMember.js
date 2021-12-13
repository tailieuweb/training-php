import React from "react";
import PropTypes from "prop-types";
import { Link } from "react-router-dom";
import env from "../env";

FeatureMember.propTypes = {
  first_name: PropTypes.string,
  last_name: PropTypes.string,
  avatar_id: PropTypes.string,
};

FeatureMember.defaultProps = {
  first_name: "",
  last_name: "",
  avatar_id: "",
};

function FeatureMember(props) {
  const { listUser } = props;

  if (listUser) {
    return (
      <>
        {listUser.map((user) => (
          <div
            className="flex flex-col p-2 pt-3 rounded-lg lg:flex-row hover:bg-gray-200"
            key={user.id}
          >
            <div className="w-24 sm:w-46 lg:col-span-1 ">
              <img className="w-20 h-20 rounded-lg" src={user.avatar} />
            </div>
            {/* <Link to={ }> */}
            <span className="pt-1 overflow-y-auto font-sans text-xs font-bold whitespace-normal lg:text-base sm:text-sm lg:mt-6">
              {user.first_name + " " + user.last_name}
            </span>
            {/* </Link> */}
          </div>
        ))}
      </>
    );
  } else {
    return <div></div>;
  }
}
export default FeatureMember;
