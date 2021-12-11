import React from "react";
import { Spinner } from "react-bootstrap";
//---------------------------------------------
export default function SpinnerBootstrap() {
  return (
    <div className="text-center">
      <Spinner animation="border" role="status" />
    </div>
  );
}
