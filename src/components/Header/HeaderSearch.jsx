export default function HeaderSearch(props) {
  const { onSearch, inputSearch, setInputSearch } = props;
  return (
    <form onSubmit={onSearch} action="/search" className="d-flex">
      <input
        name="q"
        type="text"
        className="form-control form-control-sm py-2 mr-2"
        placeholder="Type a keyword...."
        value={inputSearch}
        onChange={(e) => setInputSearch(e.target.value)}
        required
      />
      <button
        className="d-flex align-items-center btn btn-dark btn-sm"
        type="submit"
      >
        <i className="fa fa-search" aria-hidden="true" />
      </button>
    </form>
  );
}
