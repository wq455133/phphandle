<?php
/**
 * http://47.244.140.215:8091/feeds/toutiao?pageNo=1&num=20
 */
require_once dirname(__FILE__) . '/helpers.php';

class test {

    public function filter($content, $appends = array()) {
        $pattern = "|<p[\s\S]*?<\/p>|";
        $content = preg_replace_callback($pattern, function($matches) use($appends) {
            // 通常: $matches[0]是完成的匹配
            // $matches[1]是第一个捕获子组的匹配
            // 以此类推

            $patterns = [
                '/不得转载/', '/责任编辑[:：]?/',  '/作者[:：]?/',
                '/本文来源[:：]?/', '/原文链接[:：]?/', '/原标题[:：]?/',
                // '/公众号/', '/一点号/', '/微信号/', '/头条号/', '/微信平台/', '/蓝字/',
                '/加威信/', '/加微心/', '/关注我们/', '/关注我/',
                // '/小字/'
            ];
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $matches[0])) {
                    return '';
                }
            }
            return trim($matches[0]);

        }, $content);
        return trim($content);
    }
}

$content = "<div>
<table>
    <tr>
        <td>微信号</td>
    </tr>
</table>
<div style=\"display:none;\">不用显示</div>
<p>深圳有了首个“无工业”街道</p>    <h4 style=\"color: red;\">     <span class=\"time  br\">         12:28:44        </span>     <span class=\"origin\">深圳商报</span>       <span class=\"font\">小字</span>     </h4>    <p>   </p>
<p><img src=\"http://tt.lkeji.com/uploads/181124/db4ac828f611845bc86e65a1561e4d8a2.jpg\"></p>
<p>大鹏新区南澳风景优美。 南澳办事处 供图</p>
<p>走在花园路的街道上，新一代的年轻人 <a href=\"\">很难想象</a> 当初这里曾经有着城中村的模样。</p>
<p>记者11月23日从深圳<a href=\"\">大鹏新区</a>南澳办事处获悉，随着西涌社区高雅酒店用品有限公司停产搬离，该办事处提前两个月实现目标，正式成为全市首个“无工业”街道。</p>
<p>据了解，2016年，新区编制完成《大鹏新区全域旅游发展规划》和《大鹏新区旅游业“十三五”发展规划》，两个规划对大鹏半岛地域环境和生态、历史、文化资源进行了详细梳理，确定了“生态永续”目标和“一体两翼”整体布局。“一体两翼”中的“一体”，将以南澳为龙头，依托南澳高度集聚的杨梅坑、东西涌、鹿嘴、地质公园、柚柑湾、浪骑游艇会、七星湾游艇会、海上运动中心等资源，打造以世界级主题公园、国际化会议度假中心、大众型户外运动为特色的顶级核心景区。东西“两翼”的东翼为大鹏所城-较场尾-龙岐山-罗香园，西翼为南澳-下沙。</p>
<p>2016年底，南澳办事处在践行“绿水青山就是金山银山”的发展理念中，根据大鹏新区党工委提出的打造“南澳滨海风情小镇”的发展目标，提出清理淘汰落后产业，到2018年底实现全市首个“无工业”特色小镇的目标。</p>
<p>围绕相关部署和规划，南澳进行摸底，辖区共有15家工业企业均属于低端落后企业，被列为清理淘汰对象。为此，办事处制定了《淘汰落后技术装备及相关工业企业工作方案》，成立了由党工委、办事处主要领导担任组长的工作领导小组，在摸清企业生产的情况下，按照先易后难、分类分批的原则逐步淘汰。截至2018年10月底，关停取缔企业3家，动员搬迁企业10家，帮助两家企业完成转型升级，提前两个月实现“无工业”特色小镇目标。(记者 张妍)</p></div>";
$content .= "<div>\n      <p style=\"text-align: center;\">图片来源：视觉中国</p>\r\n<p style=\"text-align: left;\">今年5月，中建投信托前总经理刘屹因个人原因辞职，此后一直暂由副总经理谭硕代为履职。谭硕，现年46岁，25年金融从业经历，博士研究生学历，自2014年12月起担任中建投信托副总经理；曾任职于四川省涪陵市人民政府办公室（中国建设银行下派挂职锻炼）、中国建设银行四川省分行、四川美益投资有限公司。</p>\r\n<p>据中建投信托官网介绍，中建投信托前身是浙江省国际信托投资公司（以下简称浙江国投），始创于1979年，总部位于杭州，是国内最早经营信托投资业务的公司之一。2007年4月，中国建银投资有限责任公司（以下简称中国建投）收购浙江国投的全部股权；同年11月，更名为中投信托有限责任公司。2013年6月，公司正式更名为中建投信托有限责任公司。</p>\r\n<p>中建投信托注册资本金为50亿元，中国建投与建投控股有限责任公司分别持有中建投信托90.05%与9.95%股权。截至2017年末，中建投信托管理的信托资产规模总计为1702.46亿元，其中房地产业务占比最高，占信托资产规模的44.39%；分布在基础产业、实业、金融机构领域的信托资产较为均衡，占比均在12.5%上下。2017年末，中建投信托固有资产余额为88.44亿元。</p>\n      <img alt_src=\"http://static.nbd.com.cn/images/nbd_v4/ydrss640.jpg\"/>\n      <div style=\"display:none\">\n\n  <!--51la-->\n<!--  <script language=\"javascript\" type=\"text/javascript\" src=\"//js.users.51.la/19198657.js\"></script>\n  <noscript><a href=\"//www.51.la/?19198657\" target=\"_blank\"><img alt=\"我要啦免费统计\" src=\"//img.users.51.la/19198657.asp\" style=\"border:none\" /></a></noscript>\n-->\n\n  <!-- youmeng statistics -->\n<!--\n  <script type=\"text/javascript\">var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id='cnzz_stat_icon_1260046885'%3E%3C/span%3E%3Cscript src='\" + cnzz_protocol + \"s4.cnzz.com/z_stat.php%3Fid%3D1260046885' type='text/javascript'%3E%3C/script%3E\"));</script>\n  <script> $(\"#cnzz_stat_icon_1260046885\").hide(); </script>\n-->\n\n  <!--baidu-->\n  <script type=\"text/javascript\">var _bdhmProtocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cscript src='\" + _bdhmProtocol + \"hm.baidu.com/h.js%3Fde6470f7123b10c2a7885a20733e9cb1' type='text/javascript'%3E%3C/script%3E\"));</script>\n\n  <!--google-->\n<!--\n  <script>\n    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){\n      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\n        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');\n  ga('create', 'UA-100046212-1', 'auto');\n  ga('send', 'pageview');\n  </script>\n-->\n\n</div>\n\n    </div>\n    ";
$content .= "<div><p class=\"ql-align-justify\">人的性格因素是丰富的，感情色彩也是丰富的，每个人都积累了不少情感感受，内心逐步成熟和稳定，那么在感情方面你最近会有什么好事发生呢？来看下面的爱情测试，凭第一直觉选一个选项，相信会对你有启发的。</p><p class=\"ql-align-justify\">A、报喜鸟</p><div class=\"pgc-img\"><img src=\"http://p1.pstatp.com/large/pgc-image/a95b30082daf4ffea4001b9277f5885e\" img_width=\"600\" img_height=\"457\" alt=\"选择一个小鸟刺绣，测测感情方面你会遇到什么好事\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">B、报喜鸟</p><div class=\"pgc-img\"><img src=\"http://p99.pstatp.com/large/pgc-image/81f005986f4a4b37b052dc7336588a6a\" img_width=\"600\" img_height=\"555\" alt=\"选择一个小鸟刺绣，测测感情方面你会遇到什么好事\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">C、报喜鸟</p><div class=\"pgc-img\"><img src=\"http://p9.pstatp.com/large/pgc-image/d244fb1515384de18fba802a93917d0a\" img_width=\"600\" img_height=\"568\" alt=\"选择一个小鸟刺绣，测测感情方面你会遇到什么好事\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">D、报喜鸟</p><div class=\"pgc-img\"><img src=\"http://p99.pstatp.com/large/pgc-image/d85f31b96f3640298e734c37a0ba3d66\" img_width=\"600\" img_height=\"633\" alt=\"选择一个小鸟刺绣，测测感情方面你会遇到什么好事\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><br></p><hr><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">A、以前拒绝你的人突然回头。你较之前比整个人有了较多的提高，内心成熟稳定了许多，去掉了浮夸，不骄不躁，回归了生活的宁静和自然，更加有魅力了，之前表白过的感情其实已经放下，更加清晰自己应该与生么样的人在一起，不妨再重新审视之前的这个人，是否还能唤起当时的热情，给不给机会就看你自己拿捏了。</p><p class=\"ql-align-justify\">B、喜欢的人突然献殷勤。你对待感情的态度是真诚的，你的内心是善良温柔的，由于不确定对方对自己的感觉，或者是担心表白后反而使彼此的距离越来越远，而一直只是默默的关注着喜欢的人，最近你的真诚守候会得到回报，你要做好准备，对方与你的活动有意识的增多了，你可以大胆的了解对方，喜欢很有可能上升到爱情的层面上来。</p><p class=\"ql-align-justify\">C、你会遇到年纪比你长一点人跟你告白。爱情无国界更没有年龄之分，完全在于彼此的感觉，你可能也想找一个比自己成熟，懂得包容和呵护自己的人，而且能够在自己迷茫的时候鼓励和引导自己前行，值得依靠也是情感的寄托，最近对你有好感的魅力异性很有可能对你表达爱意，希望与你有更深入的了解，你可以把握这次机会。</p><p class=\"ql-align-justify\">D、你会遇到让自己心动的人。在情感方面你一直都是矜持的，也或者自我保护意识很强，不会轻易喜欢上一个人，只想等到那个完全适合的人出现，最近你的缘分就会降临，你很有可能为某个人而心动，打破了自己常规的举动，情不自禁的被吸引，不要犹豫，这是来之不易的感觉，积极采取行动，不要错失良机。</p></div>";

