// Copyright (c) 2018 ml5
//
// This software is released under the MIT License.
// https://opensource.org/licenses/MIT

/* ===
ml5 Example
Real time Object Detection using YOLO and p5.js
=== */

let video;
let yolo;
let status;
let objects = [];
let nilai = [];


function setup() {
  createCanvas(640, 480);
  video = createCapture(VIDEO);
  video.size(640, 480);

  // Create a YOLO method
  yolo = ml5.YOLO(video, startDetecting);

  // Hide the original video
  video.hide();
  status = select('#status');

}

function draw() {
  image(video, 0, 0, width, height);
  for (let i = 0; i < objects.length; i++) {
    noStroke();
    fill(0, 255, 0);
    text(objects[i].className, objects[i].x * width, objects[i].y * height - 5);
    noFill();
    strokeWeight(4);
    stroke(0, 255, 0);
    rect(objects[i].x * width, objects[i].y * height, objects[i].w * width, objects[i].h * height);

  }
}

function startDetecting() {
  status.html('Model loaded!');
  detect();
}

function detect() {

  yolo.detect(function(err, results) {
    objects = results;
    detect();
  });

  keywords = document.getElementById('quiz').textContent
  
  var quiz = keywords.split(",");
  const linkvideo = document.getElementById("linkpath");

  for (let i = 0; i < objects.length; i++) {
    for (let j = 0; j < quiz.length; j++) {
      if (objects[i].className == quiz[j]) {
        linkvideo.style.color = 'black';
        nilai[j]=  10;
        document.getElementById(objects[i].className).innerHTML = "- Hasil deteksi:"+ objects[i].className + " ditemukan, Nilai:" +nilai[j];
      };
    };
    document.getElementById("objectDetection").innerHTML= objects[i].className;

  };
}

