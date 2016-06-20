<!doctype html>
<!--
Name: Skip, Aaron, Connor, Ryan
Email: skip@stritter.com
Owner: VillageTech Solutions (villagetechsolutions.org)
Date: 2016 06
Revision: Looma Video Editor 0.1
File: video.php
Description: Video viewer/editor page for Looma 2

Usage: 	<button id="testvideo" data-fn="galaxies.mp4"
						 data-fp="resources/videos/"
						 data-ft="video">
			VIDEO TEST</button>
	And: $("button#testvideo").click(LOOMA.playMedia);
-->

<?php $page_title = 'Looma Video Player';
	  include ('includes/header.php');

	  function thumbnail ($fn) {
				//given a CONTENT filename, generate the corresponding THUMBNAIL filename
				//find the last '.' in the filename, insert '_thumb.jpg' after the dot
				//returns "" if no '.' found
				//example: input 'aaa.bbb.mp4' returns 'aaa.bbb_thumb.jpg' - this is the looma standard for naming THUMBNAILS
		 		$dot = strrpos($fn, ".");
				if ( ! ($dot === false)) { return substr_replace($fn, "_thumb.jpg", $dot, 10);}
				else return "";
			} //end function THUMBNAIL

?>

<style>
    #comments {
        z-index: 1;
        top: 0px;
        left: 0px;
        position: fixed;
        text-align: center;
        margin: auto;
    }
    
    #video {
        z-index: 0;
    }
</style>
    <body>
        <?php
            $filename = $_REQUEST['fn'];
            $filepath = $_REQUEST['fp'];
	    ?>
            <div id="main-container-horizontal">
                <div height="95%">
                    <!-- text box -->
                        <form class="media hidden_button">
                            <textarea name="comments" id="comments" style="width:96%;height:90px;background-color:white;color:black;border:none;padding:2%;font:22px/30px sans-serif;" placeholder="Enter text..."></textarea>
                        </form>
                        <video id="video">
                            <?php echo 'poster="' . $filepath . thumbnail($filename) . '">'; ?>
                                <?php echo '<source src="' . $filepath . $filename . '" type="video/mp4">' ?>
                        </video>
                        <br>
                        <button type="button" class="media hidden_button" id="submit">
                                <?php keyword('Submit') ?>
                            </button>
                    <div id="fullscreen" class="viewer">
                        <button id="fullscreen-control"></button>
                        <br>
                    </div>
                </div>
                <div id="video-controls">

                    <div id="rectangle" style="width:480px;height:270px;border:1px solid #000;">Stuff</div>



                    <br>
                    <button type="button" class="media hidden_button" id="text">
                        <?php keyword('Text') ?>
                    </button>
                    <br>
                    <button type="button" class="media" id="play-pause">
                        <?php keyword('Play') ?>
                    </button>
                    <input type="range" class="video" id="seek-bar" value="0" style="display:inline-block">
                    <br>
                    <button type="button" class="media" id="volume">
                        <?php keyword('Volume') ?>
                    </button>
                    <input type="range" class="video" id="volume-bar" min="0" max="1" step="0.1" value="0.5" style="display:inline-block">
                    <br>
                    <button type="button" class="media" id="mute">
                        <?php keyword('Mute') ?>
                    </button>
                    <button type="button" class="media" id="edit">
                        <?php keyword('Edit') ?>
                    </button>
                </div>
            </div>
            <?php include ('includes/toolbar.php'); ?>
            <?php include ('includes/js-includes.php'); ?>
            <script src="js/looma-screenfull.js"></script>
        
        <script src="js/looma-video.js"></script>
          
        <!-- Update Video Name in looma-video.js -->
        <script>
            var videoName = "<?php echo $filename; ?>";
            
            // Remove extension from videoName
            var strlen = videoName.length;
            videoName = videoName.substring(0, strlen - 4);
            editsObj.videoName = videoName;
            console.log(editsObj.videoName);
        </script>
        
</body>
