import React, { memo } from "react";
import Actions from "./Actions/Actions";
import Header from "./Header";
import Image from "./Image";
//--------------------------------------------------
export default memo(function Post({ dataPost }) {
  //--------------------------------------------------
  return (
    <div className="col-sm-6 col-lg-4 mb-4">
      <Header dataPost={dataPost} />
      <Image dataPost={dataPost} />
      <Actions dataPost={dataPost} />
    </div>
  );
});
