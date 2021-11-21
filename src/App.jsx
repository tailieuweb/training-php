import React from "react";
import "./App.css";
import { Switch, Route } from "react-router-dom";
import { Home } from "./components/Home/Home";
import { Person } from "./components/Person/Person";
import { DiscoverDetail } from "./components/DetailTV/DiscoverDetail";
//TV
import { Discover } from "./components/TV/Discover";
import {MovieDetail} from "./components/DetailMovie/MovieDetail";
import Search from "./components/Search/Search";
import { Treding } from "./components/Treding/Treding";
import { Dashboard } from "./components/Dashboard/Dashboard";
import { EditUser } from "./components/Dashboard/EditUser";
import { Keyword } from "./components/DetailMovie/Keyword";
import { Seasons } from "./components/Session/Seasons";
import { Sessions_Episode } from "./components/Session-episode/sesions-episode";
import { Episode } from "./components/Episodes/Episode";
import { Register } from "./components/Account/Register"
import { Logout }  from "./components/Account/Logout";
import { Login }  from "./components/Account/Login";
import { Profile } from "./components/Profile/Profiles";
import { Profiles } from "./components/Person/Proflie";

export function App() {
  return (
    
    <main>
      <Switch>
        <Route path="/" component={Home} exact />
        <Route path="/discover/tv" component={Discover} />
        <Route path="/login" component={Login} exact />
        <Route path="/tredding" component={Treding} exact />
       	<Route path="/search" component={Search} exact />
        <Route path="/session/:id/seasons" component={Seasons} exact/>
        <Route path="/movie/:id" component={MovieDetail} />
        <Route path="/keyword/:keyword_id/movie" component={Keyword} />

        <Route path="/tv/:id" component={DiscoverDetail} exact />
        <Route path="/tv/:id/sesson" component={Seasons} exact />
        <Route path="/tv/:id/season/:season_number" component={Sessions_Episode} exact />
        <Route path="/tv/:id/season/:season_number/episode/:episode_number" component={Episode} exact />

        <Route path="/person/:id" component={Person} />
        <Route path="/persons/:id/images/profiles" component={Profiles} />

        <Route path="/register" component={Register} exact />
        <Route path="/logout" component={Logout} exact />
        <Route path="/profile" component={Profile} exact /> 
        <Route path="/dashboard" component={Dashboard} exact/>
        <Route path="/edit/:id" component={EditUser} exact/>
      </Switch>
    </main>
  );
}

export default App;