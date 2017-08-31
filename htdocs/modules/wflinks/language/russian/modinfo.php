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
define("_MI_WFL_NAME","WF-Links");

// A brief description of this module
define("_MI_WFL_DESC","Создает раздел ссылок, в котором пользователи могут связывать/отправлять/оценивать различные ссылки.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_WFL_BNAME1","Последний WF-Links");
define("_MI_WFL_BNAME2","Верхний WF-Links");

// Sub menu titles
define("_MI_WFL_SMNAME1","Отправить");
define("_MI_WFL_SMNAME2","Популярный");
define("_MI_WFL_SMNAME3","Самые популярные");
define("_MI_WFL_SMNAME4","Последние объявления");

// Names of admin menu items
define("_MI_WFL_BINDEX","Администратор");
define("_MI_WFL_INDEXPAGE","Главная страница");
define("_MI_WFL_MCATEGORY","Категории");
define("_MI_WFL_MLINKS","Управление ссылками");
define("_MI_WFL_MUPLOADS","Загрузка изображений");
define("_MI_WFL_PERMISSIONS","Настройки прав доступа");
define("_MI_WFL_BLOCKADMIN","Настройки блока");
define("_MI_WFL_MVOTEDATA","Голосов");

// Title of config items
define('_MI_WFL_POPULAR','Популярные ссылки:');
define('_MI_WFL_POPULARDSC','Количество просмотров до статуса ссылки будет считаться популярной.');

//Display Icons
define("_MI_WFL_ICONDISPLAY","Ссылки популярные и новые:");
define("_MI_WFL_DISPLAYICONDSC","Выберите способ отображения популярных и новых значков в списке ссылок.");
define("_MI_WFL_DISPLAYICON1","Показать как значки");
define("_MI_WFL_DISPLAYICON2","Показать как текст");
define("_MI_WFL_DISPLAYICON3","Не показывать");

define("_MI_WFL_DAYSNEW","Новые ссылки:");
define("_MI_WFL_DAYSNEWDSC","Количество дней, когда статус ссылки будет считаться новым.");
define("_MI_WFL_DAYSUPDATED","Обновленные ссылки:");
define("_MI_WFL_DAYSUPDATEDDSC","Количество дней, когда статус ссылки будет считаться обновленным.");

define('_MI_WFL_PERPAGE','Количество ссылок:');
define('_MI_WFL_PERPAGEDSC','Количество ссылок для отображения в каждом списке категорий.');

define('_MI_WFL_USESHOTS','Показать снимки экрана?');
define('_MI_WFL_USESHOTSDSC','Выберите «Да» для отображения снимков экрана для каждого элемента ссылки.');
define('_MI_WFL_SHOTWIDTH','Ширина изображения');
define('_MI_WFL_SHOTWIDTHDSC','Ширина для снимка экрана');
define('_MI_WFL_SHOTHEIGHT','Высота изображения');
define('_MI_WFL_SHOTHEIGHTDSC','Высота для снимка экрана');
define('_MI_WFL_CHECKHOST','Запретить прямую ссылку? (leeching)');
define('_MI_WFL_REFERERS','Эти сайты могут напрямую ссылаться на Ваши ссылки <br />Разделять - #');
define("_MI_WFL_ANONPOST","Отправка анонимными пользователями:");
define("_MI_WFL_ANONPOSTDSC","Разрешить анонимным пользователям отправлять или загружать на сайт?");
define('_MI_WFL_AUTOAPPROVE','Авто одобрение оправленных ссылок');
define('_MI_WFL_AUTOAPPROVEDSC','Выберите, чтобы одобрить представленные ссылки без проверки.');

define('_MI_WFL_MAXFILESIZE','Размер загрузки (KB)');
define('_MI_WFL_MAXFILESIZEDSC','Максимальный размер файла, разрешенный при загрузке.');
define('_MI_WFL_IMGWIDTH','Ширина изображения');
define('_MI_WFL_IMGWIDTHDSC','Максимальная ширина изображения разрешена при загрузке ссылки');
define('_MI_WFL_IMGHEIGHT','Высота изображения');
define('_MI_WFL_IMGHEIGHTDSC','Максимальная высота изображения разрешена при загрузке ссылки');

