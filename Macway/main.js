var content1 = document.getElementById("content-1");
var button1 = document.getElementById("view-1");

button1.onclick = function() {
  if (content1.className == "open") {
    content1.className = "";
    button1.innerHTML = "Read More &raquo;";
  } else {
    content1.className = "open";
    button1.innerHTML = "Less &raquo;";
  }
}

var content2 = document.getElementById("content-2");
var button2 = document.getElementById("view-2");

button2.onclick = function() {
  if (content2.className == "open") {
    content2.className = "";
    button2.innerHTML = "Read More &raquo;";
  } else {
    content2.className = "open";
    button2.innerHTML = "Less &raquo;";
  }
}

var content3 = document.getElementById("content-3");
var button3 = document.getElementById("view-3");

button3.onclick = function() {
  if (content3.className == "open") {
    content3.className = "";
    button3.innerHTML = "Read More &raquo;";
  } else {
    content3.className = "open";
    button3.innerHTML = "Less &raquo;";
  }
}
