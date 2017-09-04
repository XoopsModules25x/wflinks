<?php
/**
 * $Id: modinfo.php 10066 2012-08-13 09:22:47Z beckmi $
 * Module: WF-links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 * Format: UTF-8
 */

// Module Info
// The name of this module
define('_MI_WFL_NAME', 'WF-Links');

// A brief description of this module
define('_MI_WFL_DESC', 'Создает раздел ссылок, в котором пользователи могут связывать/отправлять/оценивать различные ссылки.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_WFL_BNAME1', 'Последний WF-Links');
define('_MI_WFL_BNAME2', 'Верхний WF-Links');

// Sub menu titles
define('_MI_WFL_SMNAME1', 'Отправить');
define('_MI_WFL_SMNAME2', 'Популярный');
define('_MI_WFL_SMNAME3', 'Самые популярные');
define('_MI_WFL_SMNAME4', 'Последние объявления');

// Names of admin menu items
define('_MI_WFL_BINDEX', 'Администратор');
define('_MI_WFL_INDEXPAGE', 'Главная страница');
define('_MI_WFL_MCATEGORY', 'Категории');
define('_MI_WFL_MLINKS', 'Управление ссылками');
define('_MI_WFL_MUPLOADS', 'Загрузка изображений');
define('_MI_WFL_PERMISSIONS', 'Права доступа');
define('_MI_WFL_BLOCKADMIN', 'Настройки блока');
define('_MI_WFL_MVOTEDATA', 'Голосование');

// Title of config items
define('_MI_WFL_POPULAR', 'Популярные ссылки:');
define('_MI_WFL_POPULARDSC', 'Количество просмотров до статуса ссылки будет считаться популярной.');

//Display Icons
define('_MI_WFL_ICONDISPLAY', 'Ссылки популярные и новые:');
define('_MI_WFL_DISPLAYICONDSC', 'Выберите способ отображения популярных и новых значков в списке ссылок.');
define('_MI_WFL_DISPLAYICON1', 'Показать как значки');
define('_MI_WFL_DISPLAYICON2', 'Показать как текст');
define('_MI_WFL_DISPLAYICON3', 'Не показывать');

define('_MI_WFL_DAYSNEW', 'Новые ссылки:');
define('_MI_WFL_DAYSNEWDSC', 'Количество дней, когда статус ссылки будет считаться новым.');
define('_MI_WFL_DAYSUPDATED', 'Обновленные ссылки:');
define('_MI_WFL_DAYSUPDATEDDSC', 'Количество дней, когда статус ссылки будет считаться обновленным.');

define('_MI_WFL_PERPAGE', 'Количество ссылок:');
define('_MI_WFL_PERPAGEDSC', 'Количество ссылок для отображения в каждом списке категорий.');

define('_MI_WFL_USESHOTS', 'Показать снимки экрана?');
define('_MI_WFL_USESHOTSDSC', 'Выберите «Да» для отображения снимков экрана для каждого элемента ссылки.');
define('_MI_WFL_SHOTWIDTH', 'Ширина изображения');
define('_MI_WFL_SHOTWIDTHDSC', 'Ширина для снимка экрана');
define('_MI_WFL_SHOTHEIGHT', 'Высота изображения');
define('_MI_WFL_SHOTHEIGHTDSC', 'Высота для снимка экрана');
define('_MI_WFL_CHECKHOST', 'Запретить прямую ссылку? (leeching)');
define('_MI_WFL_REFERERS', 'Эти сайты могут напрямую ссылаться на Ваши ссылки <br />Разделять - #');
define('_MI_WFL_ANONPOST', 'Отправка анонимными пользователями:');
define('_MI_WFL_ANONPOSTDSC', 'Разрешить анонимным пользователям отправлять или загружать на сайт?');
define('_MI_WFL_AUTOAPPROVE', 'Авто одобрение оправленных ссылок');
define('_MI_WFL_AUTOAPPROVEDSC', 'Выберите, чтобы одобрить представленные ссылки без проверки.');

define('_MI_WFL_MAXFILESIZE', 'Размер загрузки (KB)');
define('_MI_WFL_MAXFILESIZEDSC', 'Максимальный размер файла, разрешенный при загрузке.');
define('_MI_WFL_IMGWIDTH', 'Ширина изображения');
define('_MI_WFL_IMGWIDTHDSC', 'Максимальная ширина изображения разрешена при загрузке ссылки');
define('_MI_WFL_IMGHEIGHT', 'Высота изображения');
define('_MI_WFL_IMGHEIGHTDSC', 'Максимальная высота изображения разрешена при загрузке ссылки');

define('_MI_WFL_UPLOADDIR', 'Каталог для загрузки (без конечной косой черты)');
define('_MI_WFL_ALLOWSUBMISS', 'Пользовательские материалы:');
define('_MI_WFL_ALLOWSUBMISSDSC', 'Разрешить пользователям отправлять новые ссылки');
define('_MI_WFL_ALLOWUPLOADS', 'Пользовательские загрузки:');
define('_MI_WFL_ALLOWUPLOADSDSC', 'Разрешить пользователям загружать ссылки прямо на Ваш сайт.');
define('_MI_WFL_SCREENSHOTS', 'Каталог для загрузки скриншотов');
define('_MI_WFL_CATEGORYIMG', 'Каталог для загрузки изображений категорий');
define('_MI_WFL_MAINIMGDIR', 'Каталог для загрузки изображений');
define('_MI_WFL_USETHUMBS', 'Использование эскизов:');
define('_MI_WFL_USETHUMBSDSC', "Поддерживаемые типы ссылок: JPG, GIF, PNG.<div style='padding-top: 8px;'>WF-Links будет использовать эскизы изображений. Установите значение «Нет», чтобы использовать исходное изображение сервера, не поддерживает этот параметр.</div>");
define('_MI_WFL_DATEFORMAT', 'Временная метка:');
define('_MI_WFL_DATEFORMATDSC', 'Марка времени по умолчанию для WF-links.<br />Подробнее <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');
define('_MI_WFL_SHOWDISCLAIMER', 'Показывать отказ от ответственности перед отправкой пользователем?');
define('_MI_WFL_SHOWDISCLAIMERDSC', 'Перед тем, как Пользователь может подать ссылку, показать правила входа?');
define('_MI_WFL_SHOWLINKDISCL', 'Показывать ссылку на отказ от ответственности?');
define('_MI_WFL_SHOWLINKDISCLDSC', 'Показывать ссылку, чтобы открыть ссылку?');
define('_MI_WFL_DISCLAIMER', 'Введите текст Отказ от ответственности. Текст:');
define('_MI_WFL_LINKDISCLAIMER', 'Введите ссылку Отказ от ответственности:');
define('_MI_WFL_SUBCATS', 'Подкатегории:');
define('_MI_WFL_SUBMITART', 'Отправить ссылки:');
define('_MI_WFL_SUBMITARTDSC', 'Выберите группы, которые могут отправлять новые ссылки.');
define('_MI_WFL_RATINGGROUPS', 'Рейтинг ссылок:');
define('_MI_WFL_RATINGGROUPSDSC', 'Выберите группы, которые могут оценивать ссылку.');
define('_MI_WFL_IMGUPDATE', 'Обновление эскизов?');
define('_MI_WFL_IMGUPDATEDSC', 'Если выбранные изображения эскизов будут обновляться при каждом рендеринге страницы, в противном случае будет использоваться первое изображение. <br /><br />');
define('_MI_WFL_QUALITY', 'Высокое качество эскизов:');
define('_MI_WFL_QUALITYDSC', 'Качество самого низкого: 0 Наибольший: 100');
define('_MI_WFL_KEEPASPECT', 'Соотношение сторон изображения?');
define('_MI_WFL_KEEPASPECTDSC', '');
define('_MI_WFL_ADMINPAGE', 'Количество ссылок:');
define('_MI_WFL_AMDMINPAGEDSC', 'Количество новых ссылок для отображения в области администрирования модуля.');
define('_MI_WFL_ARTICLESSORT', 'Ссылка по умолчанию:');
define('_MI_WFL_ARTICLESSORTDSC', 'Выберите порядок по умолчанию для списков ссылок.');
define('_MI_WFL_TITLE', 'Название');
define('_MI_WFL_RATING', 'Рейтинг');
define('_MI_WFL_WEIGHT', 'Вес');
define('_MI_WFL_POPULARITY', 'Популярность');
define('_MI_WFL_SUBMITTED2', 'Дата отправки');
define('_MI_WFL_COPYRIGHT', 'Уведомление об авторских правах:');
define('_MI_WFL_COPYRIGHTDSC', 'Выберите, чтобы отобразить уведомление об авторских правах на странице ссылок.');
// Description of each config items
define('_MI_WFL_SUBCATSDSC', 'Выберите «Да» для отображения подкатегорий. Выбор «Нет» будет скрывать подкатегории из списков');