define('_MI_WFL_UPLOADDIR','Каталог для загрузки (без конечной косой черты)');
define('_MI_WFL_ALLOWSUBMISS','Пользовательские материалы:');
define('_MI_WFL_ALLOWSUBMISSDSC','Разрешить пользователям отправлять новые ссылки');
define('_MI_WFL_ALLOWUPLOADS','Пользовательские загрузки:');
define('_MI_WFL_ALLOWUPLOADSDSC','Разрешить пользователям загружать ссылки прямо на Ваш сайт.');
define('_MI_WFL_SCREENSHOTS','Каталог для загрузки скриншотов');
define('_MI_WFL_CATEGORYIMG','Каталог для загрузки изображений категорий');
define('_MI_WFL_MAINIMGDIR','Каталог для загрузки изображений');
define('_MI_WFL_USETHUMBS','Использование эскизов:');
define("_MI_WFL_USETHUMBSDSC","Поддерживаемые типы ссылок: JPG, GIF, PNG.<div style='padding-top: 8px;'>WF-Links будет использовать эскизы изображений. Установите значение «Нет», чтобы использовать исходное изображение сервера, не поддерживает этот параметр.</div>");
define('_MI_WFL_DATEFORMAT','Временная метка:');
define('_MI_WFL_DATEFORMATDSC','Марка времени по умолчанию для WF-links.<br />Подробнее <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');
define('_MI_WFL_SHOWDISCLAIMER','Показывать отказ от ответственности перед отправкой пользователем?');
define('_MI_WFL_SHOWDISCLAIMERDSC','Перед тем, как Пользователь может подать ссылку, показать правила входа?');
define('_MI_WFL_SHOWLINKDISCL','Показывать ссылку на отказ от ответственности?');
define('_MI_WFL_SHOWLINKDISCLDSC','Показывать ссылку, чтобы открыть ссылку?');
define('_MI_WFL_DISCLAIMER','Введите текст Отказ от ответственности. Текст:');
define('_MI_WFL_LINKDISCLAIMER','Введите ссылку Отказ от ответственности:');
define('_MI_WFL_SUBCATS','Подкатегории:');
define("_MI_WFL_SUBMITART","Отправить ссылки:");
define("_MI_WFL_SUBMITARTDSC","Выберите группы, которые могут отправлять новые ссылки.");
define("_MI_WFL_RATINGGROUPS","Рейтинг ссылок:");
define("_MI_WFL_RATINGGROUPSDSC","Выберите группы, которые могут оценивать ссылку.");
define("_MI_WFL_IMGUPDATE","Обновление эскизов?");
define("_MI_WFL_IMGUPDATEDSC","Если выбранные изображения эскизов будут обновляться при каждом рендеринге страницы, в противном случае будет использоваться первое изображение. <br /><br />");
define("_MI_WFL_QUALITY","Высокое качество эскизов:");
define("_MI_WFL_QUALITYDSC","Качество самого низкого: 0 Наибольший: 100");
define("_MI_WFL_KEEPASPECT","Соотношение сторон изображения?");
define("_MI_WFL_KEEPASPECTDSC","");
define("_MI_WFL_ADMINPAGE","Количество ссылок:");
define("_MI_WFL_AMDMINPAGEDSC","Количество новых ссылок для отображения в области администрирования модуля.");
define("_MI_WFL_ARTICLESSORT","Ссылка по умолчанию:");
define("_MI_WFL_ARTICLESSORTDSC","Выберите порядок по умолчанию для списков ссылок.");
define("_MI_WFL_TITLE","Название");
define("_MI_WFL_RATING","Рейтинг");
define("_MI_WFL_WEIGHT","Вес");
define("_MI_WFL_POPULARITY","Популярность");
define("_MI_WFL_SUBMITTED2","Дата отправки");
define('_MI_WFL_COPYRIGHT','Уведомление об авторских правах:');
define('_MI_WFL_COPYRIGHTDSC','Выберите, чтобы отобразить уведомление об авторских правах на странице ссылок.');
// Description of each config items
define('_MI_WFL_SUBCATSDSC','Выберите «Да» для отображения подкатегорий. Выбор «Нет» будет скрывать подкатегории из списков');

