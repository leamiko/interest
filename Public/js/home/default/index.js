/**
 * 首页精选案例动作
 */
$('.work').delegate('.open-workdetail','mouseenter',function(e){
    var self = $(this),
        cover = self.find('.cover'),
        tit = self.find('h3'),
        tag = self.find('.tag'),
        download = self.find('.download');
    cover.animate({top:'0px'},200);
    tit.animate({left:'10px',opacity:'1'});
    tag.animate({left:'10px',opacity:'1'});
    download.delay(400).animate({bottom:'50px'});
    self.find('.plat2').delay(500).animate({bottom:'-5px'});
    self.find('.plat3').delay(600).animate({bottom:'-5px'});
    self.find('.plat4').delay(700).animate({bottom:'-5px'});
}).delegate('.open-workdetail','mouseleave',function(e){
    var self = $(this),
        cover = self.find('.cover');
        tit = self.find('h3'),
        tag = self.find('.tag'),
        download = self.find('.download');
    cover.stop().css('top','270px');
    tit.stop().css({left:'-120px',opacity:'0'});
    tag.stop().css({left:'400px',opacity:'0'});
    download.stop(true).css({bottom:'-80px'});
    self.find('.plat2,.plat3,.plat4').stop(true).css({bottom:'-60px'});
});