// Text for notifications
define('_MI_WFL_GLOBAL_NOTIFY', 'Глобальный');
define('_MI_WFL_GLOBAL_NOTIFYDSC', 'Параметры уведомлений о глобальных ссылках.');
define('_MI_WFL_CATEGORY_NOTIFY', 'Категория');
define('_MI_WFL_CATEGORY_NOTIFYDSC', 'Параметры уведомления, которые относятся к текущей категории ссылок.');
define('_MI_WFL_LINK_NOTIFY', 'Ссылка');
define('_MI_WFL_FILE_NOTIFYDSC', 'Опции уведомления, которые применяются к текущей ссылке.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFY', 'Новая категория');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Уведомить меня, когда будет создана новая категория ссылок.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Получать уведомление при создании новой категории ссылок.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автообновление: новая категория ссылок');

define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFY', 'Изменить запрашиваемую ссылку');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYCAP', 'Сообщите мне о любом запросе изменения ссылки.');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYDSC', 'Получать уведомление при отправке любого запроса на изменение ссылки.');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автообновление: запрошена ссылка');

define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFY', 'Сломанная ссылка');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYCAP', 'Сообщите мне о сломанной ссылке.');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYDSC', 'Получать уведомление при отправке отчета о неработающих ссылках.');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автообновление: сообщается о неисправной ссылке');

define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFY', 'Ссылка предоставлена');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYCAP', 'Сообщите мне, когда будет отправлена ​​какая-либо новая ссылка (ожидающая утверждения).');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYDSC', 'Получать уведомление при отправке любой новой ссылки (в ожидании утверждения).');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автообновление: новая ссылка отправлена');

define('_MI_WFL_GLOBAL_NEWLINK_NOTIFY', 'Новая ссылка');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYCAP', 'Уведомить меня, когда будет размещена новая ссылка.');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYDSC', 'Получать уведомление при публикации любой новой ссылки.');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автообновление: Новая ссылка');

define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFY', 'Ссылка предоставлена');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Сообщите мне, когда новая ссылка будет отправлена ​​(ожидающая утверждения) в текущую категорию.');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Получать уведомление при отправке новой ссылки (ожидающей утверждения) в текущую категорию.');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автообновление: Новая ссылка, представленна в категории');

define('_MI_WFL_CATEGORY_NEWLINK_NOTIFY', 'Новая ссылка');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYCAP', 'Сообщите мне, когда новая ссылка будет отправлена ​​в текущую категорию.');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYDSC', 'Получать уведомление, когда новая ссылка отправляется в текущую категорию.');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автообновление: Новое в категории');

define('_MI_WFL_LINK_APPROVE_NOTIFY', 'Ссылка одобрена');
define('_MI_WFL_LINK_APPROVE_NOTIFYCAP', 'Уведомить меня, когда эта ссылка одобрена.');
define('_MI_WFL_LINK_APPROVE_NOTIFYDSC', 'Получать уведомление, когда эта ссылка одобрена.');
define('_MI_WFL_LINK_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} автообновление: ссылка одобрена');

define('_MI_WFL_AUTHOR_INFO', 'Информация для разработчиков');
define('_MI_WFL_AUTHOR_NAME', 'Разработчик');
define('_MI_WFL_AUTHOR_DEVTEAM', 'Команда разработчиков');
define('_MI_WFL_AUTHOR_WEBSITE', 'Сайт разработчика');
define('_MI_WFL_AUTHOR_EMAIL', 'Электронная почта разработчика');
define('_MI_WFL_AUTHOR_CREDITS', 'Кредиты');
define('_MI_WFL_MODULE_INFO', 'Информация о развитии модуля');
define('_MI_WFL_MODULE_STATUS', 'Статус разработки');
define('_MI_WFL_MODULE_DEMO', 'Демо-сайт');
define('_MI_WFL_MODULE_SUPPORT', 'Официальный сайт поддержки');
define('_MI_WFL_MODULE_BUG', 'Сообщить об ошибке для этого модуля');
define('_MI_WFL_MODULE_FEATURE', 'Предложите новую функцию для этого модуля');
define('_MI_WFL_MODULE_DISCLAIMER', 'Отказ от ответственности');
define('_MI_WFL_RELEASE', 'Дата выпуска: ');

define('_MI_WFL_MODULE_MAILLIST', 'WF-Project списки рассылки');
define('_MI_WFL_MODULE_MAILANNOUNCEMENTS', 'Список рассылки объявлений');
define('_MI_WFL_MODULE_MAILBUGS', 'Список рассылки ошибок');
define('_MI_WFL_MODULE_MAILFEATURES', 'Список рассылки');
define('_MI_WFL_MODULE_MAILANNOUNCEMENTSDSC', 'Получите последние объявления от WF-Project.');
define('_MI_WFL_MODULE_MAILBUGSDSC', 'Отслеживания ошибок');
define('_MI_WFL_MODULE_MAILFEATURESDSC', 'Запросить новых функций.');