// Text for notifications
define('_MI_WFL_GLOBAL_NOTIFY','Глобальный');
define('_MI_WFL_GLOBAL_NOTIFYDSC','Параметры уведомлений о глобальных ссылках.');
define('_MI_WFL_CATEGORY_NOTIFY','Категория');
define('_MI_WFL_CATEGORY_NOTIFYDSC','Параметры уведомления, которые относятся к текущей категории ссылок.');
define('_MI_WFL_LINK_NOTIFY','Ссылка');
define('_MI_WFL_FILE_NOTIFYDSC','Опции уведомления, которые применяются к текущей ссылке.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFY','Новая категория');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYCAP','Уведомить меня, когда будет создана новая категория ссылок.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYDSC','Получать уведомление при создании новой категории ссылок.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE} автообновление: новая категория ссылок');

define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFY','Изменить запрашиваемую ссылку');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYCAP','Сообщите мне о любом запросе изменения ссылки.');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYDSC','Получать уведомление при отправке любого запроса на изменение ссылки.');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE} автообновление: запрошена ссылка');

define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFY','Сломанная ссылка');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYCAP','Сообщите мне о сломанной ссылке.');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYDSC','Получать уведомление при отправке отчета о неработающих ссылках.');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE} автообновление: сообщается о неисправной ссылке');

define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFY','Ссылка предоставлена');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYCAP','Сообщите мне, когда будет отправлена ​​какая-либо новая ссылка (ожидающая утверждения).');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYDSC','Получать уведомление при отправке любой новой ссылки (в ожидании утверждения).');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE} автообновление: новая ссылка отправлена');

define('_MI_WFL_GLOBAL_NEWLINK_NOTIFY','Новая ссылка');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYCAP','Уведомить меня, когда будет размещена новая ссылка.');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYDSC','Получать уведомление при публикации любой новой ссылки.');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE} автообновление: Новая ссылка');

define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFY','Ссылка предоставлена');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYCAP','Сообщите мне, когда новая ссылка будет отправлена ​​(ожидающая утверждения) в текущую категорию.');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYDSC','Получать уведомление при отправке новой ссылки (ожидающей утверждения) в текущую категорию.');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE} автообновление: Новая ссылка, представленна в категории');

define('_MI_WFL_CATEGORY_NEWLINK_NOTIFY','Новая ссылка');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYCAP','Сообщите мне, когда новая ссылка будет отправлена ​​в текущую категорию.');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYDSC','Получать уведомление, когда новая ссылка отправляется в текущую категорию.');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE} автообновление: Новое в категории');

define('_MI_WFL_LINK_APPROVE_NOTIFY','Ссылка одобрена');
define('_MI_WFL_LINK_APPROVE_NOTIFYCAP','Уведомить меня, когда эта ссылка одобрена.');
define('_MI_WFL_LINK_APPROVE_NOTIFYDSC','Получать уведомление, когда эта ссылка одобрена.');
define('_MI_WFL_LINK_APPROVE_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE} автообновление: ссылка одобрена');

