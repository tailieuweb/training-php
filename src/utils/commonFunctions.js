export const delay = (ms) => new Promise((res) => setTimeout(res, ms));

const delayValue = 1500;
export const delayLoading = () => delay(delayValue);

export const capitalize = (s) => {
  return s[0].toUpperCase() + s.slice(1);
};

export const objectToQueryParams = (o = {}) => {
  return Object.entries(o)
    .map((p) => `${encodeURIComponent(p[0])}=${encodeURIComponent(p[1])}`)
    .join("&");
};

export const queryParamsToObject = (s = "?") => {
  const search = s.substring(1);
  if (search.length > 0) {
    return JSON.parse(
      '{"' + search.replace(/&/g, '","').replace(/=/g, '":"') + '"}',
      function (key, value) {
        return key === "" ? value : decodeURIComponent(value);
      }
    );
  }
  return {};
};

export const getPaginate = (totalItems, currentPage = 1, pageSize = 10) => {
  const totalPages = Math.ceil(totalItems / pageSize);

  var startPage, endPage;
  if (totalPages <= 5) {
    startPage = 1;
    endPage = totalPages;
  } else {
    if (currentPage <= 3) {
      startPage = 1;
      endPage = 5;
    } else if (currentPage + 2 >= totalPages) {
      startPage = totalPages - 4;
      endPage = totalPages;
    } else {
      startPage = currentPage - 2;
      endPage = currentPage + 2;
    }
  }

  const startIndex = (currentPage - 1) * pageSize;
  const endIndex = startIndex + pageSize;

  const pages = [...Array(endPage + 1 - startPage).keys()].map(
    (i) => startPage + i
  );

  return {
    totalItems: totalItems,
    currentPage: currentPage,
    pageSize: pageSize,
    totalPages: totalPages,
    startPage: startPage,
    endPage: endPage,
    startIndex: startIndex,
    endIndex: endIndex,
    pages: pages,
  };
};

export const copyToClipboard = (value) => {
  const el = document.createElement("textarea");
  try {
    el.value = JSON.stringify(value);
  } catch (error) {
    el.value = value;
  }
  document.body.appendChild(el);
  el.select();
  document.execCommand("copy");
  document.body.removeChild(el);
};

export const shuffleArr = (arr) => {
  let currentIndex = arr.length,
    randomIndex;

  // While there remain elements to shuffle...
  while (currentIndex !== 0) {
    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex--;

    // And swap it with the current element.
    [arr[currentIndex], arr[randomIndex]] = [
      arr[randomIndex],
      arr[currentIndex],
    ];
  }

  return arr;
};