import bcrypt from "bcrypt";
import dotenv from "dotenv";
import express from "express";
import jwt from "jsonwebtoken";
import { redisClient } from "../connects/connectToRedis.js";
import serverError from "../errors/serverError.js";
import User from "../models/User.js";
import validateEmail from "../validate/validateEmail.js";
import validatePassword from "../validate/validatePassword.js";
import validateUserName from "../validate/validateUserName.js";
//--------------------------------------------------------------
dotenv.config();
const saltRounds = 10;
const router = express.Router();
let refreshTokens = [];
const key = "refreshToken";
//--------------------------------------------------------------
router.delete("/remove_all_refresh_token", (req, res) => {
  try {
    res
      .status(200)
      .json({ success: true, message: "Remove all refresh token success" });
    redisClient.get(key, (err, data) => {
      if (err) return;
      if (data) {
        redisClient.set(key, JSON.stringify([]));
      }
    });
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
//--------------------------------------------------------------
router.delete("/remove_refresh_token", (req, res) => {
  try {
    const refreshToken = req.headers.authorization.split(" ")[1];
    res
      .status(200)
      .json({ success: true, message: "Remove refresh token success" });
    redisClient.get(key, (err, data) => {
      if (err) return;
      if (data) {
        refreshTokens = JSON.parse(data).filter(
          (refToken) => refToken !== refreshToken
        );
        // console.log("~ refreshTokens", refreshTokens);
        redisClient.set(key, JSON.stringify(refreshTokens));
      }
    });
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
//--------------------------------------------------------------
router.put("/refresh_access_token", (req, res) => {
  try {
    const refreshToken = req.headers.authorization.split(" ")[1];
    if (!refreshToken)
      return res.status(401).json({ success: false, message: "Unauthorized" });
    if (!refreshTokens.includes(refreshToken))
      return res
        .status(403)
        .json({ success: false, message: "Invalid Refresh Token" });
    jwt.verify(refreshToken, process.env.REFRESH_TOKEN_SECRET, (err, data) => {
      if (err)
        return res.status(403).json({ success: false, message: "Forbidden" });
      const accessToken = jwt.sign(
        { userName: data.userName },
        process.env.ACCESS_TOKEN_SECRET,
        {
          expiresIn: "5m",
        }
      );
      res.status(200).json({ success: true, accessToken });
    });
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
router.post("/register", async (req, res) => {
  try {
    const { userName, email, password } = req.body;
    if (
      !validateUserName(userName) ||
      !validateEmail(email) ||
      !validatePassword(password)
    )
      return res.status(400).json({
        success: false,
        message: "Invalid User Name and/or Password",
      });
    const userOrEmail = await User.findOne({ $or: [{ userName }, { email }] });
    if (userOrEmail)
      return res
        .status(400)
        .json({ success: false, message: "User Name or Email already taken" });
    //---------------------------------
    const hashedPassword = bcrypt.hashSync(password, saltRounds);
    const newUser = new User({ userName, email, password: hashedPassword });
    const accessToken = jwt.sign(
      { userId: newUser._id },
      process.env.ACCESS_TOKEN_SECRET,
      { expiresIn: "5m" }
    );
    const refreshToken = jwt.sign(
      { userId: newUser._id },
      process.env.REFRESH_TOKEN_SECRET,
      { expiresIn: "5m" }
    );
    res.json({
      success: true,
      accessToken,
      refreshToken,
    });
    redisClient.get(key, (err, data) => {
      if (err) return;
      if (data) {
        refreshTokens = JSON.parse(data);
        refreshTokens.push(refreshToken);
        console.log("~ refreshTokens", refreshTokens);
        redisClient.set(key, JSON.stringify(refreshTokens));
      }
    });
    await newUser.save();
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
//--------------------------------------------------------------
router.post("/login", async (req, res) => {
  try {
    const { email, password } = req.body;
    if (!validateEmail(email) || !validatePassword(password))
      return res.status(400).json({
        success: false,
        message: "Invalid email and/or password",
      });
    const user = await User.findOne({ email });
    if (!user)
      return res
        .status(400)
        .json({ success: false, message: "Not found Email" });
    const passwordValid = bcrypt.compareSync(password, user.password);
    if (!passwordValid)
      return res
        .status(400)
        .json({ success: false, message: "Incorrect password" });
    //-------------------------------------------
    const accessToken = jwt.sign(
      { userId: user._id },
      process.env.ACCESS_TOKEN_SECRET,
      { expiresIn: "5m" }
    );
    const refreshToken = jwt.sign(
      { userId: user._id },
      process.env.REFRESH_TOKEN_SECRET,
      { expiresIn: "7d" }
    );
    refreshTokens.push(refreshToken);
    res.json({
      success: true,
      accessToken,
      refreshToken,
    });
    redisClient.get(key, (err, data) => {
      if (err) return;
      if (data) {
        refreshTokens = JSON.parse(data);
        refreshTokens.push(refreshToken);
        console.log("~ refreshTokens", refreshTokens);
        redisClient.set(key, JSON.stringify(refreshTokens));
      }
    });
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
//--------------------------------------------------------------
export default router;
