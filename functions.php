<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once("core/shortcodes.php");
require_once("core/App.php");
function themeInit()
{
    Helper::options()->commentsAntiSpam = false; //关闭反垃圾
    Helper::options()->commentsCheckReferer = false; //关闭检查评论来源URL与文章链接是否一致判断(否则会无法评论)
    Helper::options()->commentsMaxNestingLevels = '999'; //最大嵌套层数
    Helper::options()->commentsPageDisplay = 'first'; //强制评论第一页
    Helper::options()->commentsOrder = 'DESC'; //将最新的评论展示在前
    Helper::options()->commentsHTMLTagAllowed = '<a href=""> <img src=""> <img src="" class=""> <code> <del>';
    Helper::options()->commentsMarkdown = true;
}
/**
 * 主题后台设置
 */
function themeConfig($form)
{
    $WebIcon = new Typecho_Widget_Helper_Form_Element_Text('WebIcon', NULL, NULL, _t('网站图标logo'), _t('在此输入网站图标直链，将显示在网站标签左侧'));
    $form->addInput($WebIcon);
    $navsay = new Typecho_Widget_Helper_Form_Element_Text('navsay', NULL, NULL, _t('导航栏右侧文字设置'), _t('直接书写文字即可，不建议过长。也可使用相关随机api'));
    $form->addInput($navsay);
$footersay = new Typecho_Widget_Helper_Form_Element_Text('footersay', NULL, NULL, _t('页面底部文字设置'), _t('直接书写文字即可，不建议过长。也可使用相关随机api'));
    $form->addInput($footersay);
    $heroimg = new Typecho_Widget_Helper_Form_Element_Text('heroimg', NULL, NULL, _t('头部大图设置'), _t('在这里输入图片链接'));
    $form->addInput($heroimg);
    $meetingtime = new Typecho_Widget_Helper_Form_Element_Text('meetingtime', NULL, NULL, _t('初遇起始日期设定'), _t('格式“MM/DD/YYYY HH:MM:SS”，例“08/20/2013 14:00:00”'));
    $form->addInput($meetingtime);
    $lovetime = new Typecho_Widget_Helper_Form_Element_Text('lovetime', NULL, NULL, _t('恋爱起始日期设定'), _t('格式“MM/DD/YYYY HH:MM:SS”，例“01/28/2022 23:02:00”'));
    $form->addInput($lovetime);
    $anniversary = new Typecho_Widget_Helper_Form_Element_Text('anniversary', NULL, NULL, _t('纪念日名称（倒计时功能，选填）'), _t('在这里填入你们的纪念日名称 例距离我们结婚'));
    $form->addInput($anniversary);
    $endingtime = new Typecho_Widget_Helper_Form_Element_Text('endingtime', NULL, NULL, _t('纪念日日期设定'), _t('格式“MM/DD/YYYY HH:MM:SS”，例“03/10/2022 00:00:00”'));
    $form->addInput($endingtime);
    $boy = new Typecho_Widget_Helper_Form_Element_Text('boy', NULL, NULL, _t('男生头像设置'), _t('在这里输入头像链接'));
    $form->addInput($boy);
    $girl = new Typecho_Widget_Helper_Form_Element_Text('girl', NULL, NULL, _t('女生头像设置'), _t('在这里输入头像链接'));
    $form->addInput($girl);
    $boyname = new Typecho_Widget_Helper_Form_Element_Text('boyname', NULL, NULL, _t('男生昵称设置'), _t('在这里输入昵称'));
    $form->addInput($boyname);
    $girlname = new Typecho_Widget_Helper_Form_Element_Text('girlname', NULL, NULL, _t('女生昵称设置'), _t('在这里输入昵称'));
    $form->addInput($girlname);

  $aboutPageIcon = new Typecho_Widget_Helper_Form_Element_Text('aboutPageIcon', NULL, NULL, _t('首页关于页面图标'), _t('在此输入图标直链，将显示在首页关于小版块中'));
    $form->addInput($aboutPageIcon);
    $aboutPageLink = new Typecho_Widget_Helper_Form_Element_Text('aboutPageLink', NULL, NULL, _t('关于页面链接'), _t('在此输入关于页面链接'));
    $form->addInput($aboutPageLink);
  $albumPageIcon = new Typecho_Widget_Helper_Form_Element_Text('albumPageIcon', NULL, NULL, _t('首页相册页面图标'), _t('在此输入图标直链，将显示在首页相册小版块中'));
    $form->addInput($albumPageIcon);
    $albumPageLink = new Typecho_Widget_Helper_Form_Element_Text('albumPageLink', NULL, NULL, _t('相册页面链接'), _t('在此输入相册页面链接'));
    $form->addInput($albumPageLink);

    $loveListPageIcon = new Typecho_Widget_Helper_Form_Element_Text('loveListPageIcon', NULL, NULL, _t('首页Love List页面图标'), _t('在此输入图标直链，将显示在首页Love List小版块中'));
    $form->addInput($loveListPageIcon);
    $loveListPageLink = new Typecho_Widget_Helper_Form_Element_Text('loveListPageLink', NULL, NULL, _t('Love List页面链接'), _t('在此输入Love List页面链接'));
    $form->addInput($loveListPageLink);

    $blessingPageIcon = new Typecho_Widget_Helper_Form_Element_Text('blessingPageIcon', NULL, NULL, _t('首页祝福板页面图标'), _t('在此输入图标直链，将显示在首页祝福板小版块中'));
    $form->addInput($blessingPageIcon);
    $blessingPageLink = new Typecho_Widget_Helper_Form_Element_Text('blessingPageLink', NULL, NULL, _t('祝福页面链接'), _t('在此输入祝福页面链接'));
    $form->addInput($blessingPageLink);
    
    $timemachinePageIcon = new Typecho_Widget_Helper_Form_Element_Text('timemachinePageIcon', NULL, NULL, _t('首页时光机页面图标'), _t('在此输入图标直链，将显示在首页时光机小版块中'));
    $form->addInput($timemachinePageIcon);
    $timemachinePageLink = new Typecho_Widget_Helper_Form_Element_Text('timemachinePageLink', NULL, NULL, _t('时光机页面链接'), _t('在此输入时光机页面链接'));
    $form->addInput($timemachinePageLink);

    $timePageIcon = new Typecho_Widget_Helper_Form_Element_Text('timePageIcon', NULL, NULL, _t('首页点点滴滴图标'), _t('在此输入图标直链，将显示在首页点点滴滴小版块中'));
    $form->addInput($timePageIcon);
    
    $neteaseid = new Typecho_Widget_Helper_Form_Element_Text('neteaseid', NULL, NULL, _t('网易云歌单id'), _t('在此输入网易云歌单id，如：6616300983'));
    $form->addInput($neteaseid);

    $CustomContenth = new Typecho_Widget_Helper_Form_Element_Textarea('头部自定义', NULL, NULL, _t('头部自定义内容'), _t('位于头部，head内，适合放置一些链接引用或自定义内容'));
    $form->addInput($CustomContenth);
    $stylemyself = new Typecho_Widget_Helper_Form_Element_Textarea('Css自定义', NULL, NULL, _t('自定义Css样式'), _t('已包含&lt;style&gt;标签，请直接书写样式'));
    $form->addInput($stylemyself);
    $CustomContent = new Typecho_Widget_Helper_Form_Element_Textarea('底部自定义', NULL, NULL, _t('底部自定义内容'), _t('位于底部，footer之后body之前，适合放置一些js或自定义内容，如网站统计代码等，（注意：如果您开启了Pjax，暂时只支持百度统计、Google统计，其余统计代码可能会不准确；没开请忽略）'));
    $form->addInput($CustomContent);
    $pjaxContent = new Typecho_Widget_Helper_Form_Element_Textarea('pjax回调', NULL, NULL, _t('Pjax回调函数'), _t('在这里可以书写回调函数内容。如果您不知道这项如何使用请忽略'));
    $form->addInput($pjaxContent);

}




