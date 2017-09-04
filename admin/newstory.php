<?php
/**
 *
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

require_once XOOPS_ROOT_PATH . '/modules/news/class/class.newsstory.php';

$story = new NewsStory();
$story->setUid($xoopsUser->uid());
$story->setPublished(time());
$story->setExpired(0);
$story->setType('admin');
$story->setHostname(getenv('REMOTE_ADDR'));
$story->setApproved(1);
$topicid = (int)$_REQUEST['newstopicid'];
$story->setTopicId($topicid);
$story->setTitle($title);
$_linkid = (isset($lid) && $lid > 0) ? $lid : $newid;
$_link   = $_REQUEST['descriptionb'] . '<br><div><a href=' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?cid=' . $cid . '&amp;lid=' . $_linkid . '>' . $title . '</a></div>';

$description = $wfmyts->addSlashes(trim($_link));
$story->setHometext($description);
$story->setBodytext('');
$nohtml   = empty($nohtml) ? 0 : 1;
$nosmiley = empty($nosmiley) ? 0 : 1;
$story->setNohtml($nohtml);
$story->setNosmiley($nosmiley);
$story->store();
$notificationHandler = xoops_getHandler('notification');

$tags               = [];
$tags['STORY_NAME'] = $story->title();
$moduleHandler      = xoops_getHandler('module');
$newsModule         = $moduleHandler->getByDirname('news');
$tags['STORY_URL']  = XOOPS_URL . '/modules/news/article.php?storyid=' . $story->storyid();
if (!empty($isnew)) {
    $notificationHandler->triggerEvent('story', $story->storyid(), 'approve', $tags);
}
$notificationHandler->triggerEvent('global', 0, 'new_story', $tags);
unset($xoopsModule);