$content .= "<p>夕阳西下，是我最想念的时候，对着你在的那个城市，说了一声：我想你，不知道，你是否听得到。</p><blockquote><p>浮华一生，淡忘一季。</p><p>空有回忆，打乱缠绵。</p><p>笑容不见，落寞万千。</p><p>弦，思华年。</p><p>那些年华，恍然如梦。</p><p>亦如，流水，一去不返。</p><p>不泣离别，不诉终殇</p></blockquote><p><img src=\"http://zy.lkeji.com/uploads/181129/04d4cc57bd26aed4c1199d58209cd84c2.jpg\"></p><p>往事如烟，吸进肺里，暖过心脏，却呛得眼泪直流。</p><blockquote><p>分手后不可以做朋友</p><p>因为彼此伤害过</p><p>不可以做敌人</p><p>因为彼此深爱过</p><p>所以我们变成了</p><p>最熟悉的</p><p>陌生人</p></blockquote><p><img src=\"http://zy.lkeji.com/uploads/181129/111984da0593622bb2953f713030852e2.jpg\"></p><p>一个人自以为刻骨铭心的回忆，别人早已已经忘记了。</p><blockquote><p>有些人会一直刻在记忆里的</p><p>即使忘记了他的声音</p><p>忘记了他的笑容</p><p>忘记了他的脸</p><p>但是每当想起他时的那种感受</p><p>是永远都不会改变的</p></blockquote><p><img src=\"http://zy.lkeji.com/uploads/181129/d7a7d4285309aa6626d524cb0459c4e92.jpg\"></p><p>世界上有两个我，一个假装快乐，一个真心难过。</p><blockquote><p>我以为，我已经把你藏好了。</p><p>藏在那样深，那样冷的，昔日的心底。</p><p>我以为，只要绝口不提，只要让日子继续地过去。</p><p>你就终于，终于会变成一个，古老的秘密。</p><p>可是，不眠的夜，仍然太长。</p><p>而，早生的白发，又泄露了，我的悲伤。</p></blockquote><p><img src=\"http://zy.lkeji.com/uploads/181129/a5d0336e3439e564a01c020d820952d12.jpg\"></p><p>曾听人说，回忆是一座桥，却是通向寂寞的牢。</p><blockquote><p>曾经以为，伤心是会流很多眼泪的。</p><p>原来，真正的伤心，是流不出一滴眼泪。</p><p>什么事情都会过去，我们是这样活过来的。</p><p>无论走到哪里，都应该记住，过去都是假的。</p><p>回忆是一条没有尽头的路，一切以往的春天都不复存在。</p><p>就连那最坚韧而又狂乱的爱情归根结底也不过是一种转瞬即逝的现实。</p></blockquote><p><img src=\"http://zy.lkeji.com/uploads/181129/4bd6b348fac9df1192c021ade7b540652.jpg\"></p>";

