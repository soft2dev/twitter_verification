<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "978560206002036736-jRFc2J00XLmZi6e73Zfg2sMnb2ORBQC",
    'oauth_access_token_secret' => "6CcucIvHwHJ1TEWyYIUwtopE9ay11hvwRT90zBOj1FfQX",
    'consumer_key' => "GuVsiHpAQIUdsQ4qCClEGLeZw",
    'consumer_secret' => "KNpulKdRlzd4IbhWNOgJh9uXnZMtCT566T0SowVOtf0LSkaZos"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => '@SenWeb', 
    'skip_status' => '1'
);

/** Perform a POST request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=@SenWeb';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
