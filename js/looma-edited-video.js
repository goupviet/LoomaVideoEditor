/*
 * Name: Skip
Email: skip@stritter.com
Owner: VillageTech Solutions (villagetechsolutions.org)
Date: 2015 03
Revision: Looma 2.0.0

filename: looma-video.js
Description: videoplayer controls for videoplayer.php
Attribution: heavily borrowed from Matt West (blog.teamtreehouse.com)
 */

'use strict';
$(document).ready(function() {

  // Video
  var video = document.getElementById("video");

  // Buttons
  var playButton = document.getElementById("play-pause");
  var muteButton = document.getElementById("mute");

  // Sliders
  var seekBar = document.getElementById("seek-bar");
  var volumeBar = document.getElementById("volume-bar");

        $('#fullscreen').click(function (e) {
                e.preventDefault();
                screenfull.toggle(this);
            });
//

// Event listener for the play/pause button
playButton.addEventListener("click", function() {
  if (video.paused == true) {
    // Play the video
    video.play();

    // Update the button text to 'Pause'
    playButton.innerHTML = "Pause";
  } else {
    // Pause the video
    video.pause();

    // Update the button text to 'Play'
    playButton.innerHTML = "Play";
  }
});

// Event listener for the mute button
muteButton.addEventListener("click", function() {
  if (video.muted == false) {
    // Mute the video
    video.muted = true;

    // Update the button text
    muteButton.innerHTML = "Unmute";
  } else {
    // Unmute the video
    video.muted = false;

    // Update the button text
    muteButton.innerHTML = "Mute";
  }
});

// Event listener for the seek bar
seekBar.addEventListener("change", function() {
  // Calculate the new time
  var time = video.duration * (seekBar.value / 100);

  // Update the video time
  video.currentTime = time;
  
  commands = JSON.parse(commands);
    
  if(commands.editedVideoTime[0] = time)
  {
      commands.editedVideoTime.remove(0);
      if(commands.type == "text")
      {
          var message = commands.editedVideoText[0];
          commands.editedVideoText.remove(0);
          consol.log(message)
      }
  }
});

// Update the seek bar as the video plays
video.addEventListener("timeupdate", function() {
  // Calculate the slider value
  var value = (100 / video.duration) * video.currentTime;

  // Update the slider value
  seekBar.value = value;
});

// Pause the video when the slider handle is being dragged
seekBar.addEventListener("mousedown", function() {
  video.pause();
});

// Event listener for the volume bar
volumeBar.addEventListener("change", function() {
  // Update the video volume
  video.volume = volumeBar.value;
});
});