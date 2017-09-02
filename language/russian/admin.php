<?php
/**
 * $Id: admin.php 10055 2012-08-11 12:46:10Z beckmi $
 * Module: WF-links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 * Format: UTF-8
 */

define('_AM_WFL_WARNINSTALL1', '<b>ПРЕДУПРЕЖДЕНИЕ:</b> <u>Каталог</u> %s существует на Вашем сервере. <br>Удалите этот каталог из соображений безопасности.');
define('_AM_WFL_WARNINSTALL2', '<b>ПРЕДУПРЕЖДЕНИЕ:</b> <u>Файл</u> %s существует на Вашем сервере. <br>Удалите этот файл из соображений безопасности.');
define('_AM_WFL_WARNINSTALL3', '<b>ПРЕДУПРЕЖДЕНИЕ:</b> <u>Папка</u> %s на Вашем сервере не существует. <br>Эта папка требуется WF-Links.');

define('_AM_WFL_MODULE_NAME', 'WF-Links');

define('_AM_WFL_BMODIFY', 'Изменить');
define('_AM_WFL_BDELETE', 'Удалить');
define('_AM_WFL_BCREATE', 'Создать');
define('_AM_WFL_BADD', 'Добавить');
define('_AM_WFL_BAPPROVE', 'Одобрить');
define('_AM_WFL_BIGNORE', 'Игнорировать');
define('_AM_WFL_BCANCEL', 'Отмена');
define('_AM_WFL_BSAVE', 'Сохранить');
define('_AM_WFL_BRESET', 'Сбросить');
define('_AM_WFL_BMOVE', 'Переместить ссылки');
define('_AM_WFL_BUPLOAD', 'Загрузить');
define('_AM_WFL_BDELETEIMAGE', 'Удалить выбранное изображение');
define('_AM_WFL_BRETURN', 'Вернуться обратно!');
define('_AM_WFL_DBERROR', 'Ошибка доступа к базе данных: сообщите об этой ошибке на сайт WF-Project');
// Other Options
define('_AM_WFL_TEXTOPTIONS', 'Параметры текста:');
define('_AM_WFL_DISABLEHTML', ' Отключить HTML-теги');
define('_AM_WFL_DISABLESMILEY', ' Отключить смайлики');
define('_AM_WFL_DISABLEXCODE', ' Отключить коды XOOPS');
define('_AM_WFL_DISABLEIMAGES', ' Отключить изображения');
define('_AM_WFL_DISABLEBREAK', ' Использовать преобразование строк XOOPS?');
define('_AM_WFL_UPLOADFILE', 'Ссылка успешно загружена');
define('_AM_WFL_NOMENUITEMS', 'В меню нет элементов меню');
// Admin Bread crumb
define('_AM_WFL_PREFS', 'Предпочтения');
define('_AM_WFL_BUPDATE', 'Обновление модуля');
define('_AM_WFL_BINDEX', 'Главная');
define('_AM_WFL_BPERMISSIONS', 'Права доступа');
// define("_AM_WFL_BLOCKADMIN","Блоки");
define('_AM_WFL_BLOCKADMIN', 'Настройки блока');
define('_AM_WFL_GOMODULE', 'Перейти к модулю');
define('_AM_WFL_ABOUT', 'О модуле');
// Admin Summary
define('_AM_WFL_SCATEGORY', 'Категорий:  <strong>%s</strong> ');
define('_AM_WFL_SFILES', 'Ссылки:  <strong>%s</strong> ');
define('_AM_WFL_SNEWFILESVAL', 'Отправлено:  <strong>%s</strong> ');
define('_AM_WFL_SMODREQUEST', 'Изменено:  <strong>%s</strong> ');
define('_AM_WFL_SREVIEWS', 'Отзывы: ');

// Admin Main Menu
define('_AM_WFL_MCATEGORY', 'Управление категориями');
define('_AM_WFL_MLINKS', 'Управление ссылками');
define('_AM_WFL_MLISTBROKEN', 'Список сломанных ссылок');
define('_AM_WFL_MLISTPINGTIMES', 'Список ссылок по времени пинга');
define('_AM_WFL_INDEXPAGE', 'Управление главной страницей');
define('_AM_WFL_MCOMMENTS', 'Комментарии');
define('_AM_WFL_MVOTEDATA', 'Данные голосования');
define('_AM_WFL_MUPLOADS', 'Загрузка изображения');

