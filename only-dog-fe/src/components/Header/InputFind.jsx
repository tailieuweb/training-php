import React, { memo } from "react";
import { FiSearch } from "react-icons/fi";
import { Link } from "react-router-dom";
//--------------------------------------------------
export default memo(function InputFind({ find, setFind }) {
  //--------------------------------------------------
  return (
    <div
      className="d-flex justify-content-center my-3"
      style={{ width: "100%" }}
    >
      <div className="d-flex">
        <input
          className="form-control me-2 p-1 bg-light border-0"
          placeholder="Find user"
          onChange={(e) => setFind(e.target.value)}
          value={find}
        />
        <Link to={"/find?user_name=" + find}>
          <div
            role="button"
            className="bg-light rounded pt-1 pb-2 px-3 text-muted"
          >
            <FiSearch size={20} />
          </div>
        </Link>
      </div>
    </div>
  );
});