$content = format($content);
$content = img_url_local($content);

$appends = array('深圳', '大鹏新区', '很难想象','资料图','图片来源：');
$content = preg_replace_callback(
    '/<p[\s\S]*?>([\s\S]*?)<\/p>/i',
    function ($matches) use ($appends) {
        $patterns = array(
            '不得转载','责任编辑', '本文来源','原标题', '原文链接', '作者',
            '公众号', '一点号', '微信号', '头条号', '微信平台', '蓝字', '搜狐知道', '新浪女性',
            '加威信', '加微心', '关注我们', '关注我',
        );

        $patterns = array_merge($patterns, $appends);
        foreach ($patterns as $pattern) {
            if (preg_match('/'.$pattern.'/', $matches[1])) {
                return '';
            }
            else if (! trim($matches[1])) {
                return '';
            }
        }
        return "<p>$matches[1]</p>";
    },
    $content);
echo $content;die;

$content = strip_tags($content, '<br><div><img><p><span><blockquote><sup><sub>');
echo $content;die;


// https://www.toutiao.com/a6627260380848587268/
// $content = "<div><p>格斗世界讯：2018年11月24日，世界顶级综合格斗赛事UFC（终极格斗冠军赛），再度回归到中国市场，这一次，UFC将在中国北京打响UFC格斗之夜北京站的比赛。在去年，UFC首次进军中国市场，并将UFC的中国首秀在上海打响，在那次UFC中国首秀格斗之夜的赛事上，仅门票收入，就创造了非常可观的数千万元！</p><div class=\"pgc-img\"><img src=\"http://p99.pstatp.com/large/pgc-image/b2bb024d9a1f46fe9ccbfe7aec51a8bc\" img_width=\"960\" img_height=\"502\" alt=\"UFC北京站震撼来袭，中国力量全军出击！\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p>第二次来到中国市场打响比赛，UFC选择了中国的首都北京。在UFC格斗之夜北京站的比赛上，本次UFC格斗之夜北京站的头条主赛，由UFC重量级排名第3位的“剃刀”科鲁迪斯·布莱兹（Curtis Blaydes），对阵前冠军挑战者，排名第4位的“铁血”弗朗西斯·纳干诺(Francis Ngannou)。而另一场联合主赛，则由荷兰前K-1 WORLD GP世界王者“毁灭之锤”阿里斯特·欧沃瑞姆（Alistair Overeem），对阵来自俄罗斯的谢尔盖·帕夫洛维奇（Sergei Pavlovich）。</p><div class=\"pgc-img\"><img src=\"http://p3.pstatp.com/large/pgc-image/8e6e4180bbca4d3f99b797f1023c3471\" img_width=\"580\" img_height=\"580\" alt=\"UFC北京站震撼来袭，中国力量全军出击！\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p>除了两场重量级的头条主赛之外，“吸血魔”李景亮、“功夫猴子”宋亚东、“铁拳”宋克南、“昆仑女王”张伟丽、刘平原、胡耀宗、闫晓楠、武亚楠等多达9位UFC中国选手，都将在本次UFC北京站的大赛上亮相出战。可以说，这一次UFC北京站，中国力量可谓是全线出击！</p><div class=\"pgc-img\"><img src=\"http://p99.pstatp.com/large/pgc-image/2d6080683adf4f4881a6d4f1cdef458f\" img_width=\"1076\" img_height=\"1389\" alt=\"UFC北京站震撼来袭，中国力量全军出击！\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p>在这次UFC北京站赛事上最备受关注的中国选手，当属UFC次中量级中国名将“吸血魔”李景亮，目前李景亮的职业战绩为15胜5负，他曾在国内获得过武林传奇次中量级冠军，后跟随UFC中国第一人张铁泉征战UFC，目前，李景亮在UFC保持着7胜3负的战绩，本次比赛，李景亮的对手将是来自德国的选手大卫·扎瓦达（David Zawada）。大卫·扎瓦达今年28岁，职业战绩16胜4负，这是他进入UFC以来的第二场比赛，在他的UFC首秀上判定输给了丹尼·罗伯特斯。但是他在进入UFC前，他在其他赛事的获胜终结记录达到了惊人的88%，实力不可小觑。</p><div class=\"pgc-img\"><img src=\"http://p3.pstatp.com/large/pgc-image/57d28235c03442228ccd624b16c3dce2\" img_width=\"640\" img_height=\"426\" alt=\"UFC北京站震撼来袭，中国力量全军出击！\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p>另一位备受关注的中国选手，则是被称为“功夫猴子”的中国羽量级新星宋亚东。宋亚东职业战绩12胜3负，他早年曾在国内昆仑决MMA的赛场上征战，是恩波格斗俱乐部的一员猛将，目前宋亚东在UFC的战绩是2战全胜2次终结对手。因为在UFC赛场上出色的表现，很多拳迷包括UFC的名将们都认为，宋亚东是中国最具潜力的MMA新星。本次比赛，宋亚东将与来自美国的27岁UFC新人文斯·莫拉莱斯（Vince Morales）迎来一场战斗。</p><div class=\"pgc-img\"><img src=\"http://p99.pstatp.com/large/pgc-image/4651311ea0f54c679af5b04514f003ae\" img_width=\"1194\" img_height=\"678\" alt=\"UFC北京站震撼来袭，中国力量全军出击！\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p>此外，在昆仑决MMA连续拿到了草量级与蝇量级两个级别女子世界冠军头衔的中国名将张伟丽，也将在这次UFC北京站的比赛上迎来自己的第二场UFC比赛。无论从头条主赛还是赛事阵容，可以看出UFC对于这次北京站的格斗之夜赛事还是准备了不少的惊喜！这场大战，9位中国选手全线出击，他们将取得怎样的战果呢？让我们一起期待。</p><p>《格斗世界》报道</p></div>";