// Catgeory defines
define('_AM_WFL_CCATEGORY_CREATENEW', 'Создать новую категорию');
define('_AM_WFL_CCATEGORY_MODIFY', 'Изменить категорию');
define('_AM_WFL_CCATEGORY_MOVE', 'Переместить ссылки категории');
define('_AM_WFL_CCATEGORY_MODIFY_TITLE', 'Название категории:');
define('_AM_WFL_CCATEGORY_MODIFY_FAILED', 'Не удалось переместить ссылки: не удается перейти в эту категорию');
define('_AM_WFL_CCATEGORY_MODIFY_FAILEDT', 'Не удалось переместить ссылки: не удается найти эту категорию');
define('_AM_WFL_CCATEGORY_MODIFY_MOVED', 'Успешно перемещены ссылки и база данных');
define('_AM_WFL_CCATEGORY_CREATED', 'Новая категория создана и обновлена ​​база данных');
define('_AM_WFL_CCATEGORY_MODIFIED', 'Выбранная категория изменена и база данных обновлена ​​успешноВыбранная категория изменена и база данных обновлена ​​успешно');
define('_AM_WFL_CCATEGORY_DELETED', 'Выьранная категория удалена и база данных успешно обновлена');
define('_AM_WFL_CCATEGORY_AREUSURE', 'ПРЕДУПРЕЖДЕНИЕ: Вы действительно хотите удалить эту категорию и ВСЕ ее ссылки и комментарии?');
define('_AM_WFL_CCATEGORY_NOEXISTS', 'Вы должны создать категорию, прежде чем Вы сможете добавить новую ссылку');
define('_AM_WFL_FCATEGORY_GROUPPROMPT', "Разрешения доступа к категории:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Выберите группы пользователей, которые будут иметь доступ к этой категории.</span></div>");
define('_AM_WFL_FCATEGORY_SUBGROUPPROMPT', "Разрешения для представления категорий:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Выберите группы пользователей, у которых будет разрешение на отправку новых ссылок в эту категорию.</span></div>");
define('_AM_WFL_FCATEGORY_MODGROUPPROMPT', "Разрешения модерации категорий:<div style='padding-top: 8px;'><span style='font-weight: normal;'>Выберите группы пользователей, которым будет разрешено модерировать эту категорию.</span></div>");

define('_AM_WFL_FCATEGORY_TITLE', 'Название категории:');
define('_AM_WFL_FCATEGORY_WEIGHT', 'Вес категории:');
define('_AM_WFL_FCATEGORY_SUBCATEGORY', 'Установить как подкатегорию:');
define('_AM_WFL_FCATEGORY_CIMAGE', 'Выберите изображение:');
define('_AM_WFL_FCATEGORY_DESCRIPTION', 'Описание категории:');
define('_AM_WFL_FCATEGORY_SUMMARY', 'Сводка категории:');
/**
 * Index page Defines
 */
define('_AM_WFL_IPAGE_UPDATED', 'Изменена главная страница и обновлена ​​база данных!');
define('_AM_WFL_IPAGE_INFORMATION', 'Информация о странице');
define('_AM_WFL_IPAGE_MODIFY', 'Изменить главную страницу');
define('_AM_WFL_IPAGE_CIMAGE', 'Выберите изображение главной страницы:');
define('_AM_WFL_IPAGE_CTITLE', 'Название главной страницы:');
define('_AM_WFL_IPAGE_CHEADING', 'Заголовок главной страницы:');
define('_AM_WFL_IPAGE_CHEADINGA', 'Выравнивание заголовка главной страницы:');
define('_AM_WFL_IPAGE_CFOOTER', 'Нижний колонтитул главной страницы:');
define('_AM_WFL_IPAGE_CFOOTERA', 'Выравнивание нижнего колонтитула главной страницы:');
define('_AM_WFL_IPAGE_CLEFT', 'Выровнять по левому краю');
define('_AM_WFL_IPAGE_CCENTER', 'Выровнять по центру');
define('_AM_WFL_IPAGE_CRIGHT', 'Выровнять по правому краю');
/**
 * Permissions defines
 */
define('_AM_WFL_PERM_MANAGEMENT', 'Управление правами доступа');
define(
    '_AM_WFL_PERM_PERMSNOTE',
       '<div><b>ЗАМЕТКА:</b> Имейте в виду, что даже если Вы установили правильные разрешения на просмотр, группа может не видеть статьи или блоки, если Вы также не предоставляете этим группам разрешения по доступу к модулю. Для этого перейдите <b>System admin > Groups</b>, выберите соответствующую группу и установите флажки, чтобы предоставить своим пользователям доступ.</div>'
);
define('_AM_WFL_PERM_CPERMISSIONS', 'Разрешения категорий');
define('_AM_WFL_PERM_CSELECTPERMISSIONS', 'Выберите категории, которые разрешено просматривать каждой группе');
define('_AM_WFL_PERM_CNOCATEGORY', 'Невозможно установить разрешения: пока не созданы категории!');
define('_AM_WFL_PERM_FPERMISSIONS', 'Разрешения для ссылок');
define('_AM_WFL_PERM_FNOFILES', 'Невозможно установить разрешения: ссылки еще не созданы!');
define('_AM_WFL_PERM_FSELECTPERMISSIONS', 'Выберите ссылки, которые разрешено просматривать каждой группе.');
/**
 * Upload defines
 */