define('_MI_WFL_AUTHOR_INFO',"Информация для разработчиков");
define('_MI_WFL_AUTHOR_NAME',"Разработчик");
define('_MI_WFL_AUTHOR_DEVTEAM',"Команда разработчиков");
define('_MI_WFL_AUTHOR_WEBSITE',"Сайт разработчика");
define('_MI_WFL_AUTHOR_EMAIL',"Электронная почта разработчика");
define('_MI_WFL_AUTHOR_CREDITS',"Кредиты");
define('_MI_WFL_MODULE_INFO',"Информация о развитии модуля");
define('_MI_WFL_MODULE_STATUS',"Статус разработки");
define('_MI_WFL_MODULE_DEMO',"Демо-сайт");
define('_MI_WFL_MODULE_SUPPORT',"Официальный сайт поддержки");
define('_MI_WFL_MODULE_BUG',"Сообщить об ошибке для этого модуля");
define('_MI_WFL_MODULE_FEATURE',"Предложите новую функцию для этого модуля");
define('_MI_WFL_MODULE_DISCLAIMER',"Отказ от ответственности");
define('_MI_WFL_RELEASE',"Дата выпуска: ");

define('_MI_WFL_MODULE_MAILLIST',"WF-Project списки рассылки");
define('_MI_WFL_MODULE_MAILANNOUNCEMENTS',"Список рассылки объявлений");
define('_MI_WFL_MODULE_MAILBUGS',"Список рассылки ошибок");
define('_MI_WFL_MODULE_MAILFEATURES',"Список рассылки");
define('_MI_WFL_MODULE_MAILANNOUNCEMENTSDSC',"Получите последние объявления от WF-Project.");
define('_MI_WFL_MODULE_MAILBUGSDSC',"Отслеживания ошибок");
define('_MI_WFL_MODULE_MAILFEATURESDSC',"Запросить новых функций.");

