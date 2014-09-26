/**
 * Created by donhatquang on 7/4/2014.
 */

//-------------AJAX-------------
//CREATE URL
var _createURL = function(url, param) {

    //if (url.indexOf("saveimage") != -1)
    //return "http://218.193.178.164:8080/biye/app/"+"index.php?r="+url.join("/");;

    param = param || "";

    if (param != "") {

        param = Object.keys(param).map(function(key){
            return (key) + '=' + (param[key]);
        }).join('&');
    }

    var url = "index.php?r="+url.join("/")+"&"+param;

    return url;
}

//GET AJAX
var getAjax = function(url, param, successfunc, method, type, loading) {

    var param = param || {};
    var loading = loading || true;

    //LOADING
    //if (loading)
        //Loading.start();

    $.ajax({
        url: url,
        cache: false,
        type: method || "get",
        dataType: type || "json",
        data: param,
        crossDomain: true,
        //success: success,

        success: function(data) {

            //Loading.stop();

            if (successfunc != null)
                successfunc(data);

        },
        error: function(error) {

            console.log("网络出问题");
            console.log(error);

            //Loading.stop();
        }

    });

    return;
}

//MUSTACHE TEMPLATE
var template = function(tmpl,target,param) {

    var template = $(tmpl).html();
    Mustache.parse(template);   // optional, speeds up future uses
    var rendered = Mustache.render(template, param);

    //alert(rendered);

    $(target).append(rendered);

    return;
}

//ADD IMAGE
var imgDisplay = function(image, dest) {

    //-->DISPLAY SEARCH SEMANTIC IMAGE
    var imgObj = $("<img/>").attr({src: image});
    $('<div class="image-container shadow" ></div>').css("width","240px").append(imgObj).appendTo(dest);

    return;
}

//LOAD
var Loading = {

    interval: 0,
    progress: 0,

    start: function () {

        console.log("Loading init");

        //LOADING
        var pb = $('#loading-bar').progressbar('value',0);

        pb.progressbar('value', 0);
        this.progress = 0;

        //window.clearInterval(this.interval);
        $('#loading-bar').show();

        Loading.interval = setInterval(
            function(){

                //console.log(Loading.progress);
                if (Loading.progress >= 100) {

                    //stop
                    //Loading.stop();

                    window.clearInterval(Loading.interval);
                } else
                    pb.progressbar('value', (Loading.progress+=5));

            }, 200);
    },

    //STOP
    stop: function () {

        console.log("stop");

        $('#loading-bar').hide();
        window.clearInterval(this.interval);
    }
}


//=====-------------->
var Kolich = Kolich || {};

Kolich.Selector = {};

Kolich.Selector.getSelected = function(){
    var t = '';
    if(window.getSelection){
        t = window.getSelection();
    }else if(document.getSelection){
        t = document.getSelection();
    }else if(document.selection){
        t = document.selection.createRange().text;
    }
    return t;
}

Kolich.Selector.mouseup = function(){
    var st = Kolich.Selector.getSelected();
    if(st!=''){

        Baidu.suggestKwd(st);
    }
}

//-------------------->
//chinese length
String.prototype.getBytes = function() {
    var cArr = this.match(/[^\x00-\xff]/ig);
    return this.length + (cArr == null ? 0 : cArr.length);
}
