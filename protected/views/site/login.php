<!--[if lt IE 9]>
	<script type="text/javascript" src="libs/flashcanvas.js"></script>
	<![endif]-->
    <style>
#signature {
	width:80%;
	margin:auto 0;
	border:2px dotted black;
	background: url(<?php echo Yii::app()->request->baseUrl;?>/img/canvas_bg.jpg) center;
}
h2 {
	color:#fff;
}
#displayarea img {
	margin: 20px;
}
</style>

    <!-- J-SIGNATURE -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/jSignature/src/jSignature.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mystroke.js"></script>

    <!-- PLUGIN -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/jSignature/src/plugins/jSignature.UndoButton.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/jSignature/src/plugins/jSignature.CompressorSVG.js"></script>

    <!-- PLUGIN -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/resemble.js"></script>
    <script>
	
		/*  @preserve
		jQuery pub/sub plugin by Peter Higgins (dante@dojotoolkit.org)
		Loosely based on Dojo publish/subscribe API, limited in scope. Rewritten blindly.
		Original is (c) Dojo Foundation 2004-2010. Released under either AFL or new BSD, see:
		http://dojofoundation.org/license for more information.
		*/
		(function($) {
			var topics = {};
			$.publish = function(topic, args) {
				if (topics[topic]) {
					var currentTopic = topics[topic],
					args = args || {};
			
					for (var i = 0, j = currentTopic.length; i < j; i++) {
						currentTopic[i].call($, args);
					}
				}
			};
			$.subscribe = function(topic, callback) {
				if (!topics[topic]) {
					topics[topic] = [];
				}
				topics[topic].push(callback);
				return {
					"topic": topic,
					"callback": callback
				};
			};
			$.unsubscribe = function(handle) {
				var topic = handle.topic;
				if (topics[topic]) {
					var currentTopic = topics[topic];
			
					for (var i = 0, j = currentTopic.length; i < j; i++) {
						if (currentTopic[i] === handle.callback) {
							currentTopic.splice(i, 1);
						}
					}
				}
			};
		})($);



	    $(document).ready(function() {
	        
			var $sigdiv = $("#signature").jSignature({
				color:"#000",
				"background-color":"#fff",
				background:"gray",
				width:"100%",
				height:"300px",
				UndoButton:true
				
			});
		
			//------------->
			$("#signature").bind('change', function(e){
					
					//END DRAW STROKE
					console.log("end");

					//console.log(MyStroke.jSignatureInstance.dataEngine.data);
					
					//SPLIT STROKE
					//MyStroke.splitStroke();
					
					return;
										
			});
			
			
			//------------------------------
			
			
			var stroke2 = [
"image/png;base64,iVBORw0KGgoAAAANSUhEUgAABI8AAAEsCAYAAABKRZPlAAAgAElEQVR4Xu3de6xlVX0H8HFExSBlrMjD0nKRiNDyLLXBIvWS1JQIAmksyCPy8EFT0mBqm1KawNCHWGIqbZNqrcVBaYVGU5RWY2niJTUaLOoMRQui5UqplpcdHspDZPpb9dxme5w7c/a5a5+z91qfk/xy97n37LXX7/M7f9x8cx7PWudGgAABAgQIECBAgAABAgQIECBAYBWBZ5EhQIAAAQIECBAgQIAAAQIECBAgsJqA8MhzgwABAgQIECBAgAABAgQIECBAYFUB4ZEnBwECBAgQIECAAAECBAgQIECAgPDIc4AAAQIECBAgQIAAAQIECBAgQKC9gFcetTdzBgECBAgQIECAAAECBAgQIECgGgHhUTWj1igBAgQIECBAgAABAgQIECBAoL2A8Ki9mTMIECBAgAABAgQIECBAgAABAtUICI+qGbVGCRAgQIAAAQIECBAgQIAAAQLtBYRH7c2cQYAAAQIECBAgQIAAAQIECBCoRkB4VM2oNUqAAAECBAgQIECAAAECBAgQaC8gPGpv5gwCBAgQIECAAAECBAgQIECAQDUCwqNqRq1RAgQIECBAgAABAgQIECBAgEB7AeFRezNnECBAgAABAgQIECBAgAABAgSqERAeVTNqjRIgQIAAAQIECBAgQIAAAQIE2gsIj9qbOYMAAQIECBAgQIAAAQIECBAgUI2A8KiaUWuUAAECBAgQIECAAAECBAgQINBeQHjU3swZBAgQIECAAAECBAgQIECAAIFqBIRH1YxaowQIECBAgAABAgQIECBAgACB9gLCo/ZmziBAgAABAgQIECBAgAABAgQIVCMgPKpm1BolQIAAAQIECBAgQIAAAQIECLQXEB61N3MGAQIECBAgQIAAAQIECBAgQKAaAeFRNaPWKAECBAgQIECAAAECBAgQIECgvYDwqL2ZMwgQIECAAAECBAgQIECAAAEC1QgIj6oZtUYJECBAgAABAgQIECBAgAABAu0FhEftzZxBgAABAgQIECBAgAABAgQIEKhGQHhUzag1SoAAAQIECBAgQIAAAQIECBBoLyA8am/mDAIECBAgQIAAAQIECBAgQIBANQLCo2pGrVECBAgQIECAAAECBAgQIECAQHsB4VF7M2cQIECAAAECBAgQIECAAAECBKoREB5VM2qNEiBAgAABAgQIECBAgAABAgTaCwiP2ps5gwABAgQIECBAgAABAgQIECBQjYDwqJpRa5QAAQIECBAgQIAAAQIECBAg0F5AeNTezBkECBAgQIAAAQIECBAgQIAAgWoEhEfVjFqjBAgQIECAAAECBAgQIECAAIH2AsKj9mbOIECAAAECBAgQIECAAAECBAhUIyA8qmbUGiVAgAABAgQIECBAgAABAgQItBcQHrU3cwYBAgQIECBAgAABAgQIECBAoBoB4VE1o9YoAQIECBAgQIAAAQIECBAgQKC9gPCovZkzCBAgQIAAAQIECBAgQIAAAQLVCAiPqhm1RgkQIECAAAECBAgQIECAAAEC7QWER+3NnEGAAAECBAgQIECAAAECBAgQqEZAeFTNqDVKgAABAgQIECBAgAABAgQIEGgvIDxqb+YMAgQIECBAgAABAgQIECBAgEA1AsKjakatUQIECBAgQIAAAQIECBAgQIBAewHhUXszZxAgQIAAAQIECBAgQIAAAQIEqhEQHlUzao0SIECAAAECBAgQIECAAAECBNoLCI/amzmDAAECBAgQIECAAAECBAgQIFCNgPComlFrlAABAgQIECBAgAABAgQIECDQXkB41N7MGQQIECBAgAABAgQIECBAgACBagSER9WMWqMECBAgQIAAAQIECBAgQIAAgfYCwqP2Zs4gQIAAAQIECBAgQIAAAQIECFQjIDyqZtQaJUCAAAECBAgQIECAAAECBAi0FxAetTdzBgECBAgQIECAAAECBAgQIECgGgHhUTWj1igBAgQIECBAgAABAgQIECBAoL2A8Ki9mTMIECBAgACBegReGK3uH3VS1JadtP3z8ffPT0Czvcc9O877yag/n+B8DyFAgAABAgQIzFRAeDRTbhcjQIAAAQIEeiiwEHs6K+qZqL2i0v1UKTRK4dEsb9+Ki71klhd0LQIECBAgQIDAzgSERzsT8ncCBAgQIECgJIEjo5kjotLPVIs9bO6M2NN1PdyXLREgQIAAAQKVCgiPKh28tgkQIECAQAUCC42gKIVEfQyKtjeGf41fpre2uREgQIAAAQIEeiEgPOrFGGyCAAECBAgQWKPA4XF++lyi3aOOiUqvKtqwxjXnebpXH81T37UJECBAgACBHxIQHnlCECBAgAABAkMSSIHQytvOFkYh0WLmBh6J9ZajvhGV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QrGVVxHtHo/fZxQQpbAofcj1Wm9eWbRWQecTIECAAAECvRcQHvV+RDZIgAABAgSqFfhcdH7Mdrp/On73G1Hv3c7fUiiUvoEt/VypHCFR81I+s6jap6TGCRAgQIBAnQLCozrnrmsCBAgQINB3gX+MDb52lU3eEL+/PuqAqOdGpXAoBUWLHTUlLOoI1rIECBAgQIDAMASER8OYk10SIECAAIGaBI6OZm+dU8MpKNol6p4on1k0pyG4LAECBAgQINAvAeFRv+ZhNwQIECBAgMC6dbcHws90CLEl1t4alT7MOv1ciloeVYeXtTQBAgQIECBAYJgCwqNhzs2uCRAgQIBAqQLvisbenqm5FBI9FvVg1FUCokyqliFAgAABAgSqExAeVTdyDRMgQIAAgV4LXB67u3SKHaa3m6VXEqVajlqaYg2nECBAgAABAgQIbEdAeORpQYAAAQIECPRNIL36aO+or6+ysfTh2E9GvSdq5e1nfevBfggQIECAAAECxQgIj4oZpUYIECBAgAABAgQIECBAgAABAvkFhEf5Ta1IgAABAgQIECBAgAABAgQIEChGQHhUzCg1QoAAAQIECBAgQIAAAQIECBDILyA8ym9qRQIECBAgQIAAAQIECBAgQIBAMQLCo2JGqRECBAgQIECAAAECBAgQIECAQH4B4VF+UysSIECAAAECBAgQIECAAAECBIoREB4VM0qNECBAgAABAgQIECBAgAABAgTyCwiP8ptakQABAgQIECBAgAABAgQIECBQjIDwqJhRaoQAAQIECBAgQIAAAQIECBAgkF9AeJTf1IoECBAgQIAAAQIECBAgQIAAgWIEhEfFjFIjBAgQIECAAAECBAgQIECAAIH8AsKj/KZWJECAAAECBAgQIECAAAECBAgUIyA8KmaUGiFAgAABAgQIECBAgAABAgQI5BcQHuU3tSIBAgQIECBAgAABAgQIECBAoBgB4VExo9QIAQIECBAgQIAAAQIECBAgQCC/gPAov6kVCRAgQIAAAQIECBAgQIAAAQLFCAiPihmlRggQIECAAAECBAgQIECAAAEC+QWER/lNrUiAAAECBAgQIECAAAECBAgQKEZAeFTMKDVCgAABAgQIECBAgAABAgQIEMgvIDzKb2pFAgQIECBAgAABAgQIECBAgEAxAsKjYkapEQIECBAgQIAAAQIECBAgQIBAfgHhUX5TKxIgQIAAAQIECBAgQIAAAQIEihEQHhUzSo0QIECAAAECBAgQIECAAAECBPILCI/ym1qRAAECBAgQIECAAAECBAgQIFCMgPComFFqhAABAgQIECBAgAABAgQIECCQX0B4lN/UigQIECBAgAABAgQIECBAgACBYgSER8WMUiMECBAgQCZuPGwAAAjCSURBVIAAAQIECBAgQIAAgfwCwqP8plYkQIAAAQIECBAgQIAAAQIECBQjIDwqZpQaIUCAAAECBAgQIECAAAECBAjkFxAe5Te1IgECBAgQIECAAAECBAgQIECgGAHhUTGj1AgBAgQIECBAgAABAgQIECBAIL+A8Ci/qRUJECBAgAABAgQIECBAgAABAsUICI+KGaVGCBAgQIAAAQIECBAgQIAAAQL5BYRH+U2tSIAAAQIECBAgQIAAAQIECBAoRkB4VMwoNUKAAAECBAgQIECAAAECBAgQyC8gPMpvakUCBAgQIECAAAECBAgQIECAQDECwqNiRqkRAgQIECBAgAABAgQIECBAgEB+AeFRflMrEiBAgAABAgQIECBAgAABAgSKERAeFTNKjRAgQIAAAQIECBAgQIAAAQIE8gsIj/KbWpEAAQIECBAgQIAAAQIECBAgUIyA8KiYUWqEAAECBAgQIECAAAECBAgQIJBfQHiU39SKBAgQIECAAAECBAgQIECAAIFiBIRHxYxSIwQIECBAgAABAgQIECBAgACB/ALCo/ymViRAgAABAgQIECBAgAABAgQIFCMgPCpmlBohQIAAAQIECBAgQIAAAQIECOQXEB7lN7UiAQIECBAgQIAAAQIECBAgQKAYAeFRMaPUCAECBAgQIECAAAECBAgQIEAgv4DwKL+pFQkQIECAAAECBAgQIECAAAECxQgIj4oZpUYIECBAgAABAgQIECBAgAABAvkFhEf5Ta1IgAABAgQIECBAgAABAgQIEChGQHhUzCg1QoAAAQIECBAgQIAAAQIECBDILyA8ym9qRQIECBAgQIAAAQIECBAgQIBAMQLCo2JGqRECBAgQIECAAAECBAgQIECAQH4B4VF+UysSIECAAAECBAgQIECAAAECBIoREB4VM0qNECBAgAABAgQIECBAgAABAgTyCwiP8ptakQABAgQIECBAgAABAgQIECBQjIDwqJhRaoQAAQIECBAgQIAAAQIECBAgkF9AeJTf1IoECBAgQIAAAQIECBAgQIAAgWIEhEfFjFIjBAgQIECAAAECBAgQIECAAIH8AsKj/KZWJECAAAECBAgQIECAAAECBAgUIyA8KmaUGiFAgAABAgQIECBAgAABAgQI5BcQHuU3tSIBAgQIECBAgAABAgQIECBAoBgB4VExo9QIAQIECBAgQIAAAQIECBAgQCC/gPAov6kVCRAgQIAAAQIECBAgQIAAAQLFCAiPihmlRggQIECAAAECBAgQIECAAAEC+QWER/lNrUiAAAECBAgQIECAAAECBAgQKEZAeFTMKDVCgAABAgQIECBAgAABAgQIEMgvIDzKb2pFAgQIECBAgAABAgQIECBAgEAxAsKjYkapEQIECBAgQIAAAQIECBAgQIBAfgHhUX5TKxIgQIAAAQIECBAgQIAAAQIEihEQHhUzSo0QIECAAAECBAgQIECAAAECBPILCI/ym1qRAAECBAgQIECAAAECBAgQIFCMgPComFFqhAABAgQIECBAgAABAgQIECCQX0B4lN/UigQIECBAgAABAgQIECBAgACBYgSER8WMUiMECBAgQIAAAQIECBAgQIAAgfwCwqP8plYkQIAAAQIECBAgQIAAAQIECBQjIDwqZpQaIUCAAAECBAgQIECAAAECBAjkFxAe5Te1IgECBAgQIECAAAECBAgQIECgGAHhUTGj1AgBAgQIECBAgAABAgQIECBAIL+A8Ci/qRUJECBAgAABAgQIECBAgAABAsUICI+KGaVGCBAgQIAAAQIECBAgQIAAAQL5BYRH+U2tSIAAAQIECBAgQIAAAQIECBAoRkB4VMwoNUKAAAECBAgQIECAAAECBAgQyC8gPMpvakUCBAgQIECAAAECBAgQIECAQDECwqNiRqkRAgQIECBAgAABAgQIECBAgEB+AeFRflMrEiBAgAABAgQIECBAgAABAgSKERAeFTNKjRAgQIAAAQIECBAgQIAAAQIE8gsIj/KbWpEAAQIECBAgQIAAAQIECBAgUIyA8KiYUWqEAAECBAgQIECAAAECBAgQIJBfQHiU39SKBAgQIECAAAECBAgQIECAAIFiBIRHxYxSIwQIECBAgAABAgQIECBAgACB/ALCo/ymViRAgAABAgQIECBAgAABAgQIFCMgPCpmlBohQIAAAQIECBAgQIAAAQIECOQXEB7lN7UiAQIECBAgQIAAAQIECBAgQKAYAeFRMaPUCAECBAgQIECAAAECBAgQIEAgv4DwKL+pFQkQIECAAAECBAgQIECAAAECxQgIj4oZpUYIECBAgAABAgQIECBAgAABAvkFhEf5Ta1IgAABAgQIECBAgAABAgQIEChGQHhUzCg1QoAAAQIECBAgQIAAAQIECBDILyA8ym9qRQIECBAgQIAAAQIECBAgQIBAMQLCo2JGqRECBAgQIECAAAECBAgQIECAQH4B4VF+UysSIECAAAECBAgQIECAAAECBIoREB4VM0qNECBAgAABAgQIECBAgAABAgTyCwiP8ptakQABAgQIECBAgAABAgQIECBQjIDwqJhRaoQAAQIECBAgQIAAAQIECBAgkF9AeJTf1IoECBAgQIAAAQIECBAgQIAAgWIEhEfFjFIjBAgQIECAAAECBAgQIECAAIH8AsKj/KZWJECAAAECBAgQIECAAAECBAgUIyA8KmaUGiFAgAABAgQIECBAgAABAgQI5BcQHuU3tSIBAgQIECBAgAABAgQIECBAoBgB4VExo9QIAQIECBAgQIAAAQIECBAgQCC/gPAov6kVCRAgQIAAAQIECBAgQIAAAQLFCAiPihmlRggQIECAAAECBAgQIECAAAEC+QWER/lNrUiAAAECBAgQIECAAAECBAgQKEZAeFTMKDVCgAABAgQIECBAgAABAgQIEMgvIDzKb2pFAgQIECBAgAABAgQIECBAgEAxAsKjYkapEQIECBAgQIAAAQIECBAgQIBAfoH/BRge6TwBfojtAAAAAElFTkSuQmCC",

"image/png;base64,iVBORw0KGgoAAAANSUhEUgAABI8AAAEsCAYAAABKRZPlAAAgAElEQVR4Xu3dP6h8RxUH8ARBRRBFMBoUshAQopAYrBIJrk1QiZhCELQwhZBOU2hjY2yjxa+1UkFLQRAFU72UdkYIiqK+2AhiESFqiBCdI/fC5eX3knd2Z3fvzvlcGPb9m7lzPudVX2bv3nmHiwABAgQIECBAgAABAgQIECBAgMA1AneSIUCAAAECBAgQIECAAAECBAgQIHCdgPDI/wYBAgQIECBAgAABAgQIECBAgMC1AsIj/xwECBAgQIAAAQIECBAgQIAAAQLCI/8DBAgQIECAAAECBAgQIECAAAECeQEnj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQIECBAgACBvIDwKG9mBgECBAgQIECAAAECBAgQIECgjIDwqEyrFUqAAAECBAgQIECAAAECBAgQyAsIj/JmZhAgQIAAAQIECBAgQIAAAQIEyggIj8q0WqEECBAgQIAAAQIECBAgQIAAgbyA8ChvZgYBAgQIECBAgAABAgQIECBAoIyA8KhMqxVKgAABAgQIECBAgAABAgQIEMgLCI/yZmYQIECAAAECBAgQIECAAAECBMoICI/KtFqhBAgQIECAAAECBAgQIECAAIG8gPAob2YGAQIECBAgQIAAAQIECBAgQKCMgPCoTKsVSoAAAQIECBAgQIAAAQIECBDICwiP8mZmECBAgAABAgQIECBAgAABAgTKCAiPyrRaoQQIECBAgAABAgQI7CHwvjZ308av9ljDVAIECJylgPDoLNtm0wQIECBAgAABAgQIHEHg4XaPR6fx0HS/n7TXzx/h3m5BgACB1QgIj1bTChshQIAAAQIECBAgQODAAu9u6z8w3SOCoT+38c8r9/xk+/69U2B0123284/2s1jHRYAAgTICwqMyrVYoAQIECBAgQIAAgWEFIsz5eBv3tnF3G6+0sZlGFL3tVPnv2zpPtnHRaT3LECBA4CwEhEdn0SabJECAAAECBAgQIFBaYD4xNAdC8f1H25hfj4XzqXajXx7rZu5DgACBtQgI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un02T4AAAQIECNxQYPlA6/vanAiOelzxFrSX2/hLG8+0ESeLXAQIECBAgACBoQSER0O1UzEECBAgQIDAJLBpr3GqaDuN+H7f68UpHIqA6GL62lvQ9lU1nwABAgQIEFi9gPBo9S2yQQIECBAgQOAGAvG8ojkserx9vW9YJCi6Abo/IUCAAAECBGoICI9q9FmVBAgQIEBgRIF4TtHn2thOY9caBUW7yplHgAABAgQIlBAQHpVosyIJECBAgMAQAptWxfJ0UZw22uWaP/1sfvuZt57tomgOAQIECBAgUEZAeFSm1QolQIAAAQJnKRCni77cxraN+Dp7xaef/amN37XhgdZZPX9PgAABAgQIEGgCwiP/BgQIECBAgMCaBO5pm3myjXj9TBvZ00URFl0shk8/W1N37YUAAQIECBA4SwHh0Vm2zaYJECBAgMBQAttWTbwdLR50vcvpongb2k+nwEhYNNS/hmIIECBAgACBNQgIj9bQBXsgQIAAAQK1BDaLsCiCo+zpouenoOhiCo1q6amWAAECBAgQIHBkAeHRkcHdjgABAgQIFBWIE0VxuuiJNrKni+a3os2niy6LGiqbAAECBAgQIHASAeHRSdjdlAABAgQIlBDYtCq/1ka8HS2+zlzz6aI5MMrM9bcECBAgQIAAAQIdBYRHHTEtRYAAAQIECPz/QdfxwOtPt5E5YbT8VLRvtrmXLAkQIECAAAECBNYhIDxaRx/sggABAgQIjCDwVCviu2285YbFOF10Qyh/RoAAAQIECBA4pYDw6JT67k2AAAECBMYQiBNG32/jzU4aeXbRGP1WBQECBAgQIFBMQHhUrOHKJUCAAAECnQWebut96w3WjMAonls0j863txwBAgQIECBAgMChBYRHhxa2PgECBAgQGFNg08r6eRsfvqa8HwqMxmy8qggQIECAAIF6AsKjej1XMQECBAgQ2EfgQ23yN9r4ym0WeaX97MdtfL2Nl/a5ibkECBAgQIAAAQLrERAeracXdkKAAAECBNYq8HDb2KPTeOiaTX67/fyW0GitLbQvAgQIECBAgMDuAsKj3e3MJECAAAECowp8thX2yTYebCPelnbXGxT61/a7L7ZxMSqGuggQIECAAAEC1QWER9X/A9RPgAABAgReL/DfG6LEc42easNb1G4I5s8IECBAgAABAucoIDw6x67ZMwECBAgQOIzA023Zj7Xx2Jss/7f2+y+0cXGYbViVAAECBAgQIEBgTQLCozV1w14IECBAgMBpBX7Ubv+la7YQD8P+bRu/aeOJ027T3QkQIECAAAECBI4pIDw6prZ7ESBAgACBdQv8rG1veerohfb9s4vx2rq3b3cECBAgQIAAAQKHEBAeHULVmgQIECBA4DwFnm7bvreN97Txxza+ep5l2DUBAgQIECBAgEBPAeFRT01rESBAgAABAgQIECBAgAABAgQGExAeDdZQ5RAgQIAAAQIECBAgQIAAAQIEegoIj3pqWosAAQIECBAgQIAAAQIECBAgMJiA8GiwhiqHAAECBAgQIECAAAECBAgQINBTQHjUU9NaBAgQIECAAAECBAgQIECAAIHBBIRHgzVUOQQIECBAgAABAgQIECBAgACBngLCo56a1iJAgAABAgQIECBAgAABAgQIDCYgPBqsocohQIAAAQIECBAgQIAAAQIECPQUEB711LQWAQIECBAgQIAAAQIECBAgQGAwAeHRYA1VDgECBAgQIECAAAECBAgQIECgp4DwqKemtQgQIECAAAECBAgQIECAAAECgwkIjwZrqHIIECBAgAABAgQIECBAgAABAj0FhEc9Na1FgAABAgQIECBAgAABAgQIEBhMQHg0WEOVQ4AAAQIECBAgQIAAAQIECBDoKSA86qlpLQIECBAgQIAAAQIECBAgQIDAYALCo8EaqhwCBAgQIECAAAECBAgQIECAQE8B4VFPTWsRIECAAAECBAgQIECAAAECBAYTEB4N1lDlECBAgAABAgQIECBAgAABAgR6CgiPempaiwABAgQIECBAgAABAgQIECAwmIDwaLCGKocAAQIECBAgQIAAAQIECBAg0FNAeNRT01oECBAgQIAAAQIECBAgQIAAgcEEhEeDNVQ5BAgQIECAAAECBAgQIECAAIGeAsKjnprWIkCAAAECBAgQIECAAAECBAgMJiA8GqyhyiFAgAABAgQIECBAgAABAgQI9BQQHvXUtBYBAgQIECBAgAABAgQIECBAYDAB4dFgDVUOAQIECBAgQIAAAQIECBAgQKCngPCop6a1CBAgQIAAAQIECBAgQIAAAQKDCQiPBmuocggQIECAAAECBAgQIECAAAECPQWERz01rUWAAAECBAgQIECAAAECBAgQGExAeDRYQ5VDgAABAgQIECBAgAABAgQIEOgpIDzqqWktAgQIECBAgAABAgQIECBAgMBgAsKjwRqqHAIECBAgQIAAAQIECBAgQIBATwHhUU9NaxEgQIAAAQIECBAgQIAAAQIEBhMQHg3WUOUQIECAAAECBAgQIECAAAECBHoKCI96alqLAAECBAgQIECAAAECBAgQIDCYgPBosIYqhxreD8sAAAL9SURBVAABAgQIECBAgAABAgQIECDQU0B41FPTWgQIECBAgAABAgQIECBAgACBwQSER4M1VDkECBAgQIAAAQIECBAgQIAAgZ4CwqOemtYiQIAAAQIECBAgQIAAAQIECAwmIDwarKHKIUCAAAECBAgQIECAAAECBAj0FBAe9dS0FgECBAgQIECAAAECBAgQIEBgMAHh0WANVQ4BAgQIECBAgAABAgQIECBAoKeA8KinprUIECBAgAABAgQIECBAgAABAoMJCI8Ga6hyCBAgQIAAAQIECBAgQIAAAQI9BYRHPTWtRYAAAQIECBAgQIAAAQIECBAYTEB4NFhDlUOAAAECBAgQIECAAAECBAgQ6CkgPOqpaS0CBAgQIECAAAECBAgQIECAwGACwqPBGqocAgQIECBAgAABAgQIECBAgEBPAeFRT01rESBAgAABAgQIECBAgAABAgQGExAeDdZQ5RAgQIAAAQIECBAgQIAAAQIEegoIj3pqWosAAQIECBAgQIAAAQIECBAgMJiA8GiwhiqHAAECBAgQIECAAAECBAgQINBTQHjUU9NaBAgQIECAAAECBAgQIECAAIHBBIRHgzVUOQQIECBAgAABAgQIECBAgACBngLCo56a1iJAgAABAgQIECBAgAABAgQIDCYgPBqsocohQIAAAQIECBAgQIAAAQIECPQUEB711LQWAQIECBAgQIAAAQIECBAgQGAwAeHRYA1VDgECBAgQIECAAAECBAgQIECgp4DwqKemtQgQIECAAAECBAgQIECAAAECgwkIjwZrqHIIECBAgAABAgQIECBAgAABAj0FhEc9Na1FgAABAgQIECBAgAABAgQIEBhMQHg0WEOVQ4AAAQIECBAgQIAAAQIECBDoKSA86qlpLQIECBAgQIAAAQIECBAgQIDAYALCo8EaqhwCBAgQIECAAAECBAgQIECAQE8B4VFPTWsRIECAAAECBAgQIECAAAECBAYTEB4N1lDlECBAgAABAgQIECBAgAABAgR6CvwPDr1BPBLWS18AAAAASUVORK5CYII="
];


	MyStroke.Stroke.target = stroke2;
	
	return;
			
	    })
	</script>

<div align="center">
  <h2 style="color:#fff;">Please draw your character</h2>
  <div id="signature" class="bg-white"></div>
  <div id="tools"></div>
  
  <textarea id="code" style="width:100%; height:200px; display:none;"></textarea>
  
  <a href="#" onClick="MyStroke.splitStroke(); return false;">
  <div style="height:50px; width:60%; " class="bg-blue">
    <h1>Login</h1>
  </div>
  </a>
  <div id="displayarea"></div>
</div>
