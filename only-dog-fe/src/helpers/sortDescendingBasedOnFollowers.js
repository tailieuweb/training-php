export default function sortDescendingBasedOnFollowers(arrayData) {
  return arrayData.sort((a, b) => b.followers.length - a.followers.length);
}