// https://www.toutiao.com/a6627270513800512014/
// $content = "<!-- gsdgfdsg gsdfgrrr --><a id=\"jjj\" href=\"http://www.baidu.com\" aria-current=\"12414\">百度</a><div><p class=\"ql-align-justify\"></p><div class=\"pgc-img\"><img src=\"http://p99.pstatp.com/large/dfic-imagehandler/f6c73140-28f6-42c4-9ac7-89672e446ecf\" img_width=\"1200\" img_height=\"900\" alt=\"取消涨跌停板，就能抑制投机吗？\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">应该说最近的妖股市北高新（600604）给市场上了一课，上涨的时候是连续的一字涨停，不给你机会，下跌的时候也一样是一字，同样让你欲死不能。由于这个现象的特殊和棘手，于是市场就冒出了一个观点，这还是交易制度有弊端，如果你放开了涨跌停板制度，走势可能就不会这么极端了。</p><p class=\"ql-align-justify\"></p><p class=\"ql-align-justify\">这就是昨天市场为啥热议涨跌停板的原因，当一个矛盾比较突出的时候可能就会想办法去解决，不过这次的市北高新的走势不该是交易制度的范畴之内，就拿前些年上市的一些新股来说，开始的时候几乎是没有涨跌限制的，上市的第一天有些新股涨幅达到300%左右，让一些人一夜之间暴富，随之而来的是从第二天开始股价的持续下跌，严重影响了正常的交投秩序，后来没有办法了，交易所又开始限制新股上市交易的第一天涨幅，相当于有涨跌幅度限制，不过这个限制还是大于每天上涨或者下跌10%的幅度，而是扩大到了44%，即便是这样，股价第一天依然可以涨到你限制的价位，从第二天开始还是连续的一字涨停，各位看看最近新上市的中国人保就明白了，第一天的确涨到了44%就停止了上涨，可是从第二天开始出现了连续5个一字涨停，你能说扩大涨跌幅限制或者说取消涨跌幅限制就能抑制投机吗，答案显然是否定的。</p><p class=\"ql-align-justify\"></p><p class=\"ql-align-justify\">交易制度所能改变的是给予市场一个公平的交易环境，要想抑制过度投机还是要从投机的成本和重大交易违法的层面去解决，比如说查出了某些操纵个股的公司，一次罚个倾家荡产，找到信息披露方面的弊端，要利用违法退市这个大旗，让投机资金望而生畏，才能从根本上解决问题。</p><p class=\"ql-align-justify\"></p><p class=\"ql-align-justify\">开始的时候市场可能会有各种的不适用，但是等时间久了，规则完全成熟了，投机的氛围自然而然的就降低了。</p><div class=\"pgc-img\"><img src=\"http://p3.pstatp.com/large/dfic-imagehandler/91881aa7-4734-4f9d-8a42-52c87e2ce581\" img_width=\"1200\" img_height=\"798\" alt=\"取消涨跌停板，就能抑制投机吗？\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><div class=\"pgc-img\"><img src=\"http://p9.pstatp.com/large/dfic-imagehandler/9829e864-3959-4425-b2c1-7d1182c28b48\" img_width=\"1200\" img_height=\"796\" alt=\"取消涨跌停板，就能抑制投机吗？\" inline=\"0\"><p class=\"pgc-img-caption\"></p></div><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"></p><p class=\"ql-align-justify\">抑制市场过度投机不是一天两天的事情，是需要长时间的坚持不懈，特别是针对A股这种恶性不改的市场，没有监管的决心是没有办法从根本上解决问题的，我们曾经有过价值投资，2017年就是个很好的例子，但这种来之不易的成果却被一场股权质押风险引发的危机给毁了，妥协的背后是对过去好不容易建立起来的价值投资的践踏，未来要重新再走上这条路不知道有多难，难得不是市场没有资金，而是投资人的信心，特别是这波妖股的几倍上涨传递的负面信息要远远大于出台一项政策性利好，给人的感觉是“朝夕令改”四个字，真不知道中国股市的明天在哪里呢。</p><p class=\"ql-align-justify\"></p><p class=\"ql-align-justify\">一切静等演变，涨跌停板这是交易制度的一部分，改变不了什么的，各位千万不要动不动就拿这个说事，就跟新股发行对市场的影响，其实没有那么严重，可是总有人觉得这是A股最大的利空，没办法市场就是这样，习惯就好了。</p></div>";

