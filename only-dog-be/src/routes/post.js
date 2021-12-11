import express from "express";
import jwt from "jsonwebtoken";
import multer from "multer";
import serverError from "../errors/serverError.js";
import { randomId } from "../helpers/commonFunction.js";
import verifyAccessToken from "../middlewares/verifyAccessToken.js";
import Post from "../models/Post.js";
import User from "../models/User.js";
//--------------------------------------------------------------
const router = express.Router();
//--------------------------------------------------------------
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, "src/images/");
  },
  filename: function (req, file, cb) {
    const imageName = randomId() + "." + file.mimetype.split("/")[1];
    req.imageName = imageName;
    cb(null, imageName);
  },
});
const upload = multer({ storage: storage });
//--------------------------------------------------------------
router.post(
  "/add_image_post/:userId",
  verifyAccessToken,
  upload.single("imagePost"),
  async (req, res) => {
    try {
      const { userId } = req.params;
      const file = req.file;
      if (!userId)
        return res
          .status(404)
          .json({ success: false, message: "Not found userId" });
      if (!file)
        return res
          .status(404)
          .json({ success: false, message: "Not found file" });
      const user = await User.findById(userId);
      if (!user)
        return res
          .status(404)
          .json({ success: false, message: "Not found user" });
      //----------------------------------------
      const pathImage = "/images/" + req.imageName;
      const post = await Post({
        userId,
        pathImage,
      }).save();
      res.status(200).json({ success: true, pathImage });
      await user.updateOne({ $push: { posts: post._id.toString() } });
    } catch (err) {
      console.log("~ err", err);
      serverError(res);
    }
  }
);
//--------------------------------------------------------------
router.put("/like", verifyAccessToken, async (req, res) => {
  try {
    //--validate all
    const { userId, postId } = req.body;
    const accessToken = req.headers.authorization.split(" ")[1];
    if (!userId || !postId)
      return res.status(404).json({
        success: false,
        message: "Not found postId or/and userId",
      });
    if (userId !== jwt.decode(accessToken).userId)
      return res.status(403).json({
        success: false,
        message: "Invalid userId",
      });
    const post = await Post.findById(postId);
    if (!post)
      return res.status(404).json({
        success: false,
        message: "Not found post",
      });
    //---------------------------------------------
    if (!post.likes.includes(userId)) {
      //check user da disliked trc do chua, neu r thi undisliked
      if (post.dislikes.includes(userId)) {
        res.status(200).json({
          success: true,
          message: "liked and undisliked",
        });
        await post.updateOne({ $push: { likes: userId } });
        await post.updateOne({ $pull: { dislikes: userId } });
      } else {
        res.status(200).json({
          success: true,
          message: "liked",
        });
        await post.updateOne({ $push: { likes: userId } });
      }
    } else {
      res.status(200).json({
        success: true,
        message: "unliked",
      });
      await post.updateOne({ $pull: { likes: userId } });
    }
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
//--------------------------------------------------------------
router.put("/dislike", verifyAccessToken, async (req, res) => {
  try {
    //--validate all
    const { userId, postId } = req.body;
    const accessToken = req.headers.authorization.split(" ")[1];
    if (!userId || !postId)
      return res.status(404).json({
        success: false,
        message: "Not found postId or/and userId",
      });
    if (userId !== jwt.decode(accessToken).userId)
      return res.status(403).json({
        success: false,
        message: "Invalid userId",
      });
    const post = await Post.findById(postId);
    if (!post)
      return res.status(404).json({
        success: false,
        message: "Not found post",
      });
    //---------------------------------------------
    if (!post.dislikes.includes(userId)) {
      //check user da liked trc do chua, neu r thi unliked
      if (post.likes.includes(userId)) {
        res.status(200).json({
          success: true,
          message: "disliked and unliked",
        });
        await post.updateOne({ $push: { dislikes: userId } });
        await post.updateOne({ $pull: { likes: userId } });
      } else {
        res.status(200).json({
          success: true,
          message: "disliked",
        });
        await post.updateOne({ $push: { dislikes: userId } });
      }
    } else {
      res.status(200).json({
        success: true,
        message: "undisliked",
      });
      await post.updateOne({ $pull: { dislikes: userId } });
    }
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
//--------------------------------------------------------------
router.get("/get_all", async (req, res) => {
  try {
    const posts = await Post.find();
    const users = await User.find();
    res.status(200).json({ success: true, posts, users });
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
//--------------------------------------------------------------
router.post("/upload", upload.single("avatar"), async (req, res) => {
  try {
    const image = req.file;
    if (!image) {
      return res
        .status(404)
        .json({ success: false, message: "Not found image" });
    }
    res.send(image);
  } catch (err) {
    console.log("~ err", err);
    serverError(res);
  }
});
//--------------------------------------------------------------
router.post("/comment/add/:postId", verifyAccessToken, async (req, res) => {
  try {
    //--validate all
    const { postId } = req.params;
    const { userId, content } = req.body;
    if (!userId || !postId) {
      return res.status(404).json({
        success: false,
        message: "Not found postId or/and userId",
      });
    }
    if (!content) {
      return res.status(404).json({
        success: false,
        message: "Content has been empty",
      });
    }
    const accessToken = req.headers.authorization.split(" ")[1];
    if (userId === jwt.decode(accessToken).userId) {
      const post = await Post.findById(postId);
      if (!post) {
        return res.status(404).json({
          success: false,
          message: "Not found post",
        });
      } else {
        await post.updateOne({
          $push: { comments: { content: content, by: userId } },
        });
        return res.status(200).json({
          success: true,
          post,
        });
      }
    } else {
      return res.status(403).json({
        success: false,
        message: "Forbidden",
      });
    }
  } catch (err) {
    res.status(500).json({ success: false, message: "Internal Server Error" });
  }
});
//--------------------------------------------------------------
router.get("/get_all_commentpost/:postId", async (req, res) => {
  try {
    //--validate all
    const { postId } = req.params;
    if (!postId) {
      return res.status(404).json({
        success: false,
        message: "Not found postId or/and userId",
      });
    }
    const post = await Post.findById(postId);
    if (!post) {
      return res.status(404).json({
        success: false,
        message: "Not found post",
      });
    } else {
      return res.status(200).json({
        success: true,
        post,
      });
    }
  } catch (err) {
    res.status(500).json({ success: false, message: "Internal Server Error" });
  }
});

//--------------------------------------------------------------

router.delete(
  "/comment/delete/:postId",
  verifyAccessToken,
  async (req, res) => {
    try {
      //--validate all
      const { postId } = req.params;
      const { userId, commentId } = req.body;
      if (!userId || !postId || !commentId) {
        return res.status(404).json({
          success: false,
          message: "Not found postId or/and userId or/and commentId",
        });
      }
      const post = await Post.findById(postId);
      if (post) {
        if (post.comments.some((value) => value.by.valueOf() === userId)) {
          if (
            post.comments.find((value) => value._id.valueOf() === commentId)
          ) {
            await Post.findOneAndUpdate(
              { _id: postId },
              {
                $pull: {
                  comments: { _id: commentId },
                },
              },
              { safe: true }
            );
            return res.status(200).json({
              success: true,
              message: "Comment have been deleted",
            });
          } else {
            return res.status(403).json({
              success: false,
              message: "Comment not found",
            });
          }
        } else {
          return res.status(404).json({
            success: false,
            message: "You can delete your comment!",
          });
        }
      } else {
        res.status(404).json({
          success: false,
          message: "The post not found!",
        });
      }
    } catch (err) {
      console.log(err.message);
      res
        .status(500)
        .json({ success: false, message: "Internal Server Error" });
    }
  }
);
//--------------------------------------------------------------
export default router;