define('_MI_WFL_WARNINGTEXT', 'ПРОГРАММНОЕ ОБЕСПЕЧЕНИЕ ПРЕДОСТАВЛЯЕТСЯ WF-PROJECTS "КАК ЕСТЬ" И "СО ВСЕМИ НЕДОСТАТКАМИ."
WF-PROJECTS MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND CONCERNING
THE QUALITY, SAFETY OR SUITABILITY OF THE SOFTWARE, EITHER EXPRESS OR
IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.
FURTHER, WF-PROJECTS MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE TRUTH,
ACCURACY OR COMPLETENESS OF ANY STATEMENTS, INFORMATION OR MATERIALS
CONCERNING THE SOFTWARE THAT IS CONTAINED IN WF-Project WEBSITE. IN NO
EVENT WILL WF-PROJECTS BE LIABLE FOR ANY INDIRECT, PUNITIVE, SPECIAL,
INCIDENTAL OR CONSEQUENTIAL DAMAGES HOWEVER THEY MAY ARISE AND EVEN IF
WF-PROJECT HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGES..');

define('_MI_WFL_AUTHOR_CREDITSTEXT', 'Команда WF-Projects хотела бы поблагодарить следующих людей за их помощь и поддержку на этапе разработки этого модуля.<br /></br />EdStacey, maumed, banned, krobi, Pnooka, MarcoFr, cosmodrum, placebo333, GibaPhp');
define('_MI_WFL_AUTHOR_BUGFIXES', 'История ошибок');

define('_MI_WFL_COPYRIGHT2', 'Авторские права');
define(
    '_MI_WFL_COPYRIGHTIMAGE',
       'Если не указано иное, этот модуль (WF-Links) и его изображения являются авторскими правами команды WF-Projects.<br /><br />У Вас есть разрешение на копирование, редактирование и изменение WF-Links в соответствии с вашими личными требованиями. Вы соглашаетесь не изменять, не адаптировать и не распространять исходный код Программного обеспечения без прямого разрешения команды WF-Projects.<br /><br />PageRank является товарным знаком Google Inc.'
);

define('_MI_WFL_SELECTFORUM', 'Выберите форум:');
define('_MI_WFL_SELECTFORUMDSC', 'Выберите форум, который Вы установили, и будете использовать с WF-Links.');

define('_MI_WFL_DISPLAYFORUM1', 'Newbb (all)');
define('_MI_WFL_DISPLAYFORUM2', 'IPB Forum');
define('_MI_WFL_DISPLAYFORUM3', 'PHPBB2 Module');

// added by McDonald
define('_MI_WFL_COUNTRY', 'Страна:');
define('_MI_WFL_EDITOR', 'Редактор для использования (admin):');
define('_MI_WFL_EDITORCHOICE', 'Выберите редактор, который будет использоваться для администратора. Если у вас есть «простая» установка (Например, вы используете только редактор ядра XOOPS, который предоставляется в стандартном базовом пакете xoops), то Вы можете просто выбрать DHTML и Compact');
define('_MI_WFL_EDITORUSER', 'Редактор для использования (пользователь):');
define('_MI_WFL_EDITORCHOICEUSER', 'Выберите редактор для использования пользователем. Если у вас есть «простая» установка (Например, вы используете только редактор ядра XOOPS, который предоставляется в стандартном базовом пакете xoops), то Вы можете просто выбрать DHTML и Compact');
define('_MI_WFL_FORM_DHTML', 'DHTML');
define('_MI_WFL_FORM_COMPACT', 'Compact');
define('_MI_WFL_FORM_SPAW', 'Spaw Editor');
define('_MI_WFL_FORM_HTMLAREA', 'HtmlArea Editor');
define('_MI_WFL_FORM_FCK', 'FCK Editor');
define('_MI_WFL_FORM_KOIVI', 'Koivi Editor');
define('_MI_WFL_FORM_INBETWEEN', 'Inbetween');
define('_MI_WFL_FORM_TINYEDITOR', 'TinyEditor');
define('_MI_WFL_FORM_TINYMCE', 'TinyMCE');
define('_MI_WFL_FORM_DHTMLEXT', 'DHTML Extended');
define('_MI_WFL_SORTCATS', 'Сортировать категории по:');
define('_MI_WFL_SORTCATSDSC', 'Выберите способ сортировки категорий и подкатегорий.');
define('_MI_WFL_KEYLENGTH', 'Введите max. кол-во символов для мета ключевых слов:');
define('_MI_WFL_KEYLENGTHDSC', 'Значение по умолчанию - 255 символов.');
define('_MI_WFL_OTHERLINKS', 'Показать другие ссылки, отправленные пользователем?');
define('_MI_WFL_OTHERLINKSDSC', 'Выберите, будут ли отображаться другие ссылки отправителя.');
define('_MI_WFL_TOTALCHARS', 'Укажите общее количество символов для описания?');
define('_MI_WFL_TOTALCHARSDSC', 'Установите общее количество символов для описания в категории.');
define('_MI_WFL_QUICKVIEW', 'Включить быстрый просмотр?');
define('_MI_WFL_QUICKVIEWDSC', 'Это включает/выключает быстрый просмотр.');
define('_MI_WFL_ICONS_CREDITS', 'Иконки по');
define('_MI_WFL_SHOWSBOOKMARKS', 'Показать социальные закладки?');
define('_MI_WFL_SHOWSBOOKMARKSDSC', 'Выберите «Да», если вы хотите, чтобы значки социальных закладок отображались в статье.');
define('_MI_WFL_SHOWPAGERANK', 'Показать Google PageRank?');
define('_MI_WFL_SHOWPAGERANKSDSC', 'Выберите «Да», если вы хотите показать Google PageRank .');
define('_MI_WFL_USERTAGDESCR', 'Пользователь может отправлять теги:');
define('_MI_WFL_USERTAGDSC', 'Выберите Да, если пользователю разрешено отправлять теги.');

// Version 1.05 RC5
define('_MI_WFL_DATEFORMATADMIN', 'Временная шкала в админ:');
define('_MI_WFL_DATEFORMATADMINDSC', 'По умолчанию административная временная шкала WF-Links<br />Подробнее <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');
define('_MI_WFL_USEADDRESSDESCR', 'Использовать параметры адреса и карты?');
define('_MI_WFL_USEADDRESSDSC', 'Выберите «Да», чтобы использовать функцию адреса и карт.');
define('_MI_WFL_HEADERPRINT', '[ОПЦИИ ПЕЧАТИ] Заголовок страницы для печати');
define('_MI_WFL_HEADERPRINTDSC', 'Заголовок, который будет напечатан для каждой ссылки');
define('_MI_WFL_LOGOURLPRINT', '[ОПЦИИ ПЕЧАТИ] url лого для печати');
define('_MI_WFL_LOGOURLDSCPRINT', 'URL-адрес логотипа, который будет напечатан в верхней части страницы');
define('_MI_WFL_FOOTERPRINT', '[ОПЦИИ ПЕЧАТИ] Печать нижнего колонтитула страницы');
define('_MI_WFL_FOOTERPRINTDSC', 'Нижний колонтитул, который будет напечатан для каждой ссылки');
define('_MI_WFL_BNAME3', 'WF-Links Спонсорская статистика');
define('_MI_WFL_VCARD_CREDITS', 'Скрипт vCard');

// Version 1.05 RC6
define('_MI_WFL_FLAGIMG', 'Каталог изображений флагов стран');
define('_MI_WFL_FLAGIMGDSC', 'Введите URL-адрес без завершающей косой черты');
define('_MI_WFL_CATEGORYIMGDSC', 'Введите URL-адрес без завершающей косой черты');
define('_MI_WFL_SCREENSHOTSDSC', 'Введите URL-адрес без завершающей косой черты');
define('_MI_WFL_MAINIMGDIRDSC', 'Введите URL-адрес без завершающей косой черты');
define('_MI_WFL_USEAUTOSCRSHOT', 'Использовать автоматический снимок экрана');
define('_MI_WFL_USEAUTOSCRSHOTDSC', 'Это автоматически создаст скриншот, основанный на URL-адресе. Это завышает загруженные скриншоты и может не работать для всех веб-сайтов.');
define('_MI_WFL_MOZSHOT_CREDITS', 'Автоматический снимок экрана');
define('_MI_WFL_MOZSHOT_CREDITSTXT', '<a href="http://mozshot.nemui.org" target=_blank>Mozshot</a> (весь исходный код, предоставлен в <a href="http://www.ruby-lang.org/en/" target=_blank>Ruby</a> lisence)');

// Version 1.06 RC-1
define('_MI_WFL_BNAME4', 'Облако тегов WF-Links');
define('_MI_WFL_BNAME5', 'Лучшие теги WF-Links');

// Version 1.06 RC-3
define('_MI_WFL_DISPLAYFORUM4', 'Newbbex');
define('_MI_WFL_TITLE_A', 'Название (A)');
define('_MI_WFL_TITLE_D', 'Название (D)');
define('_MI_WFL_RATING_A', 'Рейтинг (A)');
define('_MI_WFL_RATING_D', 'Рейтинг (D)');
define('_MI_WFL_SUBMITTED_A', 'Дата подачи (A)');
define('_MI_WFL_SUBMITTED_D', 'Дата подачи (D)');
define('_MI_WFL_POPULARITY_A', 'Популярность (A)');
define('_MI_WFL_POPULARITY_D', 'Популярность (D)');
define('_MI_WFL_COUNTRY_A', 'Страна (A)');
define('_MI_WFL_COUNTRY_D', 'Страна (D)');

// Version 1.08

// Admin Summary
//define("_MI_WFL_SCATEGORY","Категория");
define('_MI_WFL_SNEWFILESVAL', 'Ожидающие проверки');
define('_MI_WFL_SMODREQUEST', 'Модифицированные');
//define("_MI_WFL_SREVIEWS","Отзывы: ");
define('_MI_WFL_SBROKENSUBMIT', 'Сломанные');
define('_MI_WFL_DOCUMENTATION', 'Документы');

define('_MI_WFL_ADD_LINK', 'Добавить ссылку');
define('_MI_WFL_ADD_CATEGORY', 'Добавить категорию');

//1.11 Beta 1
define('_MI_WFL_HELP_OVERVIEW', 'Обзор');
define('_MI_WFL_HELP_INSTALL', 'Установка');
define('_MI_WFL_HELP_UPDATE', 'Обновление');
define('_MI_WFL_HELP_CONVERT', 'Конвертировать');
define('_MI_WFL_HELP_PREFERENCES', 'Настройки');
define('_MI_WFL_HELP_INDEXPAGE', 'Главная страница');
define('_MI_WFL_HELP_CATEGORY', 'Управление категориями');
define('_MI_WFL_HELP_PERMISSION', 'Права доступа');
define('_MI_WFL_HELP_LINKS', 'Управление ссылками');

//1.11 Beta 2
define('_MI_WFL_DISPLAYFORUM5', 'X-Forum');

// The Directory of this module
define('_MI_WFL_DIRNAME', basename(dirname(dirname(__DIR__))));

// ----------------- Help -----------------

define('_MI_WFL_HELP_HEADER', __DIR__.'/help/helpheader.tpl');
define('_MI_WFL_BACK_2_ADMIN', 'Назад к администрации ');
define('_MI_WFL_OVERVIEW', 'Обзор');
define('_MI_WFL_HELP', 'Помощь');
define('_MI_WFL_HELP_DISCLAIMER', 'Disclaimer');
define('_MI_WFL_HELP_LICENSE', 'License');
define('_MI_WFL_HELP_SUPPORT', 'Support');
// Links
define('_MI_WFL_MLINKS_DESC', 'Используйте для создания, модификации и удаления ссылок.');
define('_MI_WFL_HELP_LINKS_DESCRIPTION', '
    Эта форма имеет следующие поля/опции:<br />
    <br />
    <span style="text-decoration: underline;"><b>Название ссылки</b></span><br />
    Введите здесь название для новой ссылки.<br />
    <br />
    <span style="text-decoration: underline;"><b>URL ссылки</b></span><br />
    Введите URL новой ссылки.<br />
    Щелкните значок глобуса, чтобы открыть вкладку/окно браузера с введенным URL. Вы можете использовать этот значок или кнопку, чтобы проверить URL-адрес.<br />
    <br />
    <span style="text-decoration: underline;"><b>Ссылка главная категория</b></span><br />
    Выберите основную категорию ссылки.<br />
    <br />
    <span style="text-decoration: underline;"><b>Описание ссылки</b></span><br />
    Здесь Вы можете ввести описание новой ссылки.<br />
    <br />
    <span style="text-decoration: underline;"><b>Ключевые слова</b></span><br />
    В этом поле Вы можете ввести мета ключевые слова. Введите ключевые слова как: keyword1, keyword2, keyword3, ...<br />
    Максимальное количество символов может быть установлено в настройках.<br />
    <br />
    <span style="text-decoration: underline;"><b>Ссылка на скриншот</b></span><br />
    Снимок экрана должен быть действительной ссылкой изображения в каталоге uploads/images/screenshots (например, shot.gif).<br />
    Выберите «Показать без изображения», если вы не хотите отображать снимок экрана.<br />
    <br />
    <span style="text-decoration: underline;"><b>Google Maps, Yahoo Maps и Multimap</b></span><br />
    Эти три поля могут использоваться для ввода URL-адреса на онлайн-карту.<br />
    Щелкните соответствующий значок за полем, чтобы открыть новую вкладку/окно в браузере. <br />
    URL-адрес, используемый для этого действия, - это URL-адрес, введенный в поле. <br />
    Вы можете использовать эти значки или кнопки для проверки или изменения введенного URL-адреса карты.<br />
    <br />
    <span style="text-decoration: underline;"><b>Поля адреса</b></span><br />
    Используйте эти поля для добавления контактной информации в ссылку. Способ форматирования адреса основывается на выбранной стране.<br />
    Если Вам нужен другой формат адреса, Вам нужно изменить файл ../include/address.php<br />
    Для форматов адресов см. Веб-сайт Всемирного почтового союза.<br />
    Адреса электронной почты могут быть введены двумя способами:<br />
    <br />
    <ul>
     <li>name@address.com</li>
     <li>mailto:name@address.com</li>
    </ul>
    <br />
    Оба формата электронной почты автоматически преобразуются в: имя AT адрес DOT com<br />
    <br />
    <span style="text-decoration: underline;"><b>Установить дату публикации</b></span><br />
    Введите дату и время публикации ссылки.<br />
    <br />
    <span style="text-decoration: underline;"><b>Дата истечения срока действия ссылки</b></span><br />
    Используйте параметры здесь, чтобы установить дату истечения срока действия ссылки. Ссылка больше не будет видна для посетителей.<br />
    Этот параметр также можно использовать для удаления даты истечения срока действия.<br />
    <br />
    <span style="text-decoration: underline;"><b>Установить ссылку в автономном режиме</b></span><br />
    Выберите «Да», чтобы установить связь в автономном режиме. Ссылка больше не будет доступна для посетителей.<br />
    По умолчанию: Нет<br />
    <br />
    <span style="text-decoration: underline;"><b>Установить статус ссылки как обновленный</b></span><br />
    Выберите «Да», чтобы установить ссылку как обновленную. Рядом с названием ссылки появится значок, чтобы уведомить посетителей о том, что содержимое этой ссылки было изменено.<br />
    По умолчанию: Нет<br />
    <br />
    <span style="text-decoration: underline;"><b>Добавить обсудить в этом форуме</b></span><br />
    При выборе форума используйте значок для обсуждения ссылки на этом форуме.<br />
    <br />
    <span style="text-decoration: underline;"><b>Отправить новую ссылку в качестве пункта новостей*</b></span><br />
    Выберите «Да», чтобы отправить новую ссылку в виде статьи в модуле «Новости».<br />
    По умолчанию: Нет<br />
    <br />
    <span style="text-decoration: underline;"><b>Выберите категорию новостей для отправки*</b></span><br />
    Выберите категорию новостей для отправки статьи.<br />
    <br />
    <span style="text-decoration: underline;"><b>Название новости*</b></span><br />
    Дайте заголовок для статьи или оставьте пустым, чтобы использовать название ссылки.<br />
    <br />
    <br />
    * Эти поля появляются, когда модуль новостей установлен.
');
// Category
define('_MI_WFL_MCATEGORY_DESC', 'Управление категориями состоит из 2 разделов, один для изменения существующей категорий и один для создания новой категории.');
define('_MI_WFL_HELP_CATEGORY_DESCRIPTION', '
    <h4>Изменить категорию</h4>
    Выберите категорию из меню выбора и нажмите одну из трех кнопок: Изменить, Переместить ссылки или Удалить.<br />
    <br />
    <b>Изменить</b><br />
    Это откроет страницу со всеми настройками выбранной категории, чтобы Вы могли внести в нее изменения.<br />
    <br />
    <b>Переместить ссылки</b><br />
    С помощью кнопки «Переместить ссылки» вы можете перемещать все ссылки из категории в другую категорию.<br />
    Выберите категорию и эту кнопку. На следующей странице выберите категорию назначения и нажмите «Переместить ссылки», чтобы переместить все ссылки.<br />
    Если Вы решите не продолжать эту операцию, нажмите кнопку «Отмена».<br />
    <em><i><b>Заметка</b>: Перемещение ссылок из одной категории в другую не может быть отменено!</i></em><br />
    <br />
    <b>Удалить</b><br />
    Если вы хотите удалить категорию, используйте кнопку «Удалить».<br />
    <em><i><b>Заметка</b>: Это также удалит категории и ВСЕ ссылки и комментарии. Эта операция не может быть отменена!</i></em><br />
    <h4>Создать новую категорию</h4>
    Перейдите сюда для создания новой категории.<br />
    <br />
    <b>Название категории</b><br />
    Введите название для новой категории.<br />
    Здесь Вы должны ввести заголовок, иначе он не может быть сохранен в базе данных.<br />
    <br />
    <b>Вес категории</b><br />
    Введите вес для сортировки нескольких категорий. Вы можете пропустить это (оставьте его 0), если Вы настроили сортировку категорий по заголовкам в настройках.<br />
    <br />
    <b>Установить как подкатегорию</b><br />
    Выберите категорию, которая будет выступать в качестве основной категории для новой категории.<br />
    <br />
    <b>Выберите категорию</b><br />
    Выберите изображение для категории. Для выбора изображения категории по умолчанию выберите «Показать без изображения».<br />
    <br />
    <b>Описание категории</b><br />
    Введите описание для категории.<br />
    <br />
    <b>Выберите категорию спонсора</b><br />
    Выберите клиента для поддержки категории. Вы можете создавать клиентов в разделе «Баннеры панели управления».<br />
    Если Вы выберете клиента, чем идентификатор баннера (следующая настройка), он не будет сохранен.<br />
    <br />
    <b>Выберите идентификатор баннера</b><br />
    Выберите идентификатор определенного баннера для отображения над категорией.<br />
    <br />
');
// Index Page
define('_MI_WFL_INDEXPAGE_DESC', 'Здесь вы можете настроить «внешний вид» главной страницы WF-Links.');
define('_MI_WFL_HELP_INDEXPAGE_DESCRIPTION', '
    Вы можете выбрать логотип для отображения над каждой страницей, задать заголовок, описание и нижний колонтитул.<br /><br />Внизу 2 специальных
    настройки для отображения последних представленных x ссылок в комплекте с разбивкой по страницам:<br /><br />
    <b>Показать последние объявления</b><br />
    Выберите «Да», чтобы отобразить последние ссылки на главной странице.<br />По умолчанию:
    Нет<br /><br /><b>Сколько ссылок для показа</b><br />
    Дайте общее количество новых ссылок для отображения. Количество ссылок, отображаемых на странице, зависит от параметра «Количество ссылок» в
    настройках.<br />При настройках по умолчанию это означает 10 ссылок на страницу и 5 страниц.<br />
    Значение 0 отключит эту функцию.<br />По умолчанию: 50
');
// Permission
define('_MI_WFL_PERMISSIONS_DESC', 'Здесь Вы можете установить следующие разрешения для категорий для каждой группы пользователей');
define('_MI_WFL_HELP_PERMISSION_DESCRIPTION', '
    <b>Разрешения категории</b><br />
    Выберите здесь категории, которые разрешено просматривать каждой группе.<br />
    <br />
    <b>Разрешения для отправки</b><br />
    Выберите группы, которые могут отправлять новые ссылки на выбранные категории.<br />
    <br />
    <b>Группы модераторов</b><br />
    Выберите группы, у которых есть привилегии модератора для выбранных категорий.<br />
    <br />
    <b>Автоподтверждение ссылок</b><br />
    Выберите группы, в которых будут автоматически разрешены новые ссылки без вмешательства администратора.<br />
    <br />
    <b>Разрешения на голосование</b><br />
    Выберите группы, которые могут оценивать ссылку в выбранных категориях.
');
// Convert
define('_MI_WFL_CONVERT_DESC', '');
define('_MI_WFL_HELP_CONVERT_DESCRIPTION', '
    <span style="background-color: #ffff99;">Инструкции для преобразования из myLinks в WF-Links.</span><br /><span style="background-color: #ffff99;">Если Вы хотите сделать новую установку WF-Links, выберите «Установить».</span><br /><br /><b><span style="color: #ff0000;">Помните: всегда рекомендуется создавать резервную копию базы данных перед установкой любых модулей.</span></b><br />
    <h4>Преобразование из Xoops myLinks/webLinks ==&gt; WF-Links</h4>
    <p><br />Заметка: При выполнении преобразования скрипт обновления преобразует таблицы myLinks/webLinks в базу данных в таблицы WF-Links. После преобразования Вы не можете использовать myLinks/webLinks
        Потому что в этом случае отсутствуют таблицы. Если Вы хотите, чтобы Ваши myLinks/webLinks работали, Вам нужно было бы создать резервные копии таблиц myLinks/webLinks, прежде чем Вы начнете их обновлять и восстанавливать
        после этого. Возможно одновременное использование WF-Links и myLinks/webLinks (хотя мы не знаем, почему Вы этого не сделаете). <br /><br /><b>1) Сделайте резервную копию</b></p>
    <p><span style="color: #000000; ">&nbsp; &nbsp; Резервное копирование таблиц myLinks/webLinks из базы данных<br /><br /></span><b>2) Загрузите модуль на свой сайт</b></p>
    <p>&nbsp; &nbsp; &nbsp;Загрузите папку «modules» и «uploads» {xoops-rootdirectory}<br /><br /></p>
    <p><b>3) Изменение и проверка прав доступа к папке</b><br /><br />CHMOD следующие папки 777:</p>
    <p><br /><em>{xoops-rootdirectory}/uploads/images</em><br /><em>{xoops-rootdirectory}/uploads/images/category</em><br /><em>{xoops-rootdirectory}/uploads/images/category/thumbs</em><br /><em>{xoops-rootdirectory}/uploads/images/flags</em><br /><em>{xoops-rootdirectory}/uploads/images/flags/flags_small</em><br /><em>{xoops-rootdirectory}/uploads/images/screenshots</em><br /><em>{xoops-rootdirectory}/uploads/images/screenshots/thumbs</em><br /><em>{xoops-rootdirectory}/uploads/images/thumbs</em><br /><br /><b>4)
        Установка модуля</b></p>
    <p>&nbsp; &nbsp; &nbsp;Войдите как администратор и войдите на страницу администрирования Xoops. Select System --&gt; модули и установить WF-Links<br /><br /><b>5) Запустите сценарий конвертации</b></p>
    <ul>
        <li>Направьте свой браузер на {xoops-rootdirectory}/modules/wflinks/update.php и выполнить сценарий обновления.</li>
        <li>Следуйте инструкциям, приведенным во время процедуры установки.</li>
        <li>Сценарий попытается определить версию или версии myLinks или webLinks, которые Вы установили, и попытается ее обновить.</li>
    </ul><br />
    <p><b>6) Обновление модуля</b></p>
    <p>&nbsp; &nbsp;Вернуться к System --&gt; модули и обновления WF-Links, в противном случае шаблоны будут для предыдущей версии, и страницы будут отображаться правильно.<br /><br /></p>
    <p><b>7) Настроить модуль</b></p>
    <p>&nbsp; &nbsp; В настоящее время наиболее важными являются установки групповых разрешений для модуля и его блоков через System --&gt; Группы<br /><br /><b>8) Восстановить или удалить myLinks/webLinks</b></p>
    <p>Если Вы хотите продолжить использование myLinks или webLinks в дополнение к WF-Links, восстановите таблицы myLinks/webLinks<br />из резервной копии, сделанной на шаге 1. Если Вы не хотите использовать эти
        модули деактивируйте старый модуль и удалите его.<br /><br /></p>
