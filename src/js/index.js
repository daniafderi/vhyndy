/* 
NOTES:
to make this asynchronous test work, you need to change parameters in the HTML file. 
take a look at click listener on the button, you will see "babypack".
change it to "starterpack". 
done!
*/

console.log('javascript ready...')

// Responsive Navigation BAR 🎉
var showNav = () => {
    var elem = document.getElementById("header");
    elem.classList.toggle("show");
}

var button = document.getElementById("button-mobile");
button.addEventListener("click", showNav);

// Wrapper Setting
var wrapper = document.getElementById("outer-wrapper");
var getHeightWrapper = wrapper.scrollHeight;

if(getHeightWrapper >= outerHeight) {
    wrapper.classList.add("relative");
}

// Proggres bar
var s = document.getElementById("prog");
var b = document.getElementById("getValue");

var getValue = () => {
    b.innerHTML = s.value + "%";
}

getValue();