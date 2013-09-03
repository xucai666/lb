/**
 * Slider - �õ�Ƭ���
 *
 * author: ����A��
 * e-mail: noerr@vip.qq.com
 * website: http://blog.vwen.com
 * version: 08/10/2009
 *
 */
(function($) {
	$.fn.Slider=function(options) {
        var settings = {
            width: 500,				//������
            height: 200,			//����߶�
			timeout: 3000,			//�л�ʱ��
			overlay: 300,			//�任�������ʱ��
			effect: 'fadeOut'		//fadeOut���Ը�Ϊhide(ͼƬ����),slideUp(ͼƬ��������),slideDown(ͼƬ��������)��Ч��
        };

		//extending options
		options = options || {};
        $.extend(settings, options);

		return this.each(function(){
			var timer;
			var index=0;
			var aCount=0;
			var done=true;
			var a = $(this);
			var aImg = a.find('ul');
			var aNum = a.find('dl');
			var aCount = $("li",aImg).length;
		
			a.css({width:settings.width,height:settings.height});
			aImg.find('img').css({width:settings.width,height:settings.height});
					
			sliderStart($('ul li',this[0])[0]);
			$('dl dd').bind('click',function() {
				if(done && !$(this).is('.selected')) {
					sliderPlay(a.find('dd').index(this));
				}
			});

			function sliderPlay(ix) {
				if(aCount<=1) return false;
				if(ix>=0) index=ix; 
				else index++;

				if(index>aCount-1) index=0;
				
				sliderStop();
				done=false;
				var imgList=$(a).find('ul');
				var imgNum=$(a).find('dl');
				var old=$('>.selected',imgList);
				if(old.length>0){
					old.css('z-index',10);
					$('>:eq('+index+')',imgList).addClass('selected').show();

					eval("old."+settings.effect+"(settings.overlay,function() {$(this).css('z-index',1).removeClass('selected');done=true;sliderStart();});");

					imgNum.find('dd.selected').removeClass('selected');
					$('>:eq('+index+')',imgNum).addClass('selected');
				}
			}
			//ֹͣ�Զ�
			function sliderStop(){
				clearTimeout(timer);
			}
			//��ʼ�Զ�
			function sliderStart(){
				timer=setTimeout(function() {sliderPlay(-1)},settings.timeout);
			}


		});
	};
})(jQuery);