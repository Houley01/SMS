// Start function after the page has loaded
window.onload = function() {
  startTime();
  GetBrowserInfo();
}
// Detect the Browser
function GetBrowserInfo() {
  document.getElementById("BrowserInfomartion").innerHTML = navigator.appVersion;
}
// get time and output
function startTime() {
  var today = new Date();
  var h = today.getHours() > 12 ? today.getHours() - 12 : today.getHours();
  var am_pm = today.getHours() >= 12 ? "PM" : "AM"; //if it is am or pm
  var m = today.getMinutes(); // Mins
  var s = today.getSeconds(); // Secs
  m = checkTime(m); // checks if a the number is smaller then 10 then put a 0 infront
  s = checkTime(s); // checks if a the number is smaller then 10 then put a 0 infront
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s + " " + am_pm; // output
  var t = setTimeout(startTime, 500); // repeat every second
}

// checks if a the number is smaller then 10 then put a 0 infront
function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  };
  return i;
}