define('_AM_WFL_LINK_IMAGEUPLOAD', 'Изображение успешно загружено на сервер');
define('_AM_WFL_LINK_NOIMAGEEXIST', 'Ошибка: для загрузки не было выбрано ни одной ссылки. Пожалуйста, попробуйте еще раз!');
define('_AM_WFL_LINK_IMAGEEXIST', 'Изображение уже существует в области загрузки!');
define('_AM_WFL_LINK_FILEDELETED', 'Ссылка удалена.');
define('_AM_WFL_LINK_FILEERRORDELETE', 'Ошибка удаления ссылки: ссылка не найдена на сервере.');
define('_AM_WFL_LINK_NOFILEERROR', 'Ошибка удаления ссылки: для удаления не выбрана ссылка.');
define('_AM_WFL_LINK_DELETEFILE', 'ПРЕДУПРЕЖДЕНИЕ: Вы уверены, что хотите удалить эту ссылку?');
define('_AM_WFL_LINK_IMAGEINFO', 'Состояние сервера');
define('_AM_WFL_LINK_SPHPINI', '<b>Информация взята из PHP ini:</b>');
define('_AM_WFL_LINK_SAFEMODESTATUS', 'Безопасный режим: ');
define('_AM_WFL_LINK_REGISTERGLOBALS', 'Глобальные регистрации: ');
define('_AM_WFL_LINK_SERVERUPLOADSTATUS', 'Загрузка файлов на сервер: ');
define('_AM_WFL_LINK_MAXUPLOADSIZE', 'Максимальный размер загружаемого файла: ');
define('_AM_WFL_LINK_MAXPOSTSIZE', 'Максимальный размер почты разрешен: ');
define('_AM_WFL_LINK_SAFEMODEPROBLEMS', ' (Это может вызвать проблемы)');
define('_AM_WFL_LINK_GDLIBSTATUS', 'Поддержка библиотеки GD: ');
define('_AM_WFL_LINK_GDLIBVERSION', 'Версия библиотеки GD: ');
define('_AM_WFL_LINK_GDON', '<b>Включено</b> (Thumbs Nails Available)');
define('_AM_WFL_LINK_GDOFF', '<b>Отключено</b> (No Thumb Nails Available)');
define('_AM_WFL_LINK_OFF', '<b>OFF</b>');
define('_AM_WFL_LINK_ON', '<b>ON</b>');
define('_AM_WFL_LINK_CATIMAGE', 'Изображения для категорий');
define('_AM_WFL_LINK_SCREENSHOTS', 'Снимок экрана');
define('_AM_WFL_LINK_MAINIMAGEDIR', 'Основные изображения');
define('_AM_WFL_LINK_FCATIMAGE', 'Путь к изображениям для категории');
define('_AM_WFL_LINK_FSCREENSHOTS', 'Путь к скриншотамя');
define('_AM_WFL_LINK_FMAINIMAGEDIR', 'Путь к основным изображениям');
define('_AM_WFL_LINK_FUPLOADIMAGETO', 'Загрузить изображение: ');
define('_AM_WFL_LINK_FUPLOADPATH', 'Путь загрузки: ');
define('_AM_WFL_LINK_FUPLOADURL', 'URL загрузки: ');
define('_AM_WFL_LINK_FOLDERSELECTION', 'Выберите пункт «Назначение отправки»:');
define('_AM_WFL_LINK_FSHOWSELECTEDIMAGE', 'Показать выбранное изображение:');
define('_AM_WFL_LINK_FUPLOADIMAGE', 'Загрузите новое изображение в выбранное место назначения:');

// Main Index defines
define('_AM_WFL_MINDEX_LINKSUMMARY', 'Резюме модуля');
define('_AM_WFL_MINDEX_PUBLISHEDLINK', 'Опубликованные ссылки:');
define('_AM_WFL_MINDEX_AUTOPUBLISHEDLINK', 'Автоматически опубликованные ссылки:');
define('_AM_WFL_MINDEX_AUTOEXPIRE', 'Автолиния:');
define('_AM_WFL_MINDEX_EXPIRED', 'Истекшие ссылки:');
define('_AM_WFL_MINDEX_OFFLINELINK', 'Офлайн-ссылки:');
define('_AM_WFL_MINDEX_ID', 'ID');
define('_AM_WFL_MINDEX_TITLE', 'Название ссылки');
define('_AM_WFL_MINDEX_POSTER', 'Плакат');
define('_AM_WFL_MINDEX_ONLINE', 'Статус');
define('_AM_WFL_MINDEX_ONLINESTATUS', 'Статус онлайн');
define('_AM_WFL_MINDEX_PUBLISH', 'Опубликовано');
define('_AM_WFL_MINDEX_PUBLISHED', 'Опубликовано');
define('_AM_WFL_MINDEX_EXPIRE', 'Истекший');
define('_AM_WFL_MINDEX_NOTSET', 'Дата не задана');
define('_AM_WFL_MINDEX_SUBMITTED', 'Дата отправки');