');
// Overview
define('_MI_WFL_OVERVIEW_DESC', '');
define('_MI_WFL_HELP_OVERVIEW_DESCRIPTION', '
    WF-Links - это модуль для XOOPS, который помогает Вам создать раздел ссылок с несколькими категориями и подкатегориями.<br/><br/>
    <p>
    Вот небольшой список предлагаемых функций:</p>
    <ul>
    	<li>Создайте несколько категорий и подкатегорий для своих ссылок</li>
    	<li>Разрешения на отправку по категориям</li>
    	<li>Разрешения на модерирование для каждой категории</li>
    	<li>Сначала выберите подтверждение отправки ссылок или получите их автоматически</li>
    	<li>Автоматическое утверждение для выбранных групп</li>
    	<li>Подтвердить ссылки</li>
    	<li>Добавьте (автоматические) скриншоты к своим ссылкам</li>
    	<li>Добавить описание к Вашим ссылкам</li>
    	<li>Добавить адрес вкл. Google Maps,Yahoo Maps and vCard</li>
    	<li>Опция печати</li>
    	<li>Разрешить оценки и комментарии пользователей для Ваших ссылок</li>
    	<li>Определите время публикации и истечения срока действия для каждой ссылки (необязательно)</li>
    	<li>И многое другое...</li>
    </ul>
    <br/>
    <h4 class="odd">Установка/удаление</h4><br/>
    Никаких специальных мер не требуется, следуйте стандартным процедурам установки,
    извлеките папку «wflinks» в каталог ../modules. Установите
    модуль через Admin -> System Module -> Modules. Если Вам нужно детальные
    инструкции по установке модуля, см.
    <a href="http://goo.gl/adT2i">XOOPS Operations Manual</a>.<br/><br/>
    <h4 class="odd">Руководство</h4>
    <p class="even">На данный момент нет учебника.</p>
');
// Install
define('_MI_WFL_HELP_INSTALL1', 'Установка (новая установка)');
define('_MI_WFL_INSTALL_DESC', '');
define('_MI_WFL_HELP_INSTALL_DESCRIPTION', '
    <span style="background-color: #ffff99;">Эти инструкции предназначены для новой установки.</span><br /><span style="background-color: #ffff99;">Если Вы хотите конвертировать из myLinks/webLinks, выберите «Конвертировать» в меню.</span><br /><br /><span style="color: #ff0000;">Помните: всегда рекомендуется создавать резервную копию базы данных перед установкой любых модулей.</span><br /><br />
    <b>Новая установка WF-Links</b><br /><br />
    <b>1) Загрузите модуль на свой сайт</b><br /><br />
    Загрузите папки «modules/wflinks» и «uploads/images» на Ваш
    {xoops-rootdirectory}.<br /><br />
    Если Вы хотите переименовать папку «modules/wflinks», например, в «modules/weblinks», Вы должны сделать это, прежде чем продолжить установку.<br /><br />
    <b>2) Изменение и проверка прав доступа к папке</b><br /><br />
    Если это еще не сделано, CHMOD следующие папки 777:<br /><br />
    <em>{xoops-rootdirectory}/uploads/images</em><br />
    <em>{xoops-rootdirectory}/uploads/images/category</em><br />
    <em>{xoops-rootdirectory}/uploads/images/category/thumbs</em><br />
    <em>{xoops-rootdirectory}/uploads/images/flags</em><br />
    <em>{xoops-rootdirectory}/uploads/images/flags/flags_small</em><br />
    <em>{xoops-rootdirectory}/uploads/images/screenshots</em><br />
    <em>{xoops-rootdirectory}/uploads/images/screenshots/thumbs</em><br />
    <em>{xoops-rootdirectory}/uploads/images/thumbs</em><br /><br />
    <b>3) Установка модуля</b><br /><br />
    Войдите как администратор и войдите на страницу администрирования Xoops. Выбрать <em>System --&gt; modules</em> и установите WF-Links<br /><br />
    <b>4) Настройте модуль</b><br /><br />Наиболее важным шагом будет установка групповых разрешений для модуля и его блоков через <em>System --&gt; groups</em>
