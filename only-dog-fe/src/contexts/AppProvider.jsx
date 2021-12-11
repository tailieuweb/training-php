import React, {
  memo,
  useState,
  createContext,
  useEffect,
  useContext,
} from "react";
import getData from "../helpers/fetchs/getData";
import getUserIdFromAccessToken from "../helpers/getUserIdFromAccessToken";
import { AuthContext } from "./AuthProvider";
//-----------------------------------------------------------
export default memo(function AppProvider({ children }) {
  const [showModalRegister, setShowModalRegister] = useState(false);
  const [showModalLogin, setShowModalLogin] = useState(false);
  const [showModalUpdateAvatar, setShowModalUpdateAvatar] = useState(false);
  const [showModalImage, setShowModalImage] = useState(false);
  const [stateUserIdProfile, setStateUserIdProfile] = useState("");
  const [stateObInfoUserCurrent, setStateObInfoUserCurrent] = useState({});
  const { stateAccessToken } = useContext(AuthContext);
  //-----------------------------------------------------------
  useEffect(() => {
    stateAccessToken &&
      getData(
        import.meta.env.VITE_ENDPOINT_FIND_USER_BY_ID +
          "/" +
          getUserIdFromAccessToken(stateAccessToken)
      )
        .then((res) => res.json())
        .then((data) => setStateObInfoUserCurrent(data.user));
    return () => {
      setStateObInfoUserCurrent({});
    };
  }, [stateAccessToken]);
  //-----------------------------------------------------------
  return (
    <AppContext.Provider
      value={{
        showModalRegister,
        setShowModalRegister,
        showModalLogin,
        setShowModalLogin,
        showModalUpdateAvatar,
        setShowModalUpdateAvatar,
        showModalImage,
        setShowModalImage,
        stateUserIdProfile,
        setStateUserIdProfile,
        stateObInfoUserCurrent,
      }}
    >
      {children}
    </AppContext.Provider>
  );
});
//--------------------------------------------------------------
export const AppContext = createContext();