define('_AM_WFL_MINDEX_ACTION', 'Действие');
define('_AM_WFL_MINDEX_NOLINKSFOUND', 'ВНИМАНИЕ. Нет ссылок, соответствующих этим критериям.');
define('_AM_WFL_MINDEX_PAGE', '<b>Страница:<b> ');
define(
    '_AM_WFL_MINDEX_PAGEINFOTXT',
       '<ul><li>WF-links главная страница.</li><li>Вы можете легко изменить логотип, заголовок, заголовок главной страницы и нижний колонтитул в соответствии с Вашим собственным взглядом</li></ul><br>Примечание: выбранное изображение логотипа будет использоваться в WF-links.'
);
define('_AM_WFL_MINDEX_RESPONSE', 'Время отклика');
// Submitted Links
define('_AM_WFL_SUB_SUBMITTEDFILES', 'Представленные ссылки');
define('_AM_WFL_SUB_FILESWAITINGINFO', 'Информация о ожидающих ссылках');
define('_AM_WFL_SUB_FILESWAITINGVALIDATION', 'Проверка ожиданий по ссылкам: ');
define('_AM_WFL_SUB_APPROVEWAITINGFILE', '<b>Одобрить</b> новую информацию о ссылках без подтверждения.');
define('_AM_WFL_SUB_EDITWAITINGFILE', '<b>Редактировать</b> новую информацию о ссылках, а затем одобрить.');
define('_AM_WFL_SUB_DELETEWAITINGFILE', '<b>Удалить</b> новую информацию о ссылках.');
define('_AM_WFL_SUB_NOFILESWAITING', 'Нет ссылок, соответствующих этим критериям');
define('_AM_WFL_SUB_NEWFILECREATED', 'Созданы новые данные о соединении и база данных');
// Vote Information
define('_AM_WFL_VOTE_RATINGINFOMATION', 'Информация о голосовании');
define('_AM_WFL_VOTE_TOTALVOTES', 'Всего голосов: ');
define('_AM_WFL_VOTE_REGUSERVOTES', 'Голосов зарегистрированных пользователей: %s');
define('_AM_WFL_VOTE_ANONUSERVOTES', 'Голосов анонимных пользователей: %s');
define('_AM_WFL_VOTE_USER', 'Пользователь');
define('_AM_WFL_VOTE_IP', 'IP адрес');
define('_AM_WFL_VOTE_DATE', 'Отправлено');
define('_AM_WFL_VOTE_RATING', 'Рейтинг');
define('_AM_WFL_VOTE_NOREGVOTES', 'Нет зарегистрированных пользователей');
define('_AM_WFL_VOTE_NOUNREGVOTES', 'Нет незарегистрированных пользователей');
define('_AM_WFL_VOTE_VOTEDELETED', 'Данные голосования удалены.');
define('_AM_WFL_VOTE_ID', 'ID');
define('_AM_WFL_VOTE_FILETITLE', 'Название ссылки');
define('_AM_WFL_VOTE_DISPLAYVOTES', 'Информация о данных голосования');
define('_AM_WFL_VOTE_NOVOTES', 'Нет голосов пользователей для отображения');
define('_AM_WFL_VOTE_DELETE', 'Нет голосов пользователей для отображения');
define('_AM_WFL_VOTE_DELETEDSC', '<b>Удалить</b> выбранную информацию о голосовании из базы данных.');
define('_AM_WFL_VOTEDELETED', 'Выбранная база данных голосования удалена');

