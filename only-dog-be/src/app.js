import cors from "cors";
import dotenv from "dotenv";
import express from "express";
import path from "path";
import connectToMongoDb from "./connects/connectToMongoDb.js";
import { redisStatus } from "./connects/connectToRedis.js";
import authRouter from "./routes/auth.js";
import postRouter from "./routes/post.js";
import userRouter from "./routes/user.js";
//--------------------------------------------------------------
const app = express();
const PORT = process.env.PORT;
dotenv.config();
const __dirname = path.resolve();
//--------------------------------------------------------------
connectToMongoDb();
redisStatus();
//--------------------------------------------------------------
// https://onlydog.social
app.use(express.json());
app.use(cors());
app.get("/", (req, res) => {
  res.send("Hello World");
});
app.use("/auth", authRouter);
app.use("/posts", postRouter);
app.use("/users", userRouter);
app.use("/images", express.static(__dirname + "/src/images"));
app.use("/default_avatar", express.static(__dirname + "/src"));
//--------------------------------------------------------------
app.get("*", (req, res) => {
  res.status(404).send("<h1>404</h1>");
});
//--------------------------------------------------------------
app.listen(PORT, () => console.log(`✅ Server started on port ${PORT}`));
