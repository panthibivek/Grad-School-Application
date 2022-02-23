const searchWrapper = document.querySelector(".search");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");
let linkTag = searchWrapper.querySelector("a");
let webLink;

// if user press any key and release
searchWrapper.onsubmit = (e) => {
    e.preventDefault()

    let userData = inputBox.value; //user enetered data
    // console.log(userData)
    let emptyArray = [];
    if (userData) {
        location.href = `http://clabsql.clamv.jacobs-university.de/~arathi/${userData}`
    } else {
        searchWrapper.classList.remove("active"); //hide autocomplete box
    }
}