define('_MI_WFL_WARNINGTEXT',"ПРОГРАММНОЕ ОБЕСПЕЧЕНИЕ ПРЕДОСТАВЛЯЕТСЯ WF-PROJECTS \"КАК ЕСТЬ\" И \"СО ВСЕМИ НЕДОСТАТКАМИ.\"
WF-PROJECTS MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND CONCERNING
THE QUALITY, SAFETY OR SUITABILITY OF THE SOFTWARE, EITHER EXPRESS OR
IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.
FURTHER, WF-PROJECTS MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE TRUTH,
ACCURACY OR COMPLETENESS OF ANY STATEMENTS, INFORMATION OR MATERIALS
CONCERNING THE SOFTWARE THAT IS CONTAINED IN WF-Project WEBSITE. IN NO
EVENT WILL WF-PROJECTS BE LIABLE FOR ANY INDIRECT, PUNITIVE, SPECIAL,
INCIDENTAL OR CONSEQUENTIAL DAMAGES HOWEVER THEY MAY ARISE AND EVEN IF
WF-PROJECT HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGES..");

define('_MI_WFL_AUTHOR_CREDITSTEXT',"Команда WF-Projects хотела бы поблагодарить следующих людей за их помощь и поддержку на этапе разработки этого модуля.<br /></br />EdStacey, maumed, banned, krobi, Pnooka, MarcoFr, cosmodrum, placebo333, GibaPhp");
define('_MI_WFL_AUTHOR_BUGFIXES',"История ошибок");

define('_MI_WFL_COPYRIGHT2','Авторские права');
define('_MI_WFL_COPYRIGHTIMAGE',"Если не указано иное, этот модуль (WF-Links) и его изображения являются авторскими правами команды WF-Projects.<br /><br />У Вас есть разрешение на копирование, редактирование и изменение WF-Links в соответствии с вашими личными требованиями. Вы соглашаетесь не изменять, не адаптировать и не распространять исходный код Программного обеспечения без прямого разрешения команды WF-Projects.<br /><br />PageRank является товарным знаком Google Inc.");

define('_MI_WFL_SELECTFORUM',"Выберите форум:");
define('_MI_WFL_SELECTFORUMDSC',"Выберите форум, который вы установили, и будете использовать WF-Links.");

define('_MI_WFL_DISPLAYFORUM1',"Newbb (all)");
define('_MI_WFL_DISPLAYFORUM2',"IPB Forum");
define('_MI_WFL_DISPLAYFORUM3',"PHPBB2 Module");

// added by McDonald
define("_MI_WFL_COUNTRY","Страна:");
define('_MI_WFL_EDITOR',"Редактор для использования (admin):");
define('_MI_WFL_EDITORCHOICE',"Выберите редактор, который будет использоваться для администратора. Если у вас есть «простая» установка (Например, вы используете только редактор ядра XOOPS, который предоставляется в стандартном базовом пакете xoops), то Вы можете просто выбрать DHTML и Compact");
define('_MI_WFL_EDITORUSER',"Редактор для использования (пользователь):");
define('_MI_WFL_EDITORCHOICEUSER',"Выберите редактор для использования пользователем. Если у вас есть «простая» установка (Например, вы используете только редактор ядра XOOPS, который предоставляется в стандартном базовом пакете xoops), то Вы можете просто выбрать DHTML и Compact");
define("_MI_WFL_FORM_DHTML","DHTML");
define("_MI_WFL_FORM_COMPACT","Compact");
define("_MI_WFL_FORM_SPAW","Spaw Editor");
define("_MI_WFL_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_WFL_FORM_FCK","FCK Editor");
define("_MI_WFL_FORM_KOIVI","Koivi Editor");
define("_MI_WFL_FORM_INBETWEEN","Inbetween");
define("_MI_WFL_FORM_TINYEDITOR","TinyEditor");
define("_MI_WFL_FORM_TINYMCE","TinyMCE");
define("_MI_WFL_FORM_DHTMLEXT","DHTML Extended");
define("_MI_WFL_SORTCATS","Сортировать категории по:");
define("_MI_WFL_SORTCATSDSC","Выберите способ сортировки категорий и подкатегорий.");
define("_MI_WFL_KEYLENGTH","Введите max. кол-во символов для мета ключевых слов:");
define("_MI_WFL_KEYLENGTHDSC","Значение по умолчанию - 255 символов.");
define("_MI_WFL_OTHERLINKS","Показать другие ссылки, отправленные пользователем?");
define("_MI_WFL_OTHERLINKSDSC","Выберите, будут ли отображаться другие ссылки отправителя.");
define("_MI_WFL_TOTALCHARS","Укажите общее количество символов для описания?");
define("_MI_WFL_TOTALCHARSDSC","Установите общее количество символов для описания в категории.");
define("_MI_WFL_QUICKVIEW","Включить быстрый просмотр?");
define("_MI_WFL_QUICKVIEWDSC","Это включает/выключает быстрый просмотр.");
define('_MI_WFL_ICONS_CREDITS',"Иконки по");
define("_MI_WFL_SHOWSBOOKMARKS","Показать социальные закладки?");
define("_MI_WFL_SHOWSBOOKMARKSDSC","Выберите «Да», если вы хотите, чтобы значки социальных закладок отображались в статье.");
define("_MI_WFL_SHOWPAGERANK","Показать Google PageRank?");
define("_MI_WFL_SHOWPAGERANKSDSC","Выберите «Да», если вы хотите показать Google PageRank .");
define("_MI_WFL_USERTAGDESCR","Пользователь может отправлять теги:");
define("_MI_WFL_USERTAGDSC","Выберите Да, если пользователю разрешено отправлять теги.");

// Version 1.05 RC5
define('_MI_WFL_DATEFORMATADMIN','Временная шкала в админ:');
define('_MI_WFL_DATEFORMATADMINDSC','По умолчанию административная временная шкала WF-Links<br />Подробнее <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');
define("_MI_WFL_USEADDRESSDESCR","Использовать параметры адреса и карты?");
define("_MI_WFL_USEADDRESSDSC","Выберите «Да», чтобы использовать функцию адреса и карт.");
define("_MI_WFL_HEADERPRINT","[ОПЦИИ ПЕЧАТИ] Заголовок страницы для печати");
define("_MI_WFL_HEADERPRINTDSC","Заголовок, который будет напечатан для каждой ссылки");
define("_MI_WFL_LOGOURLPRINT","[ОПЦИИ ПЕЧАТИ] url лого для печати");
define("_MI_WFL_LOGOURLDSCPRINT","URL-адрес логотипа, который будет напечатан в верхней части страницы");
define("_MI_WFL_FOOTERPRINT","[ОПЦИИ ПЕЧАТИ] Печать нижнего колонтитула страницы");
define("_MI_WFL_FOOTERPRINTDSC","Нижний колонтитул, который будет напечатан для каждой ссылки");
define("_MI_WFL_BNAME3","WF-Links Спонсорская статистика");
define("_MI_WFL_VCARD_CREDITS","Скрипт vCard");

// Version 1.05 RC6
define("_MI_WFL_FLAGIMG","Каталог изображений флагов стран");
define("_MI_WFL_FLAGIMGDSC","Введите URL-адрес без завершающей косой черты");
define("_MI_WFL_CATEGORYIMGDSC","Введите URL-адрес без завершающей косой черты");
define("_MI_WFL_SCREENSHOTSDSC","Введите URL-адрес без завершающей косой черты");
define("_MI_WFL_MAINIMGDIRDSC","Введите URL-адрес без завершающей косой черты");
define("_MI_WFL_USEAUTOSCRSHOT","Использовать автоматический снимок экрана");
define("_MI_WFL_USEAUTOSCRSHOTDSC","Это автоматически создаст скриншот, основанный на URL-адресе. Это завышает загруженные скриншоты и может не работать для всех веб-сайтов.");
define("_MI_WFL_MOZSHOT_CREDITS","Автоматический снимок экрана");
define("_MI_WFL_MOZSHOT_CREDITSTXT", '<a href="http://mozshot.nemui.org" target=_blank>Mozshot</a> (весь исходный код, предоставлен в <a href="http://www.ruby-lang.org/en/" target=_blank>Ruby</a> lisence)');

// Version 1.06 RC-1
define("_MI_WFL_BNAME4","Облако тегов WF-Links");
define("_MI_WFL_BNAME5","Лучшие теги WF-Links");

// Version 1.06 RC-3
define('_MI_WFL_DISPLAYFORUM4',"Newbbex");
define("_MI_WFL_TITLE_A","Название (A)");
define("_MI_WFL_TITLE_D","Название (D)");
define("_MI_WFL_RATING_A","Рейтинг (A)");
define("_MI_WFL_RATING_D","Рейтинг (D)");
define("_MI_WFL_SUBMITTED_A","Дата подачи (A)");
define("_MI_WFL_SUBMITTED_D","Дата подачи (D)");
define("_MI_WFL_POPULARITY_A","Популярность (A)");
define("_MI_WFL_POPULARITY_D","Популярность (D)");
define("_MI_WFL_COUNTRY_A","Страна (A)");
define("_MI_WFL_COUNTRY_D","Страна (D)");

// Version 1.08

// Admin Summary
//define("_MI_WFL_SCATEGORY","Категория");
define("_MI_WFL_SNEWFILESVAL","Отправлено");
define("_MI_WFL_SMODREQUEST","Модифицированные");
//define("_MI_WFL_SREVIEWS","Отзывы: ");
define("_MI_WFL_SBROKENSUBMIT","Сломанные");
define("_MI_WFL_DOCUMENTATION","Документы");

define('_MI_WFL_ADD_LINK','Добавить ссылку');
define('_MI_WFL_ADD_CATEGORY','Добавить категорию');

//1.11 Beta 1
define('_MI_WFL_HELP_OVERVIEW', "Обзор");
define('_MI_WFL_HELP_INSTALL', "Установка");
define('_MI_WFL_HELP_UPDATE', "Обновление");
define('_MI_WFL_HELP_CONVERT', "Конвертировать");
define('_MI_WFL_HELP_PREFERENCES', "Настройки");
define('_MI_WFL_HELP_INDEXPAGE', "Главная страница");
define('_MI_WFL_HELP_CATEGORY', "Управление категориями");
define('_MI_WFL_HELP_PERMISSION', "Права доступа");
define('_MI_WFL_HELP_LINKS', "Управление ссылками");

// The Directory of this module
define('_MI_WFL_DIRNAME', basename(dirname(dirname(dirname(__FILE__)))));
