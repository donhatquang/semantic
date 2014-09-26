/**
 * Created by donhatquang on 7/21/14.
 */
/** @namespace */
var Video = Video || {};

// TODO http://29a.ch/2011/9/11/uploading-from-html5-canvas-to-imgur-data-uri
// able to upload your screenshot without running servers

// forced closure
(function() {


        var canvas,context,v;

        //----------------

        var draw = function (video,context,width,height) {

            //if(v.paused || v.ended) return false;
            var video = document.getElementById(this.config.id);

            canvas.width = width;
            canvas.height = height;

            /* c: canvas.context*/
            context.drawImage(video,0,0,width,height);

           /*OUTPUT TO IMAGE*/

            var screenshot = Canvas2Image.saveAsPNG(canvas, true);

           // console.log(screenshot.src);

            return screenshot.src;

    }

    /*TAKE THE VIDEO SCREEN SHOT*/
    var getScrenshot = function() {

        var shotNum = this.config.shotNum;
        var currentTime = 1;

        var duration = this.Player.duration();
        var distance = Math.floor(duration/shotNum);

        /*CANVAS*/
        v = document.getElementById('semantic_video');
        canvas = document.getElementById('mycanvas');
        context = canvas.getContext('2d');

        var cw = v.clientWidth;
        var ch = v.clientHeight;

        //------
        //console.log(duration);

        if (duration == 0) return;

        $("#output").html("");

        var interval = setInterval(function () {

            currentTime+=distance;

            /*END THE LOOP*/
            if (currentTime>duration) {

                clearInterval(interval);
                return;
            }

            /*SET CURRENT TIME TO TAKESHOT*/
            console.log(currentTime);
            Video.Player.currentTime(currentTime);

            /*DRAW PICTURE*/
            setTimeout(function() {

                var src = Video.draw(v, context,cw,ch);
                var data = {

                    image: src,
                    title :"Scene #"+currentTime
                }

                //APPEND PICTURE

                template("#screenshot-tmpl","#output",data);

            },500);

            return;

        }, 1000);

    }

    /*play*/
    var videoPlay = function(obj) {

        //console.log(obj);

        var obj = $(obj);

        var poster = obj.attr("src");
        var src = this.config.host+"oceans-clip.mp4";

        this.Player.poster(poster);
        this.Player.src(src);

        $("#"+this.config.id).attr("poster",poster);

        //this.Player.src(src);
        //Video.Player.play();

        /*BACKGROUND*/
        $("#video-player").css({
            background: "#000 url("+poster+") center bottom no-repeat",
            "background-size": "cover"
        })

        /*CURRENT*/

        var current = {
            id: obj.attr("rel"),
            title: obj.attr("title")
        }

        this.currentVideo = current;

        //console.log("id: "+video_id);

        return false;


    }

    /*SAVE SCRRENSHOT*/
    //SAVE IMAGE
    var saveCapture = function (image) {

        var url = _createURL(["site","saveimage"]);
        var param = {
            //image: encodeURIComponent(this.image)

            image: image,
            dir: "./video/"+this.currentVideo.title
        };
        var success = function (data) {

            console.log(data);
        }

        //GET AJAX
        getAjax(url,param,success,"post","json","false");
    };


    /*SAVE SCRRENSHOT*/
    //SEMANTIC IMAGE
    var getImageSemantic = function (image) {

         var param = {
            //image: encodeURIComponent(this.image)

            image: image
        };

        var url = _createURL(["semantic",""], param);

        $("#semantic-iframe").attr({src: url}).css({height: 500}).show();

        console.log(url);
       



        /*var success = function (data) {

            eval("Baidu.BD = "+data);

            //-->DISPLAY SEMANTIC
            var keyword = Baidu.BD.keyword.split("*");

            console.log(keyword);
            $("#output").append(keyword);


        }

        console.log(image);

        //GET AJAX
        getAjax(url,param,success,"get","text");*/
    };

    /*------- MAIN PROGRAM -------*/
    Video = {
        config : {
            poster: "startup.png",
            id: "semantic_video_html5_api",
            shotNum: 3,
            host: ""

        },
        Player: {},

        currentVideo: {

            id: "",
            title: ""
        },

        /*feature */
        draw: draw,
        getScrenshot: getScrenshot,

        /*PLAY VIDEO*/
        videoPlay: videoPlay,

        /*save capture*/
        saveCapture: saveCapture,

        /*SEMANTIC*/
        getImageSemantic: getImageSemantic

    }


})();