$content = "<div class=\"article-content\"><div>   <p>2018年TGA秋季大奖赛即将拉开帷，《堡垒之夜》作为超人气竞技网游强势加入，在经历了国服推广的线上赛试水后，共有50内顶级俱乐部将参与线下赛事，其中不乏有众多豪门战队EDG、OMG、QG、FPX、WE等，甚至有不少俱乐部派出了2支甚至3支队伍，可以看出大家对于《堡垒之夜》的重视，也表明了该游戏光明的发展趋势。<br></p> <p><img src=\"http://p99.pstatp.com/large/pgc-image/66e34784aeba44e9986c67c0d2fdc0fd\" img_width=\"811\" img_height=\"462\" alt=\"熊猫主播Graysama与师维组队征战堡垒之夜，只因像嗨氏被躺喷？\" inline=\"0\"></p> <p>在这众多队伍中，除了有很多以此为工作的职业战队，还有一支由熊猫平台主播Graysama和师维组成的主播队，该队伍是临时组成前来参赛，可就是这么一个磨合不久的主播队竟打败了众多受过长时间训练的职业选手，尤其是在爆冷击败EDG一队时更是让人对这两个人有了深刻的印象。在临时配合下都能打出很棒的成绩，从这点可以看出这两位主播的真正实力在很多职业选手之上。</p> <p><img src=\"http://p99.pstatp.com/large/pgc-image/07a8717f204e45b8979a0523916eb956\" img_width=\"466\" img_height=\"290\" alt=\"熊猫主播Graysama与师维组队征战堡垒之夜，只因像嗨氏被躺喷？\" inline=\"0\"></p> <p>Graysama和师维都在熊猫直播，两人都有很强的实力，尤其是主播Graysama，说他是一位电竞天才并不夸张。在高中时，他就在LOL领域打出了些成绩，为了学业拒绝了LGD战队的青训生邀请，后来又拒绝了《守望先锋》的职业邀请。直到碰到了《堡垒之夜》，他玩了仅仅半个月就在新赛季轻轻松松上了排行榜第十名。</p> <p><img src=\"http://p99.pstatp.com/large/pgc-image/800746503b844120ba4f992ff15062e7\" img_width=\"413\" img_height=\"274\" alt=\"熊猫主播Graysama与师维组队征战堡垒之夜，只因像嗨氏被躺喷？\" inline=\"0\"></p> <p>作为一名熊猫主播，他认为这是相比职业更加轻松的事情。Graysama直播风格很幽默，经常做一些搞笑动作逗乐观众，甚至有些观众观看直播不是冲着技术，而是冲着他有趣的直播风格。有实力又有风格，这些都很重要，但更难得的是他一直很努力，他准时直播，积极互动，经常被熊猫评为月最佳主播。</p> <p><img src=\"http://p1.pstatp.com/large/pgc-image/8bdeea24ab1348ca85e46dfbd28746d5\" img_width=\"600\" img_height=\"400\" alt=\"熊猫主播Graysama与师维组队征战堡垒之夜，只因像嗨氏被躺喷？\" inline=\"0\"></p> <p>值得一提的是Graysama长相也十分可爱，很有网友直言和嗨氏很像，以至于在嗨氏丑闻和黑料被曝出后，有不少不明所以的观众前来黑他，说起来这很无奈，就连他自己都表示这锅背的很酸爽。但这也为他带来了不少的人气，希望他的直播能越做越好吧，因为有实力的人才不该被埋没。</p>   </div></div>";
$content = preg_replace('/article/', 'p', $content);
$content = preg_replace('/h(1|2|3){1}>/', 'p>', $content);
$content = str_replace('div', 'p', $content);
$content = preg_replace('/(<p)[\s\S]*?(>)/', '$1$2', $content);
$content = preg_replace('/(<p>)\s*?\1\s*?\1/', '$1', $content);
// $content = format_tags($content);