define('_AM_WFL_VOTE_USERAVG', 'Средний рейтинг пользователя');
define('_AM_WFL_VOTE_TOTALRATE', 'Всего голосов');
define('_AM_WFL_VOTE_MAXRATE', 'Максимум пунктов голосов');
define('_AM_WFL_VOTE_MINRATE', 'Минимум пунктов голосов');
define('_AM_WFL_VOTE_MOSTVOTEDTITLE', 'Самые популярные');
define('_AM_WFL_VOTE_LEASTVOTEDTITLE', 'Наименее проголосовали за');
define('_AM_WFL_VOTE_MOSTVOTERSUID', 'Активный участник');
define('_AM_WFL_VOTE_REGISTERED', 'Голоса зарегистрированных');
define('_AM_WFL_VOTE_NONREGISTERED', 'Анонимные голоса');
// Modifications
define('_AM_WFL_MOD_TOTMODREQUESTS', 'Всего запросов на модификацию: ');
define('_AM_WFL_MOD_MODREQUESTS', 'Модифицированные ссылки');
define('_AM_WFL_MOD_MODREQUESTSINFO', 'Информация о модифицированных ссылках');
define('_AM_WFL_MOD_MODID', 'ID');
define('_AM_WFL_MOD_MODTITLE', 'Название');
define('_AM_WFL_MOD_MODPOSTER', 'Оригинальный плакат: ');
define('_AM_WFL_MOD_DATE', 'Отправлено');
define('_AM_WFL_MOD_NOMODREQUEST', 'Запросов, соответствующих этим критериям, нет.');
define('_AM_WFL_MOD_TITLE', 'Название ссылки: ');
define('_AM_WFL_MOD_LID', 'ID ссылки: ');
define('_AM_WFL_MOD_CID', 'Категория: ');
define('_AM_WFL_MOD_URL', 'Url ссылки: ');
define('_AM_WFL_MOD_PUBLISHER', 'Издатель: ');
define('_AM_WFL_MOD_FORUMID', 'Форум: ');
define('_AM_WFL_MOD_SCREENSHOT', 'Снимок экрана: ');
define('_AM_WFL_MOD_HOMEPAGE', 'Домашняя страница: ');
define('_AM_WFL_MOD_HOMEPAGETITLE', 'Название домашней страницы: ');
define('_AM_WFL_MOD_SHOTIMAGE', 'Снимок экрана: ');
define('_AM_WFL_MOD_DESCRIPTION', 'Описание: ');
define('_AM_WFL_MOD_MODIFYSUBMITTER', 'Отправил: ');
define('_AM_WFL_MOD_MODIFYSUBMIT', 'Отправил');
define('_AM_WFL_MOD_PROPOSED', 'Предлагаемая ссылка Подробнее');
define('_AM_WFL_MOD_ORIGINAL', 'Оригинальная ссылка Подробнее');
define('_AM_WFL_MOD_REQDELETED', 'Запрос модификации удален из базы данных');
define('_AM_WFL_MOD_REQUPDATED', 'Выбранная ссылка изменена и успешно обновлена в ​​базе данных');
define('_AM_WFL_MOD_VIEW', 'Посмотреть');
// Link management
define('_AM_WFL_LINK_ID', 'ID ссылки: ');
define('_AM_WFL_LINK_IP', 'IP-адрес отправителя: ');
define('_AM_WFL_LINK_ALLOWEDAMIME', "<div style='padding-top: 4px; padding-bottom: 4px;'><b>Допустимые расширения ссылок администратора</b>:</div>");
define('_AM_WFL_LINK_MODIFYFILE', 'Изменить информацию о ссылке');
define('_AM_WFL_LINK_CREATENEWFILE', 'Создать новую ссылку');
define('_AM_WFL_LINK_TITLE', 'Название ссылки: ');
define('_AM_WFL_LINK_DLURL', 'URL ссылки: ');
define('_AM_WFL_LINK_DIRCA', ' Рейтинг интернет-контента: ');
define('_AM_WFL_LINK_DESCRIPTION', 'Описание ссылки: ');
define('_AM_WFL_LINK_CATEGORY', 'Основная категория ссылок: ');
define('_AM_WFL_LINK_FILESSTATUS', " Установить ссылку в автономном режиме?<br><br><span style='font-weight: normal;'>Ссылка не будет доступна для всех пользователей.</span>");
define('_AM_WFL_LINK_SETASUPDATED', " Установить статус ссылки как обновленный?<br><br><span style='font-weight: normal;'>Покажет обновленный значок.</span>");
define('_AM_WFL_LINK_SHOTIMAGE', 'Ссылка на скриншот изображения: ');
define('_AM_WFL_LINK_DISCUSSINFORUM', 'Добавить Обсудить в этом форуме?');
define('_AM_WFL_LINK_PUBLISHDATE', 'Дата публикации ссылки:');
define('_AM_WFL_LINK_EXPIREDATE', 'Дата истечения срока действия ссылки:');
define('_AM_WFL_LINK_CLEARPUBLISHDATE', '<br><br>Удалить дату публикации:');
define('_AM_WFL_LINK_CLEAREXPIREDATE', '<br><br>Удалить срок действия:');
define('_AM_WFL_LINK_PUBLISHDATESET', ' Дата публикации: ');
define('_AM_WFL_LINK_SETDATETIMEPUBLISH', ' Укажите дату и время публикации');
define('_AM_WFL_LINK_SETDATETIMEEXPIRE', ' Установите дату/время истечения срока действия');
define('_AM_WFL_LINK_SETPUBLISHDATE', '<b>Установить дату публикации: </b>');
define('_AM_WFL_LINK_SETNEWPUBLISHDATE', '<b>Установить новую дату публикации: </b><br>Опубликовано:');
define('_AM_WFL_LINK_SETPUBDATESETS', '<b>Настройка даты публикации: </b><br>Публикуется по дате:');
define('_AM_WFL_LINK_EXPIREDATESET', ' Срок действия истечения срока: ');
define('_AM_WFL_LINK_SETEXPIREDATE', '<b>Установить срок действия: </b>');
define('_AM_WFL_LINK_DELEDITMESS', "Удалить битый отчет?<br><br><span style='font-weight: normal;'>Когда Вы выбираете <b>Да</b> отчет будет автоматически удален, и Вы подтвердите, что ссылка теперь работает снова.</span>");
define('_AM_WFL_LINK_MUSTBEVALID', 'Снимок экрана должен быть действительной ссылкой изображения в каталоге %s (например, shot.gif). Оставьте поле пустым, если ссылка на изображение отсутствует.');
define('_AM_WFL_LINK_EDITAPPROVE', 'Утвердить ссылку:');
define('_AM_WFL_LINK_NEWFILEUPLOAD', 'Создана новая ссылка и обновлена ​​база данных');
define('_AM_WFL_LINK_FILEMODIFIEDUPDATE', 'Выбранная ссылка изменена и база данных обновлена ​​успешно');
define('_AM_WFL_LINK_REALLYDELETEDTHIS', 'Действительно удалить выбранную ссылку?');
define('_AM_WFL_LINK_FILEWASDELETED', 'Ссылка %s успешно удалена из базы данных!');
define('_AM_WFL_LINK_FILEAPPROVED', 'Ссылка одобрена и успешно обновлена ​​база данных');
define('_AM_WFL_LINK_CREATENEWSSTORY', '<b>Создать новость из ссылки</b>');
define('_AM_WFL_LINK_SUBMITNEWS', 'Добавить новую ссылку в качестве новости?');
define('_AM_WFL_LINK_NEWSCATEGORY', 'Выберите категорию новостей для отправки:');
define('_AM_WFL_LINK_NEWSTITLE', "Название новости:<div style='padding-top: 4px; padding-bottom: 4px;'><span style='font-weight: normal;'>Оставьте пустым для использования названия ссылки</span></div>");
define('_AM_WFL_LINK_PUBLISHER', 'Имя издателя ссылки: ');

/**
 * Broken links defines
 */
