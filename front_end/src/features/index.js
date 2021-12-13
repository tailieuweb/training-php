//Packages
import React from "react";
import { Switch, Route } from "react-router-dom";
//Constant
import route from "../constant/routes";
//Page
import homepage from "./Homepage/HomePage";
import ProfilePage from "./ProfilePage/ProfilePage";
import CreatePost from "./CreatePost/CreatePost";
import Login from "./Login/Login";
import Register from "./Register/Register";
import Pass from "./Pass/Pass";
import ResetPass from "./ResetPass/ResetPass";
import UpdateProfile from "./UpdateProfilePage/UpdateProfilePage";
import detailpost from "./DetalPost/DetailPost";
import ChangePassword from "./ChangePassword/ChangePassword";
import UpdatePost from "./UpdatePost/UpdatePost";
import NotFoundPage from "./NotFoundPage/NotFoundPage";
export default (
  <Switch>
    <Route exact path={route.homepage} component={homepage} />
    {/* FEATURE VIEW PROFILE */}
    <Route exact path={route.profile} component={ProfilePage} />
    <Route exact path={route.createpost} component={CreatePost} />
    <Route exact path={route.homepage} component={homepage} />
    <Route exact path={route.login} component={Login} />
    <Route exact path={route.register} component={Register} />
    <Route exact path={route.Pass} component={Pass} />
    <Route exact path={route.Resetpass} component={ResetPass} />
    <Route exact path={route.updateprofile} component={UpdateProfile} />
    <Route exact path={route.detailpost} component={detailpost} />
    <Route exact path={route.changepassword} component={ChangePassword} />
    <Route exact path={route.updatepost + ":id"} component={UpdatePost} />
    <Route path="*" component={NotFoundPage} />
  </Switch>
);
