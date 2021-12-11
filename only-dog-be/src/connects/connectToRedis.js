import dotenv from "dotenv";
import redis from "redis";
//-------------------------------------------------
dotenv.config();
//-------------------------------------------------
export const redisClient = redis.createClient({
  host: process.env.REDIS_HOST,
  port: process.env.REDIS_PORT,
  password: process.env.REDIS_PASSWORD,
});
export function redisStatus() {
  redisClient.on("error", (error) => {
    console.error(`❗️ Redis Error: ${error}`);
  });
  redisClient.on("ready", () => {
    console.log("✅ 💃 redis have ready !");
  });
}