');
// Preferences
define('_MI_WFL_PREFERENCES_DESC', '');
define('_MI_WFL_HELP_PREFERENCES_DESCRIPTION', '
    Сначала мы заходим в настройки WF-Links.<br /><br /><br /><b>Популярные ссылки</b><br />Задайте здесь количество просмотров, необходимое для ссылки
    что бы считаться популярной.<br />По умолчанию: 100<br /><br /><b>Ссылки популярные и новые</b> <br />Здесь вы можете установить, как ссылка будет отображаться.<br />Существуют следующие
    опции:<br /><br />
    <ul>
        <li>Показать как значки</li>
        <li>Показать как текст</li>
        <li>Не показывать</li>
    </ul>
    <br />По умолчанию: Показать как значки<br /><br /><b>Новые ссылки</b><br />Количество дней, когда статус ссылки будет считаться новыми.<br />По умолчанию: 10<br /><br /><b>Обновленные ссылки</b><br />
    Количество дней, когда статус ссылки будет считаться обновленным.<br />По умолчанию: 10<br /><br /><b>Количество ссылок</b><br />Количество ссылок для отображения в каждом списке категорий.<br />По умолчанию:
    10<br /><br /><b>Количество ссылок</b><br />Количество новых ссылок для отображения в области администрирования модуля.<br />По умолчанию: 10<br /><br /><b>Ссылка по умолчанию</b><br />Выберите порядок по 
    умолчанию для списков ссылок.<br /><br />
    <ul>
        <li>Название</li>
        <li>Дата отправления</li>
        <li>Рейтинг</li>
        <li>Популярность</li>
        <li>Страна</li>
    </ul>
    <br />Каждый параметр может быть установлен на восходящий (A) или нисходящий (D).<br />По умолчанию: Название (A)<br /><br /><b>Сортировать категории по</b><br />Выберите способ сортировки категорий 
    и подкатегорий.<br /><br />
    <ul>
        <li>Название</li>
        <li>Вес</li>
    </ul>
    <br />По умолчанию: Название<br /><br /><b>Подкатегории</b><br />Выберите «Да» для отображения подкатегорий. Выбор «Нет» будет скрывать подкатегории из списков<br />По умолчанию: Нет<br /><br /><b>Редактор
    для использования (admin)</b><br />Выберите редактор, который будет использоваться для администратора.<br />Если у вас есть «простая» установка (Например, вы используете только редактор ядра XOOPS, который
    предоставляется в стандартном базовом пакете xoops), то Вы можете просто выбрать DHTML и Compact<br />При выборе DHTML это может быть отменено настройкой редактора по умолчанию в настройках ImpressCMS.<br />По умолчанию: DHTML<br /><br /><b>Редактор
    для использования (пользователь)</b><br />Выберите редактор для использования пользователем.<br />Если у вас есть «простая» установка (Например, вы используете только редактор ядра XOOPS, который предоставляется
    в стандартном базовом пакете xoops), то Вы можете просто выбрать DHTML и Compact<br />При выборе DHTML это может быть отменено настройкой редактора по умолчанию в настройках ImpressCMS.<br />По умолчанию: DHTML<br /><br /><b>Показать
    снимки экрана?</b><br />Выберите «Да» для отображения снимков экрана для каждого элемента ссылки.<br />По умолчанию: Да<br /><br /><b>Использование эскизов</b><br />Поддерживаемые типы ссылок: JPG, GIF, PNG.<br />WF-Links будет использовать
    эскизы изображений. Установите значение «Нет», чтобы использовать исходное изображение сервера, не поддерживает этот параметр.<br />По умолчанию: Нет<br /><br /><b>Обновление эскизов</b><br />Если выбранные изображения
    эскизов будут обновляться при каждом рендеринге страницы, в противном случае будет использоваться первое изображение.<br />По умолчанию: Yes<br /><br /><b>Высокое качество эскизов</b><br />Качество:<br /><br />
    <ul>
        <li>Низшее: 0</li>
        <li>Наибольшее: 100</li>
    </ul>
    <br />По умолчанию: 100<br /><br /><b>Соотношение сторон изображения</b><br />По умолчанию: Нет<br /><br /><b>Ширина изображения</b><br />Ширина для снимка экрана (px)<br />По умолчанию: 100<br /><br /><b>Высота  
    изображения</b><br />Высота для снимка экрана (px).<br />По умолчанию: 79<br /><br /><b>Размер загрузки (KB)</b><br />Максимальный размер файла, разрешенный при загрузке.<br />По умолчанию:
    200000<br /><br /><b>Ширина изображения</b><br />Максимальная ширина изображения разрешена при загрузке ссылки (px)<br />По умолчанию: 600<br /><br /><b>Высота изображения</b><br />Максимальная высота изображения 
    разрешена при загрузке ссылки (px).<br />По умолчанию: 600<br /><br /><b>Использовать автоматический снимок экрана</b><br />Это автоматически создаст скриншот, основанный на URL-адресе. Это завышает загруженные 
    скриншоты и может не работать для всех веб-сайтов.<br />По умолчанию: Нет<br /><br /><b>Каталог для загрузки изображений</b><br />Введите URL-адрес без завершающей косой черты<br />По умолчанию:
    modules/wflinks/images<br /><br /><b>Каталог для загрузки скриншотов</b><br />Введите URL-адрес без завершающей косой черты<br />По умолчанию: uploads/images/screenshots<br /><br /><b>Каталог для загрузки 
    изображений категорий</b><br />Введите URL-адрес без завершающей косой черты<br />По умолчанию: uploads/images/category<br /><br /><b>Каталог изображений флагов стран</b><br />Введите URL-адрес без 
    завершающей косой черты<br />По умолчанию: uploads/images/flags/flags_small<br /><br /><b>Временная метка</b><br />Марка времени по умолчанию для WF-links.<br />Здесь Вы можете настроить способ форматирования даты. Эта
    настройка не для блоков WF-Links.<br />Подробнее <a href="http://php.net/manual/en/function.date.php" target="_blank">PHP Manual.</a><br />По умолчанию: <em>D, d-M-Y</em><br /><br /><b>Временная 
    шкала в админ</b><br />По умолчанию административная временная шкала WF-Links<br />Здесь вы можете настроить способ форматирования даты для администрирования WF-Links.<br />Подробнее
    <a href="http://php.net/manual/en/function.date.php" target="_blank">PHP Manual.</a><br />По умолчанию: <em>D, d-M-Y - G:i</em><br /><br /><b>Укажите общее количество 
    символов для описания?</b><br />Установите общее количество символов для описания в категории.<br />По умолчанию: 200<br /><br /><b>Введите max. кол-во символов для мета ключевых слов</b><br />Это максимум
    количество символов, которые могут использоваться для мета-ключевых слов.<br />Подробнее <a href="http://en.wikipedia.org/wiki/Meta_element#The_keywords_attribute" target="_blank">Wikipedia </a>.<br />По умолчанию:
    255<br /><br /><b>Показать другие ссылки, отправленные пользователем</b><br />Выберите, будут ли отображаться другие ссылки отправителя.<br />По умолчанию: Да<br /><br /><b>Показать параметры 
    быстрого просмотра</b><br />Это включает/выключает параметры быстрого просмотра.<br />По умолчанию: Нет<br /><br /><b>Показать социальные закладки</b><br />Выберите «Да», если вы хотите, чтобы значки социальных закладок 
    отображались в статье.<br />По умолчанию: Да<br /><br /><b>Показать Google PageRank&trade;</b><br />Выберите «Да», если вы хотите показать Google PageRank&trade;.<br />По умолчанию: Да<br /><br /><b>Пользователь может 
    отправлять теги</b><br />Выберите Да, если пользователю разрешено отправлять теги.<br />Заметка: Необходимо установить модуль тегов, иначе форма не будет отображаться.<br />По умолчанию:
    Нет<br /><br /><b>Использовать параметры адреса и карты</b><br />Выберите «Да», чтобы использовать функцию адреса и карт.<br />По умолчанию: Да<br /><br /><b>Печать нижнего колонтитула страницы</b><br />Нижний колонтитул, который 
    будет напечатан для каждой ссылки<br />По умолчанию: &lt;website_url&gt;<br /><br /><b>url лого для печати</b><br />URL-адрес логотипа, который будет напечатан в верхней части страницы.<br />По умолчанию: &lt;website_url&gt;/modules/wflinks/assets/images/logo-en.gif<br /><br /><b>Показывать 
    отказ от ответственности перед отправкой пользователем</b><br />Перед тем, как Пользователь может подать ссылку, показать правила входа.<br />По умолчанию: Да<br /><br /><b>Введите текст Отказ от ответственности.</b><br />По умолчанию:
    We have the right, but not the obligation to monitor and review submissions submitted by users, in the forums. We shall not be responsible for any of the content of these messages. We further
    reserve the right, to delete, move or edit submissions that the we, in its exclusive discretion, deems abusive, defamatory, obscene or in violation of any Copyright or Trademark laws or otherwise
    objectionable.<br /><br /><b>Показывать ссылку на отказ от ответственности</b><br />Показывать ссылку, чтобы открыть ссылку<br />По умолчанию: Нет<br /><br /><b>Введите ссылку Отказ от ответственности</b><br />По умолчанию:
    The links on this site are provided as is without warranty either expressed or implied. linkloaded files should be checked for possible virus infection using the most up-to-date detection and
    security packages. If you have a question concerning a particular piece of software, feel free to contact the developer. We refuse liability for any damage or loss resulting from the use or misuse
    of any software offered from this site for linkloading. If you have any doubt at all about the safety and operation of software made available to you on this site, do not linkload it. Contact us
    if you have questions concerning this disclaimer.<br /><br /><b>Уведомление об авторских правах</b><br />Выберите, чтобы отобразить уведомление об авторских правах на странице ссылок.<br />По умолчанию: Да<br /><br /><b>Выберите 
    форум</b><br />Выберите форум, который вы установили, и будете использовать WF-Links.<br /><br />
    <ul>
        <li>Newbb</li>
        <li>IPB Forum</li>
        <li>PHPBB Module</li>
        <li>Newbbex</li>
    </ul>
    <br />По умолчанию: Newbb<br /><br /><b>Правила комментариев</b><br /><br />
    <ul>
        <li>Отключить комментарии</li>
        <li>Комментарии всегда одобрены</li>
        <li>Комментарии зарегистрированных пользователей всегда одобрены</li>
        <li>Все комментарии должны быть одобрены администраторами</li>
    </ul>
    <br />По умолчанию: Комментарии всегда одобрены<br /><br /><b>Разрешить анонимную запись в комментариях</b><br />По умолчанию: Нет<br /><br /><b>Включить уведомление</b><br />Этот модуль позволяет пользователям получать 
    уведомления при наступлении определенных событий. Выберите, если пользователи должны быть представлены параметры уведомлений в блоке (Block-style), в модуле 
    (Inline-style), или оба. Для получения уведомления block-style, блок параметров уведомлений должен быть включен для этого модуля.<br /><br />
    <ul>
        <li>Отключить уведомление</li>
        <li>Включить только block-style</li>
        <li>Включить только inline-syle</li>
        <li>Включить уведомление (both styles)</li>
    </ul>
    <br />По умолчанию: Включить уведомление (both styles)<br /><br /><b>Включение конкретных событий</b><br />Выберите, какие уведомления о событиях могут подписаться пользователи.<br /><br />
    <ul>
        <li>Глобальный : Новая категория</li>
        <li>Глобальный : Изменить запрашиваемую ссылку</li>
        <li>Глобальный : Неработающая ссылка</li>
        <li>Глобальный : Отправлена ссылка</li>
        <li>Глобальный : Новая ссылка</li>
        <li>Категория : Отправлена ссылка</li>
        <li>Категория : Новая ссылка</li>
        <li>Категория : Закладки</li>
        <li>Ссылка : Добавлен комментарий</li>
        <li>Ссылка : Отправлен комментарий</li>
        <li>Ссылка : Закладки</li>
    </ul>
    <br />По умолчанию: Все выбранные<br /><br /> <br />Нажмите Выполнить! чтобы сохранить настройки в базе данных.
');
// Update
define('_MI_WFL_UPDATE_DESC', '');
define('_MI_WFL_HELP_UPDATE_DESCRIPTION', '
    <h4>Обновление от WF-Links до версии 1.11</h4><br /><br /><ol>
    <li>Сделайте резервную копию таблиц базы данных WF-Links и резервной копии из папки ../modules/wflinks Вашего сервера.</li>
    <li>Удалите WF-Links.</li>
    <li>Перезапишите файлы на своем сервере новыми.</li>
    <li>Установите WF-Links.</li>
    <li>Восстановите таблицу базы данных из пункта 1</li>
    <li><strong>Обновить</strong> WF-Links из Администрирования модулей.</li>
    </ol>
');
// Support
define('_MI_WFL_SUPPORT_DESC', '');
define('_MI_WFL_HELP_SUPPORT_DESCRIPTION', '
    <span style="font-family: Arial, sans-serif; font-size: larger;  text-decoration: underline;">Для поддержки посетите наш форум:</span><br><br>
    <p><span style="font-family: Arial, sans-serif; font-size: 172%; "><a href="https://xoops.org/modules/newbb/viewforum.php?forum=28/" target="_blank">https://xoops.org/modules/newbb/</a><br></span>
    </p>
');