define('_AM_WFL_SBROKENSUBMIT', 'Битые: <strong>%s</strong> ');
define('_AM_WFL_BROKEN_FILE', 'Отчет о битых ссылках');
define('_AM_WFL_BROKEN_FILEIGNORED', 'Отчет игнорируется и успешно удаляется из базы данных!');
define('_AM_WFL_BROKEN_NOWACK', 'Изменено состояние подтвержденного состояния и обновлена ​​база данных!');
define('_AM_WFL_BROKEN_NOWCON', 'Обновлен статус подтвержден и обновлена ​​база данных!');
define('_AM_WFL_BROKEN_REPORTINFO', 'Информация о отчете');
define('_AM_WFL_BROKEN_REPORTSNO', 'Ожидаемые сообщения:');
define('_AM_WFL_BROKEN_IGNOREDESC', '<b>Игнорирует</b> отчет и удаляет только сообщение о неработающей ссылке.');
define('_AM_WFL_BROKEN_DELETEDESC', '<b>Удаление</b> сообщенные данные канала и неработающие ссылки для ссылки.');
define('_AM_WFL_BROKEN_EDITDESC', '<b>Редактировать</b> ссылку для устранения проблемы.');
define('_AM_WFL_BROKEN_ACKDESC', '<b>Признанный</b> Установите подтвержденное состояние отчета о файле.');
define('_AM_WFL_BROKEN_CONFIRMDESC', '<b>Подтвердил</b> Установите подтвержденное состояние отчета о неработающей ссылке.');
define('_AM_WFL_BROKEN_ACKNOWLEDGED', 'Признанный');
define('_AM_WFL_BROKEN_DCONFIRMED', 'Подтвердил');

define('_AM_WFL_BROKEN_ID', 'ID');
define('_AM_WFL_BROKEN_TITLE', 'Название');
define('_AM_WFL_BROKEN_REPORTER', 'Репортер');
define('_AM_WFL_BROKEN_FILESUBMITTER', 'Отправил');
define('_AM_WFL_BROKEN_DATESUBMITTED', 'Дата отправки');
define('_AM_WFL_BROKEN_ACTION', 'Действие');
define('_AM_WFL_BROKEN_NOFILEMATCH', 'Не существует отчетов, соответствующих этим критериям.');
define('_AM_WFL_BROKENFILEDELETED', 'Ссылка удалена из базы данных и отчет удален');
/**
 * About defines
 */
define('_AM_WFL_BY', 'от');
// block defines
define('_AM_WFL_BADMIN', 'Управление блоком');
define('_AM_WFL_BLKDESC', 'Описание');
define('_AM_WFL_TITLE', 'Название');
define('_AM_WFL_SIDE', 'Центровка');
define('_AM_WFL_WEIGHT', 'Вес');
define('_AM_WFL_VISIBLE', 'Видимый');
define('_AM_WFL_ACTION', 'Действие');
define('_AM_WFL_SBLEFT', 'Слева');
define('_AM_WFL_SBRIGHT', 'Справа');
define('_AM_WFL_CBLEFT', 'Слева по центру');
define('_AM_WFL_CBRIGHT', 'Справа по центру');
define('_AM_WFL_CBCENTER', 'По середине');
define('_AM_WFL_ACTIVERIGHTS', 'Активные права');
define('_AM_WFL_ACCESSRIGHTS', 'Права доступа');
// image admin icon
define('_AM_WFL_ICO_EDIT', 'Редактировать этот пункт');
define('_AM_WFL_ICO_DELETE', 'Удалить этот пункт');
define('_AM_WFL_ICO_RESOURCE', 'Редактировать этот ресурс');

define('_AM_WFL_ICO_ONLINE', 'В сети');
define('_AM_WFL_ICO_OFFLINE', 'Не в сети');
define('_AM_WFL_ICO_APPROVED', 'Утвержден');
define('_AM_WFL_ICO_NOTAPPROVED', 'Не одобрен');

define('_AM_WFL_ICO_LINK', 'Ссылки по теме');
define('_AM_WFL_ICO_URL', 'Добавить связанный URL');
define('_AM_WFL_ICO_ADD', 'Добавить');
define('_AM_WFL_ICO_APPROVE', 'Одобрить');
define('_AM_WFL_ICO_STATS', 'Статистика');
define('_AM_WFL_ICO_VIEW', 'Просмотреть этот элемент');

define('_AM_WFL_ICO_IGNORE', 'Игнорировать');
define('_AM_WFL_ICO_ACK', 'Подтвердить отчет');
define('_AM_WFL_ICO_REPORT', 'Подтвердить отчет?');
define('_AM_WFL_ICO_CONFIRM', 'Подтвержден отчет');
define('_AM_WFL_ICO_CONBROKEN', 'Подтвердить отчет?');
define('_AM_WFL_ICO_RES', 'Редактировать ресурсы/ссылки для этого элемента');
define('_AM_WFL_MOD_URLRATING', 'Рейтинг интернет-контента:');
// Alternate category
define('_AM_WFL_ALTCAT_CREATEF', 'Добавить альтернативную категорию');
define('_AM_WFL_MALTCAT', 'Управление альтернативными категориями');
define('_AM_WFL_ALTCAT_MODIFYF', 'Управление альтернативными категориями');
define('_AM_WFL_ALTCAT_INFOTEXT', '<ul><li>Через эту форму можно легко добавлять или удалять альтернативные категории.</li></ul>');
define('_AM_WFL_ALTCAT_CREATED', 'Сохранены альтернативные категории!');