// $res = check_img($content);
// var_dump($res);die;
// $content = img_url_local($content);
echo $content;die;

// 处理图片
$content = '<img style="width: auto;" alt_src="http://php-study.test/uploads/181123/0ac6a0e57244f643ba4a1a5c85f13ffe.jpg">';
$content = preg_replace('/<img[\s\S]*?src/', '<img src', $content);
echo $content;die;

$arr = range(1, 20);
foreach ($arr as $v) {
    $url = 'http://47.244.140.215:8091/feeds/toutiao?pageNo='.$v.'&num=20';

    $json = file_get_contents($url);

    $data = json_decode($json, true);

    // print_r($data);die;

    foreach ($data['articles'] as $value) {
        $id = $value['newsId'];
        $title = $value['title'];
        $url = $value['real_url'];

        // $html = file_get_contents($url);

        $html = phpQuery::newDocumentFile($url);
        $content = $html->find('div[class="article-content"]')->html();
        $content = str_replace('alt_src', 'src', $content);
        $content = preg_replace('/<script[\s\S]*?<\/script>/', '', $content);
        $content = preg_replace('/<div[\s\S]*?style=\"display:none\"[\s\S]*?<\/div>/', '', $content);
        $content = img_url_local($content);
        echo $content . "<br>";
        $content = $value['content'];
        $cate = $value['category'];
    }
}
