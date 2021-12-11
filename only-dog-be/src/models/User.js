import mongoose from "mongoose";
//--------------------------------------------------------------
const Schema = mongoose.Schema;
//--------------------------------------------------------------
const UserSchema = new Schema({
  userName: {
    type: String,
    required: true,
    unique: true,
  },
  email: {
    type: String,
    required: true,
    unique: true,
  },
  password: {
    type: String,
    required: true,
  },
  pathAvatar: {
    type: String,
    default: "/default_avatar/defaultAvatar.jpg",
  },
  posts: {
    type: Array,
    default: [],
  },
  followers: {
    type: Array,
    default: [],
  },
  followings: {
    type: Array,
    default: [],
  },
  createdAt: {
    type: Date,
    default: Date.now,
  },
}, { optimisticConcurrency: true, versionKey: 'version' });
//--------------------------------------------------------------
export default mongoose.model("users", UserSchema);