define('_AM_WFL_MRESOURCES', 'Управление ресурсами');
define('_AM_WFL_RES_CREATED', 'Управление ресурсами');
define('_AM_WFL_RES_ID', 'ID');
define('_AM_WFL_RES_DESC', 'Описание');
define('_AM_WFL_RES_NAME', 'Имя ресурса');
define('_AM_WFL_RES_TYPE', 'Тип ресурса');
define('_AM_WFL_RES_USER', 'Пользователь');
define('_AM_WFL_RES_CREATEF', 'Добавить ресурс');
define('_AM_WFL_RES_MODIFYF', 'Изменить ресурс');
define('_AM_WFL_RES_NAMEF', 'Имя ресурса:');
define('_AM_WFL_RES_DESCF', 'Описание ресурса:');
define('_AM_WFL_RES_URLF', 'URL ресурса:');
define('_AM_WFL_RES_ITEMIDF', 'Идентификатор ресурса:');
define('_AM_WFL_RES_INFOTEXT', '<ul><li>Новые ресурсы могут быть добавлены, отредактированы или удалены через эту форму.</li>
    <li>Список всех ресурсов, связанных с ссылкой</li>
    <li>Изменение имени и описания ресурса</li></ul>
    ');
define('_AM_WFL_LISTBROKEN', 'Отображает ссылки, которые могут быть повреждены. NB: Эти результаты могут быть неточными и должны приниматься в качестве приблизительного руководства.<br><br>Проверьте, действительно ли ссылка существует перед любыми действиями.<br><br>');
define('_AM_WFL_PINGTIMES', 'Отображает первое приблизительное время округления до каждого канала.<br><br>NB: Эти результаты могут быть неточными и должны приниматься в качестве приблизительного руководства.<br><br>');

define('_AM_WFL_NO_FORUM', 'Нет сообщений');

define('_AM_WFL_PERM_RATEPERMISSIONS', 'Разрешения для рейтинга');
define('_AM_WFL_PERM_RATEPERMISSIONS_TEXT', 'Выберите группы, которые могут оценивать ссылку в выбранных категориях.');

define('_AM_WFL_PERM_AUTOPERMISSIONS', 'Автоподтверждение ссылок');
define('_AM_WFL_PERM_AUTOPERMISSIONS_TEXT', 'Выберите группы, в которых будут автоматически разрешены новые ссылки без вмешательства администратора.');

define('_AM_WFL_PERM_SPERMISSIONS', 'Разрешения для отправки');
define('_AM_WFL_PERM_SPERMISSIONS_TEXT', 'Выберите группы, которые могут отправлять новые ссылки на выбранные категории.');

define('_AM_WFL_PERM_APERMISSIONS', 'Группы модераторов');
define('_AM_WFL_PERM_APERMISSIONS_TEXT', 'Выберите группы, у которых есть привилегии модератора для выбранных категорий.');

// added by McDonald
define('_AM_WFL_COUNTRY', 'Страна:');
define('_AM_WFL_KEYWORDS', 'Ключевые слова:');
define('_AM_WFL_KEYWORDS_NOTE', 'Ключевые слова должны быть разделены запятой (keyword1, keyword2, keyword3, ..)');
define('_AM_WFL_CHECKURL', 'Проверить URL');
define('_AM_WFL_CATTITLE', 'Категория');
define('_AM_WFL_LINK_GOOGLEMAP', 'Google Maps');
define('_AM_WFL_LINK_YAHOOMAP', 'Yahoo Maps');
define('_AM_WFL_LINK_MULTIMAP', 'Multimap');
define('_AM_WFL_LINK_CHECKMAP', 'Check map');
define('_AM_WFL_STREET1', 'Улица 1');
define('_AM_WFL_STREET2', 'Улица 2 (необязательно)');
define('_AM_WFL_TOWN', 'Город');
define('_AM_WFL_STATE', 'Штат');
define('_AM_WFL_ZIPCODE', 'ZIP код (индекс)');
define('_AM_WFL_TELEPHONE', 'Телефон');
define('_AM_WFL_FAX', 'Факс');

// Version 1.05 RC2
define('_AM_WFL_WARNINSTALL4', '<b>ПРЕДУПРЕЖДЕНИЕ:</b> <u>Папка</u> %s не доступна для записи. <br>Эта папка должна быть доступна для записи (CHMOD 777) для WF-Links.');
// Version 1.05 RC5
define('_AM_WFL_VOIP', 'VoIP');
define('_AM_WFL_LINK_SUBMITTER', 'Имя отправителя ссылки: ');
define('_AM_WFL_MOBILE', 'Мобильный');
define('_AM_WFL_CATSPONSOR', 'Выберите категорию спонсора:');
define('_AM_WFL_CATSPONSORDSC', 'Если Вы выберете клиента, идентификатор баннера из формы ниже не будет сохранен!');
define('_AM_WFL_BANNER', 'Баннер');
define('_AM_WFL_FBANNER', 'Баннер');
define('_AM_WFL_BANNERID', 'Выберите идентификатор баннера:');
define('_AM_WFL_BANNERIDDSC', 'Если Вы выбрали клиента в форме выше, идентификатор баннера не будет сохранен!');

// Version 1.05 RC6
define('_AM_WFL_VAT', 'НДС Reg Non');
define('_AM_WFL_VATWIKI', "Для получения дополнительной информации см. <a href='http://en.wikipedia.org/wiki/Value_added_tax_identification_number' target='_blank'>Wikipedia</a>");
define('_AM_WFL_EMAIL', 'E-Mail');
define('_AM_WFL_ICO_EXPIRE', 'Истекший');
define('_AM_WFL_LINK_NORESPONSE', 'Нет ответа');
define('_AM_WFL_LINK_CREATEADDRESS', '&nbsp;<b>Подробное описание</b>');
define('_AM_WFL_LINK_MISCLINKSETTINGS', '&nbsp;<b>Другие настройки ссылок</b>');

// Version 1.06 RC1
define('_AM_WFL_READWRITEERROR', 'Вы либо не выбрали файл для загрузки, либо на сервере не установлено чтения/записи для загрузки этого файла!');
define('_AM_WFL_INVALIDFILESIZE', 'Недопустимый размер файла');
define('_AM_WFL_FILENAMEEMPTY', 'Имя файла пусто');
define('_AM_WFL_NOFILEUPLOAD', 'Нет загруженного файла, это ошибка');
define('_AM_WFL_UPLOADERRORZERO', 'С Вашей загрузкой возникла проблема. Ошибка: 0');
define('_AM_WFL_UPLOADERRORONE', 'Файл, который Вы пытаетесь загрузить, слишком велик. Ошибка: 1');
define('_AM_WFL_UPLOADERRORTWO', 'Файл, который Вы пытаетесь загрузить, слишком велик. Ошибка: 2');
define('_AM_WFL_UPLOADERRORTHREE', 'Файл, который Вы пытаетесь загрузить, был загружен только частично. Ошибка: 3');
define('_AM_WFL_UPLOADERRORFOUR', 'Файл не выбран для загрузки. Ошибка: 4');
define('_AM_WFL_UPLOADERRORFIVE', 'Файл не выбран для загрузки. Ошибка: 5');
define('_AM_WFL_NOUPLOADDIR', 'Не установлен каталог загрузки');
define('_AM_WFL_FAILOPENDIR', 'Ошибка открытия каталога: ');
define('_AM_WFL_FAILOPENDIRWRITEPERM', 'Не удалось открыть директорию с разрешением на запись: ');
define('_AM_WFL_FILESIZEMAXSIZE', 'Размер файла: %u. Максимальный разрешенный размер: %u');
define('_AM_WFL_FILESIZEMAXWIDTH', 'Ширина файла: %u. Максимальная разрешенная ширина: %u');
define('_AM_WFL_FILESIZEMAXHEIGHT', 'Высота файла: %u. Максимальная разрешенная высота: %u');
define('_AM_WFL_MIMENOTALLOW', 'Недопустимый тип MIME: ');
define('_AM_WFL_FAILEDUPLOADING', 'Не удалось загрузить файл: ');
define('_AM_WFL_FILE', 'Файл ');
define('_AM_WFL_ALREADYEXISTTRYAGAIN', ' уже существует на сервере. Переименуйте этот файл и повторите попытку.<br>');
define('_AM_WFL_ERRORSRETURNUPLOAD', '<h4>Ошибки, возвращаемые при загрузке</h4>');
define('_AM_WFL_DOESNOTEXIST', ' не существует!');
define('_AM_WFL_INFORMATION', 'Информация о ссылке');
define('_AM_WFL_HITS', 'Хиты: ');
define('_AM_WFL_PAGERANK', 'Ранг страницы: ');
define('_AM_WFL_ERROR_CATISCAT', 'Вы не можете установить категорию как свою подкатегорию!');
define('_AM_WFL_MOD_COUNTRY', 'Страна:');
define('_AM_WFL_MOD_KEYWORDS', 'Ключевые слова:');
define('_AM_WFL_MOD_ITEM_TAG', 'Теги:');
define('_AM_WFL_MOD_GOOGLEMAP', 'Google Maps:');
define('_AM_WFL_MOD_YAHOOMAP', 'Yahoo Maps:');
define('_AM_WFL_MOD_MULTIMAP', 'Multimap:');
define('_AM_WFL_MOD_STREET1', 'Улица 1:');
define('_AM_WFL_MOD_STREET2', 'Улица 2 (необязательно):');
define('_AM_WFL_MOD_TOWN', 'Город:');
define('_AM_WFL_MOD_STATE', 'Штат:');
define('_AM_WFL_MOD_ZIP', 'ZIP код (индекс):');
define('_AM_WFL_MOD_TEL', 'Телефон:');
define('_AM_WFL_MOD_FAX', 'Факс:');
define('_AM_WFL_MOD_VOIP', 'VoIP:');
define('_AM_WFL_MOD_MOBILE', 'Мобильный:');
define('_AM_WFL_MOD_EMAIL', 'E-Mail:');
define('_AM_WFL_MOD_VAT', 'НДС:');

// version 1.06 RC-2
define('_AM_WFL_IPAGE_SHOWLATEST', 'Показать последние объявления?');
define('_AM_WFL_IPAGE_LATESTTOTAL', 'Сколько ссылок для показа?');
define('_AM_WFL_IPAGE_LATESTTOTAL_DSC', '0 выключает этот параметр.');

//version 1.06 Final
define('_AM_WFL_DOCUMENTATION', 'Документация');
define('_AM_WFL_SHOWNOIMAGE', 'Показать изображение');
define('_AM_WFL_NOSELECTION', 'Не выбрано');
define('_AM_WFL_NOFILESELECT', 'Не выбран файл');

define('_AM_WFL_MODULEADMIN_MISSING', 'Ошибка: отсутствует класс ModuleAdmin. Установите модуль ModuleAdmin в /Frameworks (информация /docs/readme.txt